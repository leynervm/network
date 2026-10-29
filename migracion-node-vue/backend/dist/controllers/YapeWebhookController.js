"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.YapeWebhookController = void 0;
const typeorm_1 = require("typeorm");
const dataSource_js_1 = require("../config/dataSource.js");
const YapeNotification_js_1 = require("../entities/YapeNotification.js");
class YapeWebhookController {
    static async store(req, res) {
        try {
            const repo = dataSource_js_1.AppDataSource.getRepository(YapeNotification_js_1.YapeNotification);
            const notification = repo.create({
                title: req.body.title || 'Sin título',
                content: req.body.content || '',
            });
            await repo.save(notification);
            return res.status(200).json({
                status: 'success',
                message: 'Notificación guardada correctamente',
                data: notification,
            });
        }
        catch (error) {
            return res.status(500).json({
                status: 'error',
                message: 'Ocurrió un error al procesar el webhook',
            });
        }
    }
    static async index(req, res) {
        try {
            const search = req.query.search || '';
            const page = parseInt(req.query.page || '1', 10);
            const limit = parseInt(req.query.limit || '15', 10);
            const skip = (page - 1) * limit;
            const repo = dataSource_js_1.AppDataSource.getRepository(YapeNotification_js_1.YapeNotification);
            let where = {};
            if (search) {
                where = [
                    { title: (0, typeorm_1.Like)(`%${search}%`) },
                    { content: (0, typeorm_1.Like)(`%${search}%`) },
                ];
            }
            const [notifications, total] = await repo.findAndCount({
                where,
                order: { id: 'DESC' },
                skip,
                take: limit,
            });
            return res.json({
                data: notifications,
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
}
exports.YapeWebhookController = YapeWebhookController;
