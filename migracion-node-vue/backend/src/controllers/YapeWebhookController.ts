import { Request, Response } from 'express';
import { Like } from 'typeorm';
import { AppDataSource } from '../config/dataSource.js';
import { YapeNotification } from '../entities/YapeNotification.js';

export class YapeWebhookController {
  static async store(req: Request, res: Response) {
    try {
      const repo = AppDataSource.getRepository(YapeNotification);
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
    } catch (error: any) {
      return res.status(500).json({
        status: 'error',
        message: 'Ocurrió un error al procesar el webhook',
      });
    }
  }

  static async index(req: Request, res: Response) {
    try {
      const search = (req.query.search as string) || '';
      const page = parseInt((req.query.page as string) || '1', 10);
      const limit = parseInt((req.query.limit as string) || '15', 10);
      const skip = (page - 1) * limit;

      const repo = AppDataSource.getRepository(YapeNotification);
      let where: any = {};
      if (search) {
        where = [
          { title: Like(`%${search}%`) },
          { content: Like(`%${search}%`) },
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
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
