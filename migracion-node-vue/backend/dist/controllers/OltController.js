"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.OltController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Olt_js_1 = require("../entities/Olt.js");
const OltPort_js_1 = require("../entities/OltPort.js");
const Network_js_1 = require("../entities/Network.js");
const helpers_js_1 = require("../utils/helpers.js");
class OltController {
    static async index(req, res) {
        try {
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const olts = await oltRepo.find({
                relations: ['spliters', 'spliters.boxnavs', 'ports'],
                order: { id: 'ASC' },
            });
            return res.json(olts);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async show(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const olt = await oltRepo.findOne({
                where: { id },
                relations: [
                    'spliters',
                    'spliters.boxnavs',
                    'spliters.boxnavs.portboxnavs',
                    'spliters.ports',
                    'ports',
                ],
            });
            if (!olt) {
                return res.status(404).json({ message: 'OLT no encontrada.' });
            }
            // Ordenar splitters por id y ordenar sus boxnavs y puertos
            if (olt.spliters) {
                olt.spliters.sort((a, b) => Number(a.id) - Number(b.id));
                const allPortIds = [];
                for (const spliter of olt.spliters) {
                    if (spliter.boxnavs) {
                        spliter.boxnavs.sort((b1, b2) => Number(b1.splitter_port || 0) - Number(b2.splitter_port || 0));
                        for (const box of spliter.boxnavs) {
                            if (box.portboxnavs) {
                                box.portboxnavs.sort((p1, p2) => Number(p1.id) - Number(p2.id));
                                for (const p of box.portboxnavs) {
                                    allPortIds.push(Number(p.id));
                                }
                            }
                        }
                    }
                }
                // Poblar relación polimórfica network y network.client
                if (allPortIds.length > 0) {
                    const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
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
                    for (const spliter of olt.spliters) {
                        if (spliter.boxnavs) {
                            for (const box of spliter.boxnavs) {
                                if (box.portboxnavs) {
                                    box.portboxnavs.forEach((p) => {
                                        p.network = netMap.get(Number(p.id)) || null;
                                    });
                                }
                            }
                        }
                    }
                }
            }
            return res.json(olt);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, outs } = req.body;
            if (!name || !outs) {
                return res.status(422).json({ message: 'El nombre y las salidas son obligatorios.' });
            }
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const existing = await oltRepo.findOne({ where: { name: name.trim().toUpperCase() } });
            if (existing) {
                return res.status(422).json({ message: 'Ya existe una OLT con este nombre.' });
            }
            // Código automático (A, B, C...)
            const count = await oltRepo.count();
            const code = String.fromCharCode(65 + (count % 26));
            const olt = oltRepo.create({
                name,
                code,
                outs: parseInt(outs, 10),
            });
            await oltRepo.save(olt);
            // Crear puertos automáticamente si no existen
            const portRepo = dataSource_js_1.AppDataSource.getRepository(OltPort_js_1.OltPort);
            for (let i = 1; i <= olt.outs; i++) {
                const port = portRepo.create({
                    olt_id: olt.id,
                    port_number: i,
                });
                await portRepo.save(port);
            }
            return res.status(201).json({
                message: 'OLT creada con éxito.',
                data: olt,
                toast: (0, helpers_js_1.toastJson)('OLT registrada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, outs } = req.body;
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const olt = await oltRepo.findOne({
                where: { id },
                relations: ['spliters'],
            });
            if (!olt) {
                return res.status(404).json({ message: 'OLT no encontrada.' });
            }
            const newOuts = parseInt(outs, 10);
            if (newOuts < (olt.spliters?.length || 0)) {
                return res.status(422).json({
                    message: 'N° de salidas de OLT es menor a la cantidad de spliters registrados.',
                    alert: (0, helpers_js_1.alertJson)('Error al actualizar OLT !', 'N° de salidas de OLT es menor a la cantidad de spliters registrados.', 'info'),
                });
            }
            olt.name = name;
            olt.outs = newOuts;
            await oltRepo.save(olt);
            return res.json({
                message: 'OLT actualizada con éxito.',
                data: olt,
                toast: (0, helpers_js_1.toastJson)('OLT actualizada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const olt = await oltRepo.findOne({ where: { id } });
            if (!olt) {
                return res.status(404).json({ message: 'OLT no encontrada.' });
            }
            await oltRepo.remove(olt);
            return res.json({
                message: 'OLT eliminada con éxito.',
                toast: (0, helpers_js_1.toastJson)('OLT eliminada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async updatePort(req, res) {
        try {
            const portId = parseInt(req.params.portId, 10);
            const { alias, direccion } = req.body;
            const portRepo = dataSource_js_1.AppDataSource.getRepository(OltPort_js_1.OltPort);
            let port = await portRepo.findOne({ where: { id: portId } });
            if (!port) {
                return res.status(404).json({ message: 'Puerto no encontrado.' });
            }
            port.alias = alias ? alias.trim().toUpperCase() : null;
            port.direccion = direccion ? direccion.trim().toUpperCase() : null;
            await portRepo.save(port);
            return res.json({
                message: 'Puerto actualizado correctamente.',
                data: port,
                toast: (0, helpers_js_1.toastJson)('Puerto actualizado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.OltController = OltController;
