"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.ClientController = void 0;
const typeorm_1 = require("typeorm");
const dataSource_js_1 = require("../config/dataSource.js");
const Client_js_1 = require("../entities/Client.js");
const helpers_js_1 = require("../utils/helpers.js");
class ClientController {
    static async index(req, res) {
        try {
            const search = req.query.search || '';
            const page = parseInt(req.query.page || '1', 10);
            const limit = parseInt(req.query.limit || '15', 10);
            const skip = (page - 1) * limit;
            const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
            let whereCondition = {};
            if (search) {
                whereCondition = [
                    { name: (0, typeorm_1.ILike)(`%${search}%`) },
                    { document: (0, typeorm_1.Like)(`%${search}%`) },
                ];
            }
            const [clients, total] = await clientRepo.findAndCount({
                where: whereCondition,
                relations: ['ubigeo', 'networks'],
                order: { id: 'DESC' },
                skip,
                take: limit,
            });
            return res.json({
                data: clients,
                meta: {
                    current_page: page,
                    per_page: limit,
                    total,
                    last_page: Math.ceil(total / limit),
                },
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async show(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
            const client = await clientRepo.findOne({
                where: { id },
                relations: ['ubigeo', 'networks', 'recibos'],
            });
            if (!client) {
                return res.status(404).json({ message: 'Cliente no encontrado.' });
            }
            return res.json(client);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { document, name, direccion, ubigeo_id } = req.body;
            if (!document || !name) {
                return res.status(422).json({ message: 'Documento y nombre son obligatorios.' });
            }
            const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
            const existing = await clientRepo.findOne({ where: { document: document.trim() } });
            if (existing) {
                return res.status(422).json({ message: 'Ya existe un cliente con este número de documento.' });
            }
            const client = clientRepo.create({
                document: document.trim(),
                name,
                direccion: direccion ? direccion.trim().toUpperCase() : null,
                ubigeo_id: ubigeo_id ? parseInt(ubigeo_id, 10) : null,
            });
            await clientRepo.save(client);
            return res.status(201).json({
                message: 'Cliente registrado exitosamente.',
                data: client,
                toast: (0, helpers_js_1.toastJson)('Cliente registrado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const { document, name, direccion, ubigeo_id } = req.body;
            const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
            const client = await clientRepo.findOne({ where: { id } });
            if (!client) {
                return res.status(404).json({ message: 'Cliente no encontrado.' });
            }
            if (document && document.trim() !== client.document) {
                const existing = await clientRepo.findOne({ where: { document: document.trim() } });
                if (existing && existing.id !== client.id) {
                    return res.status(422).json({ message: 'El número de documento ya está en uso por otro cliente.' });
                }
                client.document = document.trim();
            }
            client.name = name;
            client.direccion = direccion ? direccion.trim().toUpperCase() : null;
            if (ubigeo_id !== undefined) {
                client.ubigeo_id = ubigeo_id ? parseInt(ubigeo_id, 10) : null;
            }
            await clientRepo.save(client);
            return res.json({
                message: 'Cliente actualizado correctamente.',
                data: client,
                toast: (0, helpers_js_1.toastJson)('Cliente actualizado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
            const client = await clientRepo.findOne({ where: { id } });
            if (!client) {
                return res.status(404).json({ message: 'Cliente no encontrado.' });
            }
            // Soft delete compatible con Laravel SoftDeletes
            await clientRepo.softRemove(client);
            return res.json({
                message: 'Cliente eliminado correctamente.',
                toast: (0, helpers_js_1.toastJson)('Cliente eliminado correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async consultaSunat(req, res) {
        try {
            const document = req.params.document;
            const result = await (0, helpers_js_1.consultarDocumento)(document);
            return res.json(result);
        }
        catch (error) {
            return res.status(500).json({ success: false, mensaje: error.message });
        }
    }
}
exports.ClientController = ClientController;
