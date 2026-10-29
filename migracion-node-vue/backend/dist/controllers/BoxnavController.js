"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.BoxnavController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Boxnav_js_1 = require("../entities/Boxnav.js");
const Portboxnav_js_1 = require("../entities/Portboxnav.js");
const Spliter_js_1 = require("../entities/Spliter.js");
const Network_js_1 = require("../entities/Network.js");
const helpers_js_1 = require("../utils/helpers.js");
class BoxnavController {
    static async index(req, res) {
        try {
            const boxnavRepo = dataSource_js_1.AppDataSource.getRepository(Boxnav_js_1.Boxnav);
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const where = {};
            if (req.query.spliter_id) {
                where.spliter_id = parseInt(req.query.spliter_id, 10);
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
                const netMap = new Map();
                networks.forEach((n) => {
                    if (n.networkable_id)
                        netMap.set(Number(n.networkable_id), n);
                });
                boxnavs.forEach((b) => {
                    if (b.portboxnavs) {
                        b.portboxnavs.sort((p1, p2) => Number(p1.id) - Number(p2.id));
                        b.portboxnavs.forEach((p) => {
                            p.network = netMap.get(Number(p.id)) || null;
                        });
                    }
                });
            }
            return res.json(boxnavs);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async show(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const boxnavRepo = dataSource_js_1.AppDataSource.getRepository(Boxnav_js_1.Boxnav);
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
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
                const netMap = new Map();
                networks.forEach((n) => {
                    if (n.networkable_id)
                        netMap.set(Number(n.networkable_id), n);
                });
                boxnav.portboxnavs.forEach((p) => {
                    p.network = netMap.get(Number(p.id)) || null;
                });
            }
            return res.json(boxnav);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, outs, direccion, spliter_id, splitter_port } = req.body;
            if (!name || !outs || !spliter_id) {
                return res.status(422).json({ message: 'Nombre, salidas y Splitter son obligatorios.' });
            }
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
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
                    alert: (0, helpers_js_1.alertJson)('Límite alcanzado', 'El splitter seleccionado no tiene puertos disponibles.', 'warning'),
                });
            }
            const boxnavRepo = dataSource_js_1.AppDataSource.getRepository(Boxnav_js_1.Boxnav);
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
            const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
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
                toast: (0, helpers_js_1.toastJson)('Caja NAP creada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, direccion, splitter_port } = req.body;
            const boxnavRepo = dataSource_js_1.AppDataSource.getRepository(Boxnav_js_1.Boxnav);
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
                toast: (0, helpers_js_1.toastJson)('Caja NAP actualizada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const boxnavRepo = dataSource_js_1.AppDataSource.getRepository(Boxnav_js_1.Boxnav);
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
                    alert: (0, helpers_js_1.alertJson)('Operación denegada', 'La Caja NAP tiene conexiones de clientes activas.', 'error'),
                });
            }
            await boxnavRepo.remove(boxnav);
            return res.json({
                message: 'Caja NAP eliminada con éxito.',
                toast: (0, helpers_js_1.toastJson)('Caja NAP eliminada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async updatePort(req, res) {
        try {
            const portId = parseInt(req.params.portId, 10);
            const { alias, direccion, status } = req.body;
            const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
            const port = await portRepo.findOne({ where: { id: portId } });
            if (!port) {
                return res.status(404).json({ message: 'Puerto NAP no encontrado.' });
            }
            if (alias !== undefined)
                port.alias = alias ? alias.trim().toUpperCase() : null;
            if (direccion !== undefined)
                port.direccion = direccion ? direccion.trim().toUpperCase() : null;
            if (status !== undefined)
                port.status = status;
            await portRepo.save(port);
            return res.json({
                message: 'Puerto NAP actualizado.',
                data: port,
                toast: (0, helpers_js_1.toastJson)('Puerto actualizado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.BoxnavController = BoxnavController;
