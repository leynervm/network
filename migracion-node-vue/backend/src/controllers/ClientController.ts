import { Request, Response } from 'express';
import { Like, ILike } from 'typeorm';
import { AppDataSource } from '../config/dataSource.js';
import { Client } from '../entities/Client.js';
import { consultarDocumento, toastJson } from '../utils/helpers.js';

export class ClientController {
  static async index(req: Request, res: Response) {
    try {
      const search = (req.query.search as string) || '';
      const page = parseInt((req.query.page as string) || '1', 10);
      const limit = parseInt((req.query.limit as string) || '15', 10);
      const skip = (page - 1) * limit;

      const clientRepo = AppDataSource.getRepository(Client);

      let whereCondition: any = {};
      if (search) {
        whereCondition = [
          { name: ILike(`%${search}%`) },
          { document: Like(`%${search}%`) },
        ];
      }

      const [clients, total] = await clientRepo.findAndCount({
        where: whereCondition,
        relations: ['ubigeo', 'networks'],
        order: { id: 'DESC' },
        skip,
        take: limit,
      });

      return res.json({
        data: clients,
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
      const clientRepo = AppDataSource.getRepository(Client);
      const client = await clientRepo.findOne({
        where: { id },
        relations: ['ubigeo', 'networks', 'recibos'],
      });

      if (!client) {
        return res.status(404).json({ message: 'Cliente no encontrado.' });
      }

      return res.json(client);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { document, name, direccion, ubigeo_id } = req.body;
      if (!document || !name) {
        return res.status(422).json({ message: 'Documento y nombre son obligatorios.' });
      }

      const clientRepo = AppDataSource.getRepository(Client);
      const existing = await clientRepo.findOne({ where: { document: document.trim() } });
      if (existing) {
        return res.status(422).json({ message: 'Ya existe un cliente con este número de documento.' });
      }

      const client = clientRepo.create({
        document: document.trim(),
        name,
        direccion: direccion ? direccion.trim().toUpperCase() : null,
        ubigeo_id: ubigeo_id ? parseInt(ubigeo_id, 10) : null,
      });

      await clientRepo.save(client);
      return res.status(201).json({
        message: 'Cliente registrado exitosamente.',
        data: client,
        toast: toastJson('Cliente registrado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { document, name, direccion, ubigeo_id } = req.body;
      const clientRepo = AppDataSource.getRepository(Client);

      const client = await clientRepo.findOne({ where: { id } });
      if (!client) {
        return res.status(404).json({ message: 'Cliente no encontrado.' });
      }

      if (document && document.trim() !== client.document) {
        const existing = await clientRepo.findOne({ where: { document: document.trim() } });
        if (existing && existing.id !== client.id) {
          return res.status(422).json({ message: 'El número de documento ya está en uso por otro cliente.' });
        }
        client.document = document.trim();
      }

      client.name = name;
      client.direccion = direccion ? direccion.trim().toUpperCase() : null;
      if (ubigeo_id !== undefined) {
        client.ubigeo_id = ubigeo_id ? parseInt(ubigeo_id, 10) : null;
      }

      await clientRepo.save(client);
      return res.json({
        message: 'Cliente actualizado correctamente.',
        data: client,
        toast: toastJson('Cliente actualizado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const clientRepo = AppDataSource.getRepository(Client);
      const client = await clientRepo.findOne({ where: { id } });

      if (!client) {
        return res.status(404).json({ message: 'Cliente no encontrado.' });
      }

      // Soft delete compatible con Laravel SoftDeletes
      await clientRepo.softRemove(client);
      return res.json({
        message: 'Cliente eliminado correctamente.',
        toast: toastJson('Cliente eliminado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async consultaSunat(req: Request, res: Response) {
    try {
      const document = req.params.document;
      const result = await consultarDocumento(document);
      return res.json(result);
    } catch (error: any) {
      return res.status(500).json({ success: false, mensaje: error.message });
    }
  }
}
