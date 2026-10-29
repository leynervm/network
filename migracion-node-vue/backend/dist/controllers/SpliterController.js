"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.SpliterController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Spliter_js_1 = require("../entities/Spliter.js");
const SpliterPort_js_1 = require("../entities/SpliterPort.js");
const Olt_js_1 = require("../entities/Olt.js");
const helpers_js_1 = require("../utils/helpers.js");
class SpliterController {
    static async index(req, res) {
        try {
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
            const where = {};
            if (req.query.olt_id) {
                where.olt_id = parseInt(req.query.olt_id, 10);
            }
            const spliters = await spliterRepo.find({
                where,
                relations: ['olt', 'boxnavs', 'ports'],
                order: { id: 'ASC' },
            });
            return res.json(spliters);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async show(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
            const spliter = await spliterRepo.findOne({
                where: { id },
                relations: ['olt', 'boxnavs', 'boxnavs.portboxnavs', 'ports'],
            });
            if (!spliter) {
                return res.status(404).json({ message: 'Splitter no encontrado.' });
            }
            return res.json(spliter);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, outs, direccion, olt_id } = req.body;
            if (!name || !outs || !olt_id) {
                return res.status(422).json({ message: 'Nombre, salidas y OLT son obligatorios.' });
            }
            const oltRepo = dataSource_js_1.AppDataSource.getRepository(Olt_js_1.Olt);
            const olt = await oltRepo.findOne({ where: { id: parseInt(olt_id, 10) }, relations: ['spliters'] });
            if (!olt) {
                return res.status(404).json({ message: 'OLT seleccionada no existe.' });
            }
            if ((olt.spliters?.length || 0) >= olt.outs) {
                return res.status(422).json({
                    message: 'La OLT ya ha alcanzado su límite de salidas registradas.',
                    alert: (0, helpers_js_1.alertJson)('Límite alcanzado', 'La OLT ya tiene ocupadas todas sus salidas.', 'warning'),
                });
            }
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
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
            const portRepo = dataSource_js_1.AppDataSource.getRepository(SpliterPort_js_1.SpliterPort);
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
                toast: (0, helpers_js_1.toastJson)('Splitter registrado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, outs, direccion } = req.body;
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
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
                    alert: (0, helpers_js_1.alertJson)('Error al actualizar Splitter !', 'N° de salidas es menor a la cantidad de Cajas NAP vinculadas.', 'info'),
                });
            }
            spliter.name = name;
            spliter.outs = newOuts;
            spliter.direccion = direccion ? direccion.trim().toUpperCase() : null;
            await spliterRepo.save(spliter);
            return res.json({
                message: 'Splitter actualizado con éxito.',
                data: spliter,
                toast: (0, helpers_js_1.toastJson)('Splitter actualizado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const spliterRepo = dataSource_js_1.AppDataSource.getRepository(Spliter_js_1.Spliter);
            const spliter = await spliterRepo.findOne({ where: { id } });
            if (!spliter) {
                return res.status(404).json({ message: 'Splitter no encontrado.' });
            }
            await spliterRepo.remove(spliter);
            return res.json({
                message: 'Splitter eliminado con éxito.',
                toast: (0, helpers_js_1.toastJson)('Splitter eliminado correctamente'),
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
            const portRepo = dataSource_js_1.AppDataSource.getRepository(SpliterPort_js_1.SpliterPort);
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
                toast: (0, helpers_js_1.toastJson)('Puerto actualizado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.SpliterController = SpliterController;
