import { Request, Response } from 'express';
import { AppDataSource } from '../config/dataSource.js';
import { Ubigeo } from '../entities/Ubigeo.js';
import { Seriepago } from '../entities/Seriepago.js';
import { toastJson } from '../utils/helpers.js';

export class UbigeoController {
  static async index(req: Request, res: Response) {
    try {
      const search = (req.query.search as string) || '';
      const repo = AppDataSource.getRepository(Ubigeo);
      const qb = repo.createQueryBuilder('ubigeo');

      if (search) {
        qb.where(
          '(LOWER(ubigeo.distrito) LIKE LOWER(:search) OR LOWER(ubigeo.provincia) LIKE LOWER(:search) OR LOWER(ubigeo.region) LIKE LOWER(:search))',
          { search: `%${search}%` }
        );
      }

      const list = await qb.take(50).getMany();
      return res.json(list);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}

export class SeriepagoController {
  static async index(req: Request, res: Response) {
    try {
      const repo = AppDataSource.getRepository(Seriepago);
      const list = await repo.find({ order: { id: 'ASC' } });
      return res.json(list);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const descripcion = req.body.descripcion || req.body.name;
      const { serie } = req.body;
      if (!descripcion || !serie) return res.status(422).json({ message: 'Nombre y serie son obligatorios.' });

      const repo = AppDataSource.getRepository(Seriepago);
      const seriepago = repo.create({
        descripcion,
        serie,
        contador: 0,
      });

      await repo.save(seriepago);
      return res.status(201).json({ message: 'Serie registrada.', data: seriepago, toast: toastJson('Serie registrada') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const descripcion = req.body.descripcion || req.body.name;
      const { serie } = req.body;
      const contador = req.body.contador !== undefined ? req.body.contador : req.body.count;
      const repo = AppDataSource.getRepository(Seriepago);

      const item = await repo.findOne({ where: { id } });
      if (!item) return res.status(404).json({ message: 'Serie no encontrada.' });

      if (descripcion) item.descripcion = descripcion;
      if (serie) item.serie = serie;
      if (contador !== undefined) item.contador = parseInt(contador, 10);

      await repo.save(item);
      return res.json({ message: 'Serie actualizada.', data: item, toast: toastJson('Serie actualizada') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
