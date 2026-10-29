import { Request, Response } from 'express';
import { AppDataSource } from '../config/dataSource.js';
import { Payment } from '../entities/Payment.js';
import { Recibo } from '../entities/Recibo.js';
import { Formapay } from '../entities/Formapay.js';
import { EmvcoQrService } from '../utils/emvco.js';
import { toastJson } from '../utils/helpers.js';

export class PaymentController {
  static async index(req: Request, res: Response) {
    try {
      const search = (req.query.search as string) || '';
      const formapay_id = req.query.formapay_id as string;
      const month = req.query.month as string;
      const page = parseInt((req.query.page as string) || '1', 10);
      const limit = parseInt((req.query.limit as string) || '15', 10);
      const skip = (page - 1) * limit;

      const paymentRepo = AppDataSource.getRepository(Payment);
      const qb = paymentRepo
        .createQueryBuilder('payment')
        .leftJoinAndSelect('payment.formapay', 'formapay');

      if (formapay_id) {
        qb.andWhere('payment.formapay_id = :formapay_id', { formapay_id });
      }

      if (month) {
        qb.andWhere('payment.month = :month', { month });
      }

      if (search) {
        qb.andWhere('(LOWER(payment.codetransferencia) LIKE LOWER(:search) OR LOWER(payment.detalle) LIKE LOWER(:search))', {
          search: `%${search}%`,
        });
      }

      qb.orderBy('payment.id', 'DESC').skip(skip).take(limit);

      const [payments, total] = await qb.getManyAndCount();

      // Cargar recibo asociado si paymentable_type es Recibo
      const reciboRepo = AppDataSource.getRepository(Recibo);
      for (const p of payments) {
        if (p.paymentable_type?.includes('Recibo')) {
          const rec = await reciboRepo.findOne({
            where: { id: p.paymentable_id },
            relations: ['client', 'network'],
          });
          (p as any).recibo = rec;
        }
      }

      return res.json({
        data: payments,
        meta: {
          current_page: page,
          per_page: limit,
          total,
          last_page: Math.ceil(total / limit),
        },
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const {
        date,
        month,
        amount,
        codetransferencia,
        detalle,
        formapay_id,
        recibo_id,
      } = req.body;

      if (!date || !amount || !formapay_id || !recibo_id) {
        return res.status(422).json({ message: 'Fecha, monto, forma de pago y recibo son obligatorios.' });
      }

      const reciboRepo = AppDataSource.getRepository(Recibo);
      const recibo = await reciboRepo.findOne({ where: { id: parseInt(recibo_id, 10) } });
      if (!recibo) {
        return res.status(404).json({ message: 'Recibo seleccionado no encontrado.' });
      }

      const paymentRepo = AppDataSource.getRepository(Payment);
      const payment = paymentRepo.create({
        date,
        month: month || recibo.month,
        amount: parseFloat(amount),
        codetransferencia: codetransferencia ? codetransferencia.trim().toUpperCase() : null,
        detalle: detalle ? detalle.trim().toUpperCase() : null,
        formapay_id: parseInt(formapay_id, 10),
        paymentable_type: 'App\\Models\\Recibo',
        paymentable_id: recibo.id,
      });

      await paymentRepo.save(payment);

      // Actualizar estado del recibo a Pagado ('1')
      recibo.status = '1';
      await reciboRepo.save(recibo);

      return res.status(201).json({
        message: 'Pago registrado exitosamente.',
        data: payment,
        toast: toastJson('Pago procesado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async generateQr(req: Request, res: Response) {
    try {
      const { amount, orderReference, phone } = req.body;
      if (!amount) {
        return res.status(422).json({ message: 'El monto es obligatorio para generar el QR dinámico.' });
      }

      const baseQr = process.env.YAPE_BASE_QR;
      const configuredPhone = phone || process.env.YAPE_PHONE || '+51928393901';

      let result;
      if (baseQr && baseQr.trim() !== '') {
        result = await EmvcoQrService.generateFromBaseQr(baseQr, amount, orderReference || `REC-${Date.now()}`);
      } else {
        result = await EmvcoQrService.generateForPhone(
          configuredPhone,
          'INTERNET SERVICE',
          'LIMA',
          amount,
          orderReference || `REC-${Date.now()}`
        );
      }

      return res.json(result);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const paymentRepo = AppDataSource.getRepository(Payment);
      const payment = await paymentRepo.findOne({ where: { id } });

      if (!payment) {
        return res.status(404).json({ message: 'Pago no encontrado.' });
      }

      // Si el pago correspondía a un recibo, volver el recibo a Pendiente ('0')
      if (payment.paymentable_type?.includes('Recibo')) {
        const reciboRepo = AppDataSource.getRepository(Recibo);
        const recibo = await reciboRepo.findOne({ where: { id: payment.paymentable_id } });
        if (recibo) {
          recibo.status = '0';
          await reciboRepo.save(recibo);
        }
      }

      await paymentRepo.remove(payment);
      return res.json({
        message: 'Pago anulado correctamente.',
        toast: toastJson('Pago anulado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async formapays(req: Request, res: Response) {
    try {
      const repo = AppDataSource.getRepository(Formapay);
      const list = await repo.find({ order: { id: 'ASC' } });
      return res.json(list);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
