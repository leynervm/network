import { Request, Response } from 'express';
import { AppDataSource } from '../config/dataSource.js';
import { Spliter } from '../entities/Spliter.js';
import { SpliterPort } from '../entities/SpliterPort.js';
import { Olt } from '../entities/Olt.js';
import { toastJson, alertJson } from '../utils/helpers.js';

export class SpliterController {
  static async index(req: Request, res: Response) {
    try {
      const spliterRepo = AppDataSource.getRepository(Spliter);
      const where: any = {};
      if (req.query.olt_id) {
        where.olt_id = parseInt(req.query.olt_id as string, 10);
      }
      const spliters = await spliterRepo.find({
        where,
        relations: ['olt', 'boxnavs', 'ports'],
        order: { id: 'ASC' },
      });
      return res.json(spliters);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async show(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const spliterRepo = AppDataSource.getRepository(Spliter);
      const spliter = await spliterRepo.findOne({
        where: { id },
        relations: ['olt', 'boxnavs', 'boxnavs.portboxnavs', 'ports'],
      });

      if (!spliter) {
        return res.status(404).json({ message: 'Splitter no encontrado.' });
      }

      return res.json(spliter);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, outs, direccion, olt_id } = req.body;
      if (!name || !outs || !olt_id) {
        return res.status(422).json({ message: 'Nombre, salidas y OLT son obligatorios.' });
      }

      const oltRepo = AppDataSource.getRepository(Olt);
      const olt = await oltRepo.findOne({ where: { id: parseInt(olt_id, 10) }, relations: ['spliters'] });
      if (!olt) {
        return res.status(404).json({ message: 'OLT seleccionada no existe.' });
      }

      if ((olt.spliters?.length || 0) >= olt.outs) {
        return res.status(422).json({
          message: 'La OLT ya ha alcanzado su límite de salidas registradas.',
          alert: alertJson('Límite alcanzado', 'La OLT ya tiene ocupadas todas sus salidas.', 'warning'),
        });
      }

      const spliterRepo = AppDataSource.getRepository(Spliter);
      const spliterCount = (olt.spliters?.length || 0) + 1;
      const code = `${olt.code}-${spliterCount}`;

      const spliter = spliterRepo.create({
        name,
        code,
        outs: parseInt(outs, 10),
        direccion: direccion ? direccion.trim().toUpperCase() : null,
        olt_id: olt.id,
      });

      await spliterRepo.save(spliter);

      // Crear puertos del splitter
      const portRepo = AppDataSource.getRepository(SpliterPort);
      for (let i = 1; i <= spliter.outs; i++) {
        const port = portRepo.create({
          spliter_id: spliter.id,
          port_number: i,
        });
        await portRepo.save(port);
      }

      return res.status(201).json({
        message: 'Splitter registrado exitosamente.',
        data: spliter,
        toast: toastJson('Splitter registrado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { name, outs, direccion } = req.body;
      const spliterRepo = AppDataSource.getRepository(Spliter);

      const spliter = await spliterRepo.findOne({
        where: { id },
        relations: ['boxnavs'],
      });

      if (!spliter) {
        return res.status(404).json({ message: 'Splitter no encontrado.' });
      }

      const newOuts = parseInt(outs, 10);
      if (newOuts < (spliter.boxnavs?.length || 0)) {
        return res.status(422).json({
          message: 'N° de salidas del splitter es menor a la cantidad de Cajas NAP conectadas.',
          alert: alertJson(
            'Error al actualizar Splitter !',
            'N° de salidas es menor a la cantidad de Cajas NAP vinculadas.',
            'info'
          ),
        });
      }

      spliter.name = name;
      spliter.outs = newOuts;
      spliter.direccion = direccion ? direccion.trim().toUpperCase() : null;
      await spliterRepo.save(spliter);

      return res.json({
        message: 'Splitter actualizado con éxito.',
        data: spliter,
        toast: toastJson('Splitter actualizado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const spliterRepo = AppDataSource.getRepository(Spliter);
      const spliter = await spliterRepo.findOne({ where: { id } });

      if (!spliter) {
        return res.status(404).json({ message: 'Splitter no encontrado.' });
      }

      await spliterRepo.remove(spliter);
      return res.json({
        message: 'Splitter eliminado con éxito.',
        toast: toastJson('Splitter eliminado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async updatePort(req: Request, res: Response) {
    try {
      const portId = parseInt(req.params.portId, 10);
      const { alias, direccion } = req.body;
      const portRepo = AppDataSource.getRepository(SpliterPort);

      let port = await portRepo.findOne({ where: { id: portId } });
      if (!port) {
        return res.status(404).json({ message: 'Puerto no encontrado.' });
      }

      port.alias = alias ? alias.trim().toUpperCase() : null;
      port.direccion = direccion ? direccion.trim().toUpperCase() : null;
      await portRepo.save(port);

      return res.json({
        message: 'Puerto de splitter actualizado.',
        data: port,
        toast: toastJson('Puerto actualizado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
