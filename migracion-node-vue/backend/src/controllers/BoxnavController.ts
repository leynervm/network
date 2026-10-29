import { Request, Response } from 'express';
import { AppDataSource } from '../config/dataSource.js';
import { Boxnav } from '../entities/Boxnav.js';
import { Portboxnav } from '../entities/Portboxnav.js';
import { Spliter } from '../entities/Spliter.js';
import { Network } from '../entities/Network.js';
import { toastJson, alertJson } from '../utils/helpers.js';

export class BoxnavController {
  static async index(req: Request, res: Response) {
    try {
      const boxnavRepo = AppDataSource.getRepository(Boxnav);
      const networkRepo = AppDataSource.getRepository(Network);
      const where: any = {};
      if (req.query.spliter_id) {
        where.spliter_id = parseInt(req.query.spliter_id as string, 10);
      }
      const boxnavs = await boxnavRepo.find({
        where,
        relations: ['spliter', 'spliter.olt', 'portboxnavs'],
        order: { id: 'ASC' },
      });

      // Adjuntar la relación polimórfica network a cada puerto
      const allPortIds = boxnavs.flatMap((b) => (b.portboxnavs || []).map((p) => Number(p.id)));
      if (allPortIds.length > 0) {
        const networks = await networkRepo
          .createQueryBuilder('net')
          .leftJoinAndSelect('net.client', 'client')
          .where('net.networkable_id IN (:...allPortIds)', { allPortIds })
          .andWhere('net.networkable_type LIKE :type', { type: '%Portboxnav%' })
          .getMany();

        const netMap = new Map<number, Network>();
        networks.forEach((n) => {
          if (n.networkable_id) netMap.set(Number(n.networkable_id), n);
        });

        boxnavs.forEach((b) => {
          if (b.portboxnavs) {
            b.portboxnavs.sort((p1, p2) => Number(p1.id) - Number(p2.id));
            b.portboxnavs.forEach((p) => {
              (p as any).network = netMap.get(Number(p.id)) || null;
            });
          }
        });
      }

      return res.json(boxnavs);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async show(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const boxnavRepo = AppDataSource.getRepository(Boxnav);
      const networkRepo = AppDataSource.getRepository(Network);
      const boxnav = await boxnavRepo.findOne({
        where: { id },
        relations: ['spliter', 'spliter.olt', 'portboxnavs'],
      });

      if (!boxnav) {
        return res.status(404).json({ message: 'Caja NAP no encontrada.' });
      }

      if (boxnav.portboxnavs && boxnav.portboxnavs.length > 0) {
        boxnav.portboxnavs.sort((a, b) => Number(a.id) - Number(b.id));
        const portIds = boxnav.portboxnavs.map((p) => Number(p.id));
        const networks = await networkRepo
          .createQueryBuilder('net')
          .leftJoinAndSelect('net.client', 'client')
          .where('net.networkable_id IN (:...portIds)', { portIds })
          .andWhere('net.networkable_type LIKE :type', { type: '%Portboxnav%' })
          .getMany();

        const netMap = new Map<number, Network>();
        networks.forEach((n) => {
          if (n.networkable_id) netMap.set(Number(n.networkable_id), n);
        });

        boxnav.portboxnavs.forEach((p) => {
          (p as any).network = netMap.get(Number(p.id)) || null;
        });
      }

      return res.json(boxnav);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, outs, direccion, spliter_id, splitter_port } = req.body;
      if (!name || !outs || !spliter_id) {
        return res.status(422).json({ message: 'Nombre, salidas y Splitter son obligatorios.' });
      }

      const spliterRepo = AppDataSource.getRepository(Spliter);
      const spliter = await spliterRepo.findOne({
        where: { id: parseInt(spliter_id, 10) },
        relations: ['boxnavs'],
      });

      if (!spliter) {
        return res.status(404).json({ message: 'El splitter seleccionado no existe.' });
      }

      if ((spliter.boxnavs?.length || 0) >= spliter.outs) {
        return res.status(422).json({
          message: 'El splitter ya tiene ocupadas todas sus salidas.',
          alert: alertJson('Límite alcanzado', 'El splitter seleccionado no tiene puertos disponibles.', 'warning'),
        });
      }

      const boxnavRepo = AppDataSource.getRepository(Boxnav);
      const nextNum = (spliter.boxnavs?.length || 0) + 1;
      const code = `${spliter.code}-${nextNum}`;

      const boxnav = boxnavRepo.create({
        name,
        code,
        outs: parseInt(outs, 10),
        direccion: direccion ? direccion.trim().toUpperCase() : null,
        spliter_id: spliter.id,
        splitter_port: splitter_port ? parseInt(splitter_port, 10) : nextNum,
        status: '0',
      });

      await boxnavRepo.save(boxnav);

      // Generar puertos para la caja NAP
      const portRepo = AppDataSource.getRepository(Portboxnav);
      for (let i = 1; i <= boxnav.outs; i++) {
        const portCode = `${boxnav.code}-${i}`;
        const port = portRepo.create({
          code: portCode,
          status: '0',
          boxnav_id: boxnav.id,
        });
        await portRepo.save(port);
      }

      return res.status(201).json({
        message: 'Caja NAP registrada exitosamente.',
        data: boxnav,
        toast: toastJson('Caja NAP creada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { name, direccion, splitter_port } = req.body;
      const boxnavRepo = AppDataSource.getRepository(Boxnav);

      const boxnav = await boxnavRepo.findOne({ where: { id } });
      if (!boxnav) {
        return res.status(404).json({ message: 'Caja NAP no encontrada.' });
      }

      boxnav.name = name;
      boxnav.direccion = direccion ? direccion.trim().toUpperCase() : null;
      if (splitter_port !== undefined) {
        boxnav.splitter_port = splitter_port ? parseInt(splitter_port, 10) : null;
      }

      await boxnavRepo.save(boxnav);
      return res.json({
        message: 'Caja NAP actualizada con éxito.',
        data: boxnav,
        toast: toastJson('Caja NAP actualizada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const boxnavRepo = AppDataSource.getRepository(Boxnav);
      const boxnav = await boxnavRepo.findOne({
        where: { id },
        relations: ['portboxnavs'],
      });

      if (!boxnav) {
        return res.status(404).json({ message: 'Caja NAP no encontrada.' });
      }

      // Validar si tiene puertos ocupados
      const hasOccupied = boxnav.portboxnavs?.some((p) => p.status === '1');
      if (hasOccupied) {
        return res.status(422).json({
          message: 'No se puede eliminar la Caja NAP porque contiene puertos en uso por clientes activos.',
          alert: alertJson('Operación denegada', 'La Caja NAP tiene conexiones de clientes activas.', 'error'),
        });
      }

      await boxnavRepo.remove(boxnav);
      return res.json({
        message: 'Caja NAP eliminada con éxito.',
        toast: toastJson('Caja NAP eliminada correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async updatePort(req: Request, res: Response) {
    try {
      const portId = parseInt(req.params.portId, 10);
      const { alias, direccion, status } = req.body;
      const portRepo = AppDataSource.getRepository(Portboxnav);

      const port = await portRepo.findOne({ where: { id: portId } });
      if (!port) {
        return res.status(404).json({ message: 'Puerto NAP no encontrado.' });
      }

      if (alias !== undefined) port.alias = alias ? alias.trim().toUpperCase() : null;
      if (direccion !== undefined) port.direccion = direccion ? direccion.trim().toUpperCase() : null;
      if (status !== undefined) port.status = status;

      await portRepo.save(port);
      return res.json({
        message: 'Puerto NAP actualizado.',
        data: port,
        toast: toastJson('Puerto actualizado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
