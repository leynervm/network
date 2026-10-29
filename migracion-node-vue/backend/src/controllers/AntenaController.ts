import { Request, Response } from 'express';
import { AppDataSource } from '../config/dataSource.js';
import { Antena } from '../entities/Antena.js';
import { toastJson } from '../utils/helpers.js';

export class AntenaController {
  static async index(req: Request, res: Response) {
    try {
      const antenaRepo = AppDataSource.getRepository(Antena);
      const antenas = await antenaRepo.find({ order: { id: 'ASC' } });
      return res.json(antenas);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, direccion } = req.body;
      if (!name) {
        return res.status(422).json({ message: 'El nombre de la antena es requerido.' });
      }

      const antenaRepo = AppDataSource.getRepository(Antena);
      const antena = antenaRepo.create({
        name,
        direccion: direccion ? direccion.trim().toUpperCase() : null,
      });

      await antenaRepo.save(antena);
      return res.status(201).json({
        message: 'Antena creada con éxito.',
        data: antena,
        toast: toastJson('Antena registrada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { name, direccion } = req.body;
      const antenaRepo = AppDataSource.getRepository(Antena);

      const antena = await antenaRepo.findOne({ where: { id } });
      if (!antena) {
        return res.status(404).json({ message: 'Antena no encontrada.' });
      }

      antena.name = name;
      antena.direccion = direccion ? direccion.trim().toUpperCase() : null;
      await antenaRepo.save(antena);

      return res.json({
        message: 'Antena actualizada correctamente.',
        data: antena,
        toast: toastJson('Antena actualizada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const antenaRepo = AppDataSource.getRepository(Antena);
      const antena = await antenaRepo.findOne({ where: { id } });

      if (!antena) {
        return res.status(404).json({ message: 'Antena no encontrada.' });
      }

      await antenaRepo.remove(antena);
      return res.json({
        message: 'Antena eliminada correctamente.',
        toast: toastJson('Antena eliminada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
