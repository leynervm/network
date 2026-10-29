"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.ReportController = void 0;
const exceljs_1 = __importDefault(require("exceljs"));
const dataSource_js_1 = require("../config/dataSource.js");
const Recibo_js_1 = require("../entities/Recibo.js");
const Payment_js_1 = require("../entities/Payment.js");
const Network_js_1 = require("../entities/Network.js");
class ReportController {
    static async recibos(req, res) {
        try {
            const { start_date, end_date, status, format } = req.query;
            const reciboRepo = dataSource_js_1.AppDataSource.getRepository(Recibo_js_1.Recibo);
            const qb = reciboRepo
                .createQueryBuilder('recibo')
                .leftJoinAndSelect('recibo.client', 'client')
                .leftJoinAndSelect('recibo.network', 'network')
                .leftJoinAndSelect('recibo.seriepago', 'seriepago');
            if (start_date)
                qb.andWhere('recibo.date >= :start_date', { start_date });
            if (end_date)
                qb.andWhere('recibo.date <= :end_date', { end_date });
            if (status !== undefined && status !== '')
                qb.andWhere('recibo.status = :status', { status });
            qb.orderBy('recibo.date', 'DESC');
            const data = await qb.getMany();
            const totalAmount = data.reduce((sum, r) => sum + Number(r.total || 0), 0);
            const pagados = data.filter((r) => r.status === '1').length;
            const pendientes = data.filter((r) => r.status === '0').length;
            if (format === 'excel') {
                const workbook = new exceljs_1.default.Workbook();
                const sheet = workbook.addWorksheet('Reporte de Recibos');
                sheet.columns = [
                    { header: 'Serie Completa', key: 'seriecompleta', width: 18 },
                    { header: 'Cliente', key: 'client', width: 30 },
                    { header: 'Documento', key: 'document', width: 15 },
                    { header: 'Fecha Emisión', key: 'date', width: 15 },
                    { header: 'Mes', key: 'month', width: 15 },
                    { header: 'Total (S/)', key: 'total', width: 15 },
                    { header: 'Estado', key: 'status', width: 15 },
                ];
                data.forEach((r) => {
                    sheet.addRow({
                        seriecompleta: r.seriecompleta,
                        client: r.client?.name || '',
                        document: r.client?.document || '',
                        date: r.date,
                        month: r.month,
                        total: Number(r.total).toFixed(2),
                        status: r.status === '1' ? 'PAGADO' : 'PENDIENTE',
                    });
                });
                res.setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                res.setHeader('Content-Disposition', 'attachment; filename="reporte_recibos.xlsx"');
                return await workbook.xlsx.write(res);
            }
            return res.json({
                data,
                summary: {
                    total_count: data.length,
                    total_amount: totalAmount.toFixed(2),
                    pagados,
                    pendientes,
                },
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async payments(req, res) {
        try {
            const { start_date, end_date, formapay_id, format } = req.query;
            const paymentRepo = dataSource_js_1.AppDataSource.getRepository(Payment_js_1.Payment);
            const qb = paymentRepo
                .createQueryBuilder('payment')
                .leftJoinAndSelect('payment.formapay', 'formapay');
            if (start_date)
                qb.andWhere('payment.date >= :start_date', { start_date });
            if (end_date)
                qb.andWhere('payment.date <= :end_date', { end_date });
            if (formapay_id)
                qb.andWhere('payment.formapay_id = :formapay_id', { formapay_id });
            qb.orderBy('payment.date', 'DESC');
            const data = await qb.getMany();
            const totalAmount = data.reduce((sum, p) => sum + Number(p.amount || 0), 0);
            if (format === 'excel') {
                const workbook = new exceljs_1.default.Workbook();
                const sheet = workbook.addWorksheet('Reporte de Pagos');
                sheet.columns = [
                    { header: 'Fecha Pago', key: 'date', width: 15 },
                    { header: 'Mes Aplicado', key: 'month', width: 15 },
                    { header: 'Forma de Pago', key: 'formapay', width: 20 },
                    { header: 'Código Operación', key: 'codetransferencia', width: 20 },
                    { header: 'Monto (S/)', key: 'amount', width: 15 },
                    { header: 'Detalle', key: 'detalle', width: 30 },
                ];
                data.forEach((p) => {
                    sheet.addRow({
                        date: p.date,
                        month: p.month,
                        formapay: p.formapay?.name || 'EFECTIVO',
                        codetransferencia: p.codetransferencia || '-',
                        amount: Number(p.amount).toFixed(2),
                        detalle: p.detalle || '',
                    });
                });
                res.setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                res.setHeader('Content-Disposition', 'attachment; filename="reporte_pagos.xlsx"');
                return await workbook.xlsx.write(res);
            }
            return res.json({
                data,
                summary: {
                    total_count: data.length,
                    total_amount: totalAmount.toFixed(2),
                },
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async networks(req, res) {
        try {
            const { status, type, format } = req.query;
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const qb = networkRepo
                .createQueryBuilder('network')
                .leftJoinAndSelect('network.client', 'client')
                .leftJoinAndSelect('network.user', 'user')
                .leftJoinAndSelect('network.ubigeo', 'ubigeo');
            if (status !== undefined && status !== '')
                qb.andWhere('network.status = :status', { status });
            if (type)
                qb.andWhere('network.type = :type', { type });
            const data = await qb.getMany();
            const activos = data.filter((n) => n.status === '0').length;
            const suspendidos = data.filter((n) => n.status === '2').length;
            const totalRecurrente = data.reduce((sum, n) => sum + Number(n.price || 0), 0);
            if (format === 'excel') {
                const workbook = new exceljs_1.default.Workbook();
                const sheet = workbook.addWorksheet('Reporte de Redes');
                sheet.columns = [
                    { header: 'Código', key: 'code', width: 15 },
                    { header: 'Cliente', key: 'client', width: 30 },
                    { header: 'Documento', key: 'document', width: 15 },
                    { header: 'Tipo Servicio', key: 'type', width: 25 },
                    { header: 'Precio Plan (S/)', key: 'price', width: 15 },
                    { header: 'Estado', key: 'status', width: 15 },
                    { header: 'Dirección', key: 'direccion', width: 30 },
                ];
                data.forEach((n) => {
                    sheet.addRow({
                        code: n.code,
                        client: n.client?.name || '',
                        document: n.client?.document || '',
                        type: n.type,
                        price: Number(n.price).toFixed(2),
                        status: n.status === '0' ? 'ACTIVO' : 'SUSPENDIDO',
                        direccion: n.direccion || '',
                    });
                });
                res.setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                res.setHeader('Content-Disposition', 'attachment; filename="reporte_redes.xlsx"');
                return await workbook.xlsx.write(res);
            }
            return res.json({
                data,
                summary: {
                    total_count: data.length,
                    activos,
                    suspendidos,
                    total_recurrente: totalRecurrente.toFixed(2),
                },
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.ReportController = ReportController;
