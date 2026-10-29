"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.SeriepagoController = exports.UbigeoController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Ubigeo_js_1 = require("../entities/Ubigeo.js");
const Seriepago_js_1 = require("../entities/Seriepago.js");
const helpers_js_1 = require("../utils/helpers.js");
class UbigeoController {
    static async index(req, res) {
        try {
            const search = req.query.search || '';
            const repo = dataSource_js_1.AppDataSource.getRepository(Ubigeo_js_1.Ubigeo);
            const qb = repo.createQueryBuilder('ubigeo');
            if (search) {
                qb.where('(LOWER(ubigeo.distrito) LIKE LOWER(:search) OR LOWER(ubigeo.provincia) LIKE LOWER(:search) OR LOWER(ubigeo.region) LIKE LOWER(:search))', { search: `%${search}%` });
            }
            const list = await qb.take(50).getMany();
            return res.json(list);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.UbigeoController = UbigeoController;
class SeriepagoController {
    static async index(req, res) {
        try {
            const repo = dataSource_js_1.AppDataSource.getRepository(Seriepago_js_1.Seriepago);
            const list = await repo.find({ order: { id: 'ASC' } });
            return res.json(list);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const descripcion = req.body.descripcion || req.body.name;
            const { serie } = req.body;
            if (!descripcion || !serie)
                return res.status(422).json({ message: 'Nombre y serie son obligatorios.' });
            const repo = dataSource_js_1.AppDataSource.getRepository(Seriepago_js_1.Seriepago);
            const seriepago = repo.create({
                descripcion,
                serie,
                contador: 0,
            });
            await repo.save(seriepago);
            return res.status(201).json({ message: 'Serie registrada.', data: seriepago, toast: (0, helpers_js_1.toastJson)('Serie registrada') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const descripcion = req.body.descripcion || req.body.name;
            const { serie } = req.body;
            const contador = req.body.contador !== undefined ? req.body.contador : req.body.count;
            const repo = dataSource_js_1.AppDataSource.getRepository(Seriepago_js_1.Seriepago);
            const item = await repo.findOne({ where: { id } });
            if (!item)
                return res.status(404).json({ message: 'Serie no encontrada.' });
            if (descripcion)
                item.descripcion = descripcion;
            if (serie)
                item.serie = serie;
            if (contador !== undefined)
                item.contador = parseInt(contador, 10);
            await repo.save(item);
            return res.json({ message: 'Serie actualizada.', data: item, toast: (0, helpers_js_1.toastJson)('Serie actualizada') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.SeriepagoController = SeriepagoController;
