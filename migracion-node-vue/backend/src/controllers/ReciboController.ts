import { Request, Response } from 'express';
import PDFDocument from 'pdfkit';
import { AppDataSource } from '../config/dataSource.js';
import { Recibo } from '../entities/Recibo.js';
import { Network } from '../entities/Network.js';
import { Seriepago } from '../entities/Seriepago.js';
import { Client } from '../entities/Client.js';
import { toastJson, alertJson } from '../utils/helpers.js';

export class ReciboController {
  static async index(req: Request, res: Response) {
    try {
      const search = (req.query.search as string) || '';
      const status = req.query.status as string;
      const month = req.query.month as string;
      const page = parseInt((req.query.page as string) || '1', 10);
      const limit = parseInt((req.query.limit as string) || '15', 10);
      const skip = (page - 1) * limit;

      const reciboRepo = AppDataSource.getRepository(Recibo);
      const qb = reciboRepo
        .createQueryBuilder('recibo')
        .leftJoinAndSelect('recibo.client', 'client')
        .leftJoinAndSelect('recibo.network', 'network')
        .leftJoinAndSelect('recibo.seriepago', 'seriepago');

      if (search) {
        qb.andWhere(
          '(LOWER(client.name) LIKE LOWER(:search) OR client.document LIKE :search OR recibo.seriecompleta LIKE :search)',
          { search: `%${search}%` }
        );
      }

      if (status !== undefined && status !== '') {
        qb.andWhere('recibo.status = :status', { status });
      }

      if (month) {
        qb.andWhere('recibo.month = :month', { month });
      }

      qb.orderBy('recibo.id', 'DESC').skip(skip).take(limit);

      const [recibos, total] = await qb.getManyAndCount();

      return res.json({
        data: recibos,
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

  static async show(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const reciboRepo = AppDataSource.getRepository(Recibo);
      const recibo = await reciboRepo.findOne({
        where: { id },
        relations: ['client', 'network', 'seriepago'],
      });

      if (!recibo) {
        return res.status(404).json({ message: 'Recibo no encontrado.' });
      }

      return res.json(recibo);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const {
        date,
        vencimiento,
        month,
        amount,
        descuento,
        seriepago_id,
        client_id,
        network_id,
      } = req.body;

      if (!date || !vencimiento || !month || !amount || !seriepago_id || !client_id || !network_id) {
        return res.status(422).json({ message: 'Todos los campos del recibo son obligatorios.' });
      }

      const serieRepo = AppDataSource.getRepository(Seriepago);
      const serie = await serieRepo.findOne({ where: { id: parseInt(seriepago_id, 10) } });
      if (!serie) {
        return res.status(404).json({ message: 'Serie de pago seleccionada no existe.' });
      }

      const newCount = (serie.contador ?? 0) + 1;
      serie.contador = newCount;
      await serieRepo.save(serie);

      const seriecompleta = `${serie.serie}-${newCount.toString().padStart(6, '0')}`;
      const numAmount = parseFloat(amount);
      const numDescuento = parseFloat(descuento) || 0;
      const total = parseFloat((numAmount - numDescuento).toFixed(2));

      const reciboRepo = AppDataSource.getRepository(Recibo);
      const recibo = reciboRepo.create({
        date,
        vencimiento,
        seriecompleta,
        month,
        amount: numAmount,
        descuento: numDescuento,
        total,
        status: '0', // Pendiente
        seriepago_id: serie.id,
        client_id: parseInt(client_id, 10),
        network_id: parseInt(network_id, 10),
      });

      await reciboRepo.save(recibo);

      return res.status(201).json({
        message: 'Recibo generado exitosamente.',
        data: recibo,
        toast: toastJson('Recibo emitido con éxito'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async print(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const reciboRepo = AppDataSource.getRepository(Recibo);
      const recibo = await reciboRepo.findOne({
        where: { id },
        relations: ['client', 'network', 'seriepago'],
      });

      if (!recibo) {
        return res.status(404).json({ message: 'Recibo no encontrado.' });
      }

      // Tamaño ticket 80mm: 226.77 pt de ancho x 580 pt de alto
      const doc = new PDFDocument({
        size: [226.77, 580],
        margins: { top: 15, bottom: 15, left: 10, right: 10 },
      });

      res.setHeader('Content-Type', 'application/pdf');
      res.setHeader('Content-Disposition', `inline; filename="recibo-${recibo.seriecompleta}.pdf"`);

      doc.pipe(res);

      // Cabecera
      doc.fontSize(12).font('Helvetica-Bold').text('GESTIÓN REDES INTERNET', { align: 'center' });
      doc.fontSize(8).font('Helvetica').text('SERVICIO DE TELECOMUNICACIONES', { align: 'center' });
      doc.moveDown(0.3);
      doc.fontSize(11).font('Courier-Bold').text(recibo.seriecompleta, { align: 'center' });
      doc.moveDown(0.3);

      doc.text('------------------------------------------------', { align: 'center' });
      doc.moveDown(0.3);

      // Datos del cliente y servicio
      doc.fontSize(8).font('Helvetica-Bold').text('CLIENTE:');
      doc.font('Helvetica').text(recibo.client?.name || '---');
      doc.font('Helvetica-Bold').text('DOCUMENTO:');
      doc.font('Helvetica').text(recibo.client?.document || '---');
      doc.font('Helvetica-Bold').text('DIRECCIÓN:');
      doc.font('Helvetica').text(recibo.client?.direccion || '---');
      doc.moveDown(0.3);

      doc.text('------------------------------------------------', { align: 'center' });
      doc.moveDown(0.3);

      // Detalles del recibo
      doc.font('Helvetica-Bold').text('FECHA EMISIÓN:');
      doc.font('Helvetica').text(String(recibo.date));
      doc.font('Helvetica-Bold').text('VENCIMIENTO:');
      doc.font('Helvetica').text(recibo.vencimiento);
      doc.font('Helvetica-Bold').text('MES DE SERVICIO:');
      doc.font('Helvetica').text(recibo.month);
      doc.font('Helvetica-Bold').text('TIPO DE SERVICIO:');
      doc.font('Helvetica').text(recibo.network?.type || 'INTERNET');
      doc.moveDown(0.3);

      doc.text('------------------------------------------------', { align: 'center' });
      doc.moveDown(0.5);

      // Importes
      doc.fontSize(9).font('Helvetica-Bold').text(`SUBTOTAL: S/ ${Number(recibo.amount).toFixed(2)}`, { align: 'right' });
      if (Number(recibo.descuento) > 0) {
        doc.text(`DESCUENTO: -S/ ${Number(recibo.descuento).toFixed(2)}`, { align: 'right' });
      }
      doc.fontSize(12).text(`TOTAL: S/ ${Number(recibo.total).toFixed(2)}`, { align: 'right' });
      doc.moveDown(0.5);

      doc.fontSize(8).font('Helvetica').text('------------------------------------------------', { align: 'center' });
      doc.fontSize(7).text('¡Gracias por su puntualidad y preferencia!', { align: 'center' });

      doc.end();
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async generarMasivo(req: Request, res: Response) {
    try {
      const { month, date, vencimiento, seriepago_id } = req.body;
      if (!month || !date || !vencimiento || !seriepago_id) {
        return res.status(422).json({ message: 'Todos los datos de facturación masiva son obligatorios.' });
      }

      const serieRepo = AppDataSource.getRepository(Seriepago);
      const serie = await serieRepo.findOne({ where: { id: parseInt(seriepago_id, 10) } });
      if (!serie) {
        return res.status(404).json({ message: 'Serie de pago no encontrada.' });
      }

      const networkRepo = AppDataSource.getRepository(Network);
      const activeNetworks = await networkRepo.find({
        where: { status: '0' },
        relations: ['client'],
      });

      const reciboRepo = AppDataSource.getRepository(Recibo);
      let creados = 0;

      for (const net of activeNetworks) {
        // Verificar si ya existe recibo para esta network y mes
        const exists = await reciboRepo.findOne({
          where: { network_id: net.id, month },
        });

        if (!exists) {
          serie.contador = (serie.contador ?? 0) + 1;
          const seriecompleta = `${serie.serie}-${serie.contador.toString().padStart(6, '0')}`;
          const amount = Number(net.price) || 0.0;

          const recibo = reciboRepo.create({
            date,
            vencimiento,
            seriecompleta,
            month,
            amount,
            descuento: 0,
            total: amount,
            status: '0',
            seriepago_id: serie.id,
            client_id: net.client_id,
            network_id: net.id,
          });

          await reciboRepo.save(recibo);
          creados++;
        }
      }

      if (creados > 0) {
        await serieRepo.save(serie);
      }

      return res.json({
        message: `Se generaron exitosamente ${creados} recibos para el periodo ${month}.`,
        creados,
        toast: toastJson(`Generación masiva completada: ${creados} recibos emitidos`),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
