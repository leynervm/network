"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.AntenaController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Antena_js_1 = require("../entities/Antena.js");
const helpers_js_1 = require("../utils/helpers.js");
class AntenaController {
    static async index(req, res) {
        try {
            const antenaRepo = dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena);
            const antenas = await antenaRepo.find({ order: { id: 'ASC' } });
            return res.json(antenas);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, direccion } = req.body;
            if (!name) {
                return res.status(422).json({ message: 'El nombre de la antena es requerido.' });
            }
            const antenaRepo = dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena);
            const antena = antenaRepo.create({
                name,
                direccion: direccion ? direccion.trim().toUpperCase() : null,
            });
            await antenaRepo.save(antena);
            return res.status(201).json({
                message: 'Antena creada con éxito.',
                data: antena,
                toast: (0, helpers_js_1.toastJson)('Antena registrada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, direccion } = req.body;
            const antenaRepo = dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena);
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
                toast: (0, helpers_js_1.toastJson)('Antena actualizada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const antenaRepo = dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena);
            const antena = await antenaRepo.findOne({ where: { id } });
            if (!antena) {
                return res.status(404).json({ message: 'Antena no encontrada.' });
            }
            await antenaRepo.remove(antena);
            return res.json({
                message: 'Antena eliminada correctamente.',
                toast: (0, helpers_js_1.toastJson)('Antena eliminada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.AntenaController = AntenaController;
