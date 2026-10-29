"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.EquipoController = exports.ProductController = exports.MarcaController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Product_js_1 = require("../entities/Product.js");
const Marca_js_1 = require("../entities/Marca.js");
const Equipo_js_1 = require("../entities/Equipo.js");
const helpers_js_1 = require("../utils/helpers.js");
class MarcaController {
    static async index(req, res) {
        try {
            const repo = dataSource_js_1.AppDataSource.getRepository(Marca_js_1.Marca);
            const marcas = await repo.find({ relations: ['products'], order: { id: 'ASC' } });
            return res.json(marcas);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name } = req.body;
            if (!name)
                return res.status(422).json({ message: 'El nombre de la marca es requerido.' });
            const repo = dataSource_js_1.AppDataSource.getRepository(Marca_js_1.Marca);
            const marca = repo.create({ name });
            await repo.save(marca);
            return res.status(201).json({ message: 'Marca registrada.', data: marca, toast: (0, helpers_js_1.toastJson)('Marca creada con éxito') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name } = req.body;
            const repo = dataSource_js_1.AppDataSource.getRepository(Marca_js_1.Marca);
            const marca = await repo.findOne({ where: { id } });
            if (!marca)
                return res.status(404).json({ message: 'Marca no encontrada.' });
            marca.name = name;
            await repo.save(marca);
            return res.json({ message: 'Marca actualizada.', data: marca, toast: (0, helpers_js_1.toastJson)('Marca actualizada correctamente') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const repo = dataSource_js_1.AppDataSource.getRepository(Marca_js_1.Marca);
            const marca = await repo.findOne({ where: { id } });
            if (!marca)
                return res.status(404).json({ message: 'Marca no encontrada.' });
            await repo.remove(marca);
            return res.json({ message: 'Marca eliminada.', toast: (0, helpers_js_1.toastJson)('Marca eliminada con éxito') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.MarcaController = MarcaController;
class ProductController {
    static async index(req, res) {
        try {
            const repo = dataSource_js_1.AppDataSource.getRepository(Product_js_1.Product);
            const products = await repo.find({ relations: ['marca'], order: { id: 'ASC' } });
            return res.json(products);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, marca_id } = req.body;
            if (!name || !marca_id)
                return res.status(422).json({ message: 'Nombre y Marca son requeridos.' });
            const repo = dataSource_js_1.AppDataSource.getRepository(Product_js_1.Product);
            const product = repo.create({ name, marca_id: parseInt(marca_id, 10) });
            await repo.save(product);
            return res.status(201).json({ message: 'Producto registrado.', data: product, toast: (0, helpers_js_1.toastJson)('Producto registrado') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, marca_id } = req.body;
            const repo = dataSource_js_1.AppDataSource.getRepository(Product_js_1.Product);
            const product = await repo.findOne({ where: { id } });
            if (!product)
                return res.status(404).json({ message: 'Producto no encontrado.' });
            product.name = name;
            if (marca_id)
                product.marca_id = parseInt(marca_id, 10);
            await repo.save(product);
            return res.json({ message: 'Producto actualizado.', data: product, toast: (0, helpers_js_1.toastJson)('Producto actualizado') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const repo = dataSource_js_1.AppDataSource.getRepository(Product_js_1.Product);
            const product = await repo.findOne({ where: { id } });
            if (!product)
                return res.status(404).json({ message: 'Producto no encontrado.' });
            await repo.remove(product);
            return res.json({ message: 'Producto eliminado.', toast: (0, helpers_js_1.toastJson)('Producto eliminado') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.ProductController = ProductController;
class EquipoController {
    static async index(req, res) {
        try {
            const network_id = req.query.network_id;
            const repo = dataSource_js_1.AppDataSource.getRepository(Equipo_js_1.Equipo);
            const where = {};
            if (network_id)
                where.network_id = parseInt(network_id, 10);
            const equipos = await repo.find({ where, relations: ['network'], order: { id: 'DESC' } });
            return res.json(equipos);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { name, descripcion, mac, type, price, network_id } = req.body;
            const finalDesc = descripcion || name;
            if (!finalDesc || !network_id) {
                return res.status(422).json({ message: 'Descripción y red son obligatorios.' });
            }
            const repo = dataSource_js_1.AppDataSource.getRepository(Equipo_js_1.Equipo);
            const equipo = repo.create({
                descripcion: finalDesc,
                type: type || 'ALQUILADO',
                price: price ? parseFloat(price) : 0,
                mac: mac ? mac.trim().toUpperCase() : null,
                network_id: parseInt(network_id, 10),
            });
            await repo.save(equipo);
            return res.status(201).json({ message: 'Equipo registrado.', data: equipo, toast: (0, helpers_js_1.toastJson)('Equipo asignado correctamente') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { name, descripcion, mac, type, price } = req.body;
            const repo = dataSource_js_1.AppDataSource.getRepository(Equipo_js_1.Equipo);
            const equipo = await repo.findOne({ where: { id } });
            if (!equipo)
                return res.status(404).json({ message: 'Equipo no encontrado.' });
            if (descripcion || name)
                equipo.descripcion = descripcion || name;
            if (mac !== undefined)
                equipo.mac = mac ? mac.trim().toUpperCase() : null;
            if (type)
                equipo.type = type;
            if (price !== undefined)
                equipo.price = parseFloat(price);
            await repo.save(equipo);
            return res.json({ message: 'Equipo actualizado.', data: equipo, toast: (0, helpers_js_1.toastJson)('Equipo modificado correctamente') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const repo = dataSource_js_1.AppDataSource.getRepository(Equipo_js_1.Equipo);
            const equipo = await repo.findOne({ where: { id } });
            if (!equipo)
                return res.status(404).json({ message: 'Equipo no encontrado.' });
            await repo.remove(equipo);
            return res.json({ message: 'Equipo eliminado.', toast: (0, helpers_js_1.toastJson)('Equipo desvinculado con éxito') });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.EquipoController = EquipoController;
