"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.ReciboController = void 0;
const pdfkit_1 = __importDefault(require("pdfkit"));
const dataSource_js_1 = require("../config/dataSource.js");
const Recibo_js_1 = require("../entities/Recibo.js");
const Network_js_1 = require("../entities/Network.js");
const Seriepago_js_1 = require("../entities/Seriepago.js");
const helpers_js_1 = require("../utils/helpers.js");
class ReciboController {
    static async index(req, res) {
        try {
            const search = req.query.search || '';
            const status = req.query.status;
            const month = req.query.month;
            const page = parseInt(req.query.page || '1', 10);
            const limit = parseInt(req.query.limit || '15', 10);
            const skip = (page - 1) * limit;
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
            const qb = reciboRepo
                .createQueryBuilder('recibo')
                .leftJoinAndSelect('recibo.client', 'client')
                .leftJoinAndSelect('recibo.network', 'network')
                .leftJoinAndSelect('recibo.seriepago', 'seriepago');
            if (search) {
                qb.andWhere('(LOWER(client.name) LIKE LOWER(:search) OR client.document LIKE :search OR recibo.seriecompleta LIKE :search)', { search: `%${search}%` });
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
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async show(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
            const recibo = await reciboRepo.findOne({
                where: { id },
                relations: ['client', 'network', 'seriepago'],
            });
            if (!recibo) {
                return res.status(404).json({ message: 'Recibo no encontrado.' });
            }
            return res.json(recibo);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { date, vencimiento, month, amount, descuento, seriepago_id, client_id, network_id, } = req.body;
            if (!date || !vencimiento || !month || !amount || !seriepago_id || !client_id || !network_id) {
                return res.status(422).json({ message: 'Todos los campos del recibo son obligatorios.' });
            }
            const serieRepo = dataSource_js_1.AppDataSource.getRepository(Seriepago_js_1.Seriepago);
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
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
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
                toast: (0, helpers_js_1.toastJson)('Recibo emitido con éxito'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async print(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
            const recibo = await reciboRepo.findOne({
                where: { id },
                relations: ['client', 'network', 'seriepago'],
            });
            if (!recibo) {
                return res.status(404).json({ message: 'Recibo no encontrado.' });
            }
            // Tamaño ticket 80mm: 226.77 pt de ancho x 580 pt de alto
            const doc = new pdfkit_1.default({
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
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async generarMasivo(req, res) {
        try {
            const { month, date, vencimiento, seriepago_id } = req.body;
            if (!month || !date || !vencimiento || !seriepago_id) {
                return res.status(422).json({ message: 'Todos los datos de facturación masiva son obligatorios.' });
            }
            const serieRepo = dataSource_js_1.AppDataSource.getRepository(Seriepago_js_1.Seriepago);
            const serie = await serieRepo.findOne({ where: { id: parseInt(seriepago_id, 10) } });
            if (!serie) {
                return res.status(404).json({ message: 'Serie de pago no encontrada.' });
            }
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const activeNetworks = await networkRepo.find({
                where: { status: '0' },
                relations: ['client'],
            });
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
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
                toast: (0, helpers_js_1.toastJson)(`Generación masiva completada: ${creados} recibos emitidos`),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.ReciboController = ReciboController;
