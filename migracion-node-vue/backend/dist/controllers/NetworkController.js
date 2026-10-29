"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.NetworkController = void 0;
const dataSource_js_1 = require("../config/dataSource.js");
const Network_js_1 = require("../entities/Network.js");
const Portboxnav_js_1 = require("../entities/Portboxnav.js");
const Antena_js_1 = require("../entities/Antena.js");
const Client_js_1 = require("../entities/Client.js");
const Ubigeo_js_1 = require("../entities/Ubigeo.js");
const helpers_js_1 = require("../utils/helpers.js");
class NetworkController {
    static async index(req, res) {
        try {
            const search = req.query.search || '';
            const status = req.query.status;
            const type = req.query.type;
            const page = parseInt(req.query.page || '1', 10);
            const limit = parseInt(req.query.limit || '15', 10);
            const skip = (page - 1) * limit;
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const qb = networkRepo
                .createQueryBuilder('network')
                .leftJoinAndSelect('network.client', 'client')
                .leftJoinAndSelect('network.user', 'user')
                .leftJoinAndSelect('network.ubigeo', 'ubigeo')
                .leftJoinAndSelect('network.equipos', 'equipos')
                .leftJoinAndSelect('network.recibos', 'recibos');
            // Restricción por rol de usuario
            const isAdmin = req.user?.roles?.some((r) => r.name.toLowerCase() === 'administrador');
            if (!isAdmin && req.user) {
                qb.andWhere('(network.user_id = :userId OR network.user_id IS NULL)', { userId: req.user.id });
            }
            if (search) {
                qb.andWhere('(LOWER(client.name) LIKE LOWER(:search) OR client.document LIKE :search OR network.code LIKE :search OR LOWER(network.descripcion) LIKE LOWER(:search))', { search: `%${search}%` });
            }
            if (status !== undefined && status !== '') {
                qb.andWhere('network.status = :status', { status });
            }
            if (type) {
                let typesToMatch = [type];
                if (type === 'FIBRA' || type === 'FIBRA OPTICA') {
                    typesToMatch = ['FIBRA', 'FIBRA OPTICA'];
                }
                else if (type === 'TV' || type === 'CABLE TELEVISIÓN' || type === 'CABLE TELEVISION') {
                    typesToMatch = ['TV', 'CABLE TELEVISIÓN', 'CABLE TELEVISION'];
                }
                else if (type === 'FIBRA+TV' || type === 'FIBRA OPTICA + CABLE TELEVISIÓN' || type === 'FIBRA OPTICA + CABLE TELEVISION') {
                    typesToMatch = ['FIBRA+TV', 'FIBRA OPTICA + CABLE TELEVISIÓN', 'FIBRA OPTICA + CABLE TELEVISION'];
                }
                else if (type === 'SATELITAL' || type === 'INTERNET SATELITAL') {
                    typesToMatch = ['SATELITAL', 'INTERNET SATELITAL'];
                }
                qb.andWhere('network.type IN (:...typesToMatch)', { typesToMatch });
            }
            qb.orderBy('network.id', 'DESC').skip(skip).take(limit);
            const [networks, total] = await qb.getManyAndCount();
            // Cargar los datos de networkable (Portboxnav con Boxnav, Spliter, OLT o Antena)
            const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
            const antenaRepo = dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena);
            for (const net of networks) {
                const isFibraNet = (0, helpers_js_1.validarFibra)(net.type) || (net.networkable_type && net.networkable_type.includes('Portboxnav'));
                if (isFibraNet && net.networkable_id) {
                    const port = await portRepo.findOne({
                        where: { id: net.networkable_id },
                        relations: ['boxnav', 'boxnav.spliter', 'boxnav.spliter.olt'],
                    });
                    net.networkable = port;
                }
                else if (net.networkable_type && net.networkable_type.includes('Antena') && net.networkable_id) {
                    const antena = await antenaRepo.findOne({ where: { id: net.networkable_id } });
                    net.networkable = antena;
                }
            }
            return res.json({
                data: networks,
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
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const network = await networkRepo.findOne({
                where: { id },
                relations: [
                    'client',
                    'user',
                    'ubigeo',
                    'equipos',
                    'recibos',
                    'recibos.seriepago',
                ],
            });
            if (!network) {
                return res.status(404).json({ message: 'Conexión de red no encontrada.' });
            }
            const isAdmin = req.user?.roles?.some((r) => r.name.toLowerCase() === 'administrador');
            if (network.user_id && network.user_id !== req.user?.id && !isAdmin) {
                return res.status(403).json({ message: 'No eres propietario del registro de cliente de internet.' });
            }
            const isFibraNet = (0, helpers_js_1.validarFibra)(network.type) || (network.networkable_type && network.networkable_type.includes('Portboxnav'));
            if (isFibraNet && network.networkable_id) {
                const port = await dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav).findOne({
                    where: { id: network.networkable_id },
                    relations: ['boxnav', 'boxnav.spliter', 'boxnav.spliter.olt'],
                });
                network.networkable = port;
            }
            else if (network.networkable_type && network.networkable_type.includes('Antena') && network.networkable_id) {
                const antena = await dataSource_js_1.AppDataSource.getRepository(Antena_js_1.Antena).findOne({
                    where: { id: network.networkable_id },
                });
                network.networkable = antena;
            }
            return res.json(network);
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async store(req, res) {
        try {
            const { date, descripcion, type, telefono, price, direccion, typelocal, client_id, ubigeo_id, networkable_id, latitude, longitude, zoom, codigo_slp, location, } = req.body;
            if (!date || !type || !client_id || !networkable_id) {
                return res.status(422).json({ message: 'Fecha, tipo, cliente y nodo/puerto de red son requeridos.' });
            }
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const isFibra = (0, helpers_js_1.validarFibra)(type);
            const networkable_type = isFibra
                ? 'App\\Models\\Portboxnav'
                : 'App\\Models\\Antena';
            let portnumber = null;
            if (isFibra) {
                const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
                const port = await portRepo.findOne({ where: { id: parseInt(networkable_id, 10) } });
                if (!port) {
                    return res.status(404).json({ message: 'Puerto NAP seleccionado no existe.' });
                }
                if (port.status === '1') {
                    return res.status(422).json({
                        message: 'El puerto NAP seleccionado ya se encuentra ocupado.',
                        alert: (0, helpers_js_1.alertJson)('Puerto no disponible', 'El puerto NAP ya está asignado a otro cliente.', 'warning'),
                    });
                }
                port.status = '1';
                await portRepo.save(port);
                portnumber = port.code;
            }
            let finalLocation = location ? location.trim().toUpperCase() : null;
            if (!finalLocation && ubigeo_id) {
                const ubigeoRepo = dataSource_js_1.AppDataSource.getRepository(Ubigeo_js_1.Ubigeo);
                const ubigeo = await ubigeoRepo.findOne({ where: { id: parseInt(ubigeo_id, 10) } });
                if (ubigeo && ubigeo.distrito) {
                    finalLocation = ubigeo.distrito.trim().toUpperCase();
                }
            }
            const network = networkRepo.create({
                date,
                code: null,
                portnumber,
                descripcion: descripcion ? descripcion.trim().toUpperCase() : null,
                type,
                telefono: telefono ? telefono.trim() : null,
                price: parseFloat(price) || 0.0,
                direccion: direccion ? direccion.trim().toUpperCase() : '',
                typelocal: typelocal || 'PROPIO',
                status: '0',
                client_id: parseInt(client_id, 10),
                user_id: req.user?.id || null,
                ubigeo_id: ubigeo_id ? parseInt(ubigeo_id, 10) : null,
                networkable_type,
                networkable_id: parseInt(networkable_id, 10),
                latitude: latitude ? parseFloat(latitude) : null,
                longitude: longitude ? parseFloat(longitude) : null,
                zoom: zoom ? parseInt(zoom, 10) : 14,
                codigo_slp: codigo_slp ? codigo_slp.trim() : null,
                location: finalLocation,
            });
            await networkRepo.save(network);
            // Generar código 1:1 estilo CI000{id}
            network.code = `CI000${network.id}`;
            await networkRepo.save(network);
            return res.status(201).json({
                message: 'Servicio de red registrado exitosamente.',
                data: network,
                toast: (0, helpers_js_1.toastJson)('Conexión registrada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async update(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const network = await networkRepo.findOne({ where: { id } });
            if (!network) {
                return res.status(404).json({ message: 'Conexión no encontrada.' });
            }
            const { client_name, date, type, descripcion, telefono, price, direccion, typelocal, status, ubigeo_id, networkable_id, latitude, longitude, zoom, codigo_slp, location, } = req.body;
            if (client_name && network.client_id) {
                const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
                await clientRepo.update({ id: network.client_id }, { name: client_name.trim().toUpperCase() });
            }
            if (date !== undefined)
                network.date = date;
            if (type !== undefined)
                network.type = type;
            if (descripcion !== undefined)
                network.descripcion = descripcion ? descripcion.trim().toUpperCase() : null;
            if (telefono !== undefined)
                network.telefono = telefono || null;
            if (price !== undefined)
                network.price = parseFloat(price);
            if (direccion !== undefined)
                network.direccion = (direccion || '').trim().toUpperCase();
            if (typelocal !== undefined)
                network.typelocal = typelocal;
            if (status !== undefined)
                network.status = status;
            if (ubigeo_id !== undefined) {
                network.ubigeo_id = ubigeo_id ? parseInt(ubigeo_id, 10) : null;
                if (network.ubigeo_id) {
                    const ubigeoRepo = dataSource_js_1.AppDataSource.getRepository(Ubigeo_js_1.Ubigeo);
                    const ubigeo = await ubigeoRepo.findOne({ where: { id: network.ubigeo_id } });
                    if (ubigeo && ubigeo.distrito) {
                        network.location = ubigeo.distrito.trim().toUpperCase();
                    }
                }
            }
            if (networkable_id !== undefined && networkable_id) {
                const newNetworkableId = parseInt(networkable_id, 10);
                const targetType = type || network.type;
                const isFibra = (0, helpers_js_1.validarFibra)(targetType);
                if (isFibra) {
                    const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
                    const newPort = await portRepo.findOne({ where: { id: newNetworkableId } });
                    if (!newPort) {
                        return res.status(404).json({ message: 'Puerto NAP seleccionado no existe.' });
                    }
                    if (Number(network.networkable_id) !== newNetworkableId || !network.networkable_type?.includes('Portboxnav')) {
                        if (network.networkable_id && network.networkable_type?.includes('Portboxnav')) {
                            const oldPort = await portRepo.findOne({ where: { id: network.networkable_id } });
                            if (oldPort) {
                                oldPort.status = '0';
                                await portRepo.save(oldPort);
                            }
                        }
                        newPort.status = '1';
                        await portRepo.save(newPort);
                    }
                    network.networkable_type = 'App\\Models\\Portboxnav';
                    network.networkable_id = newNetworkableId;
                    network.portnumber = newPort.code;
                }
                else {
                    if (network.networkable_id && network.networkable_type?.includes('Portboxnav')) {
                        const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
                        const oldPort = await portRepo.findOne({ where: { id: network.networkable_id } });
                        if (oldPort) {
                            oldPort.status = '0';
                            await portRepo.save(oldPort);
                        }
                    }
                    network.networkable_type = 'App\\Models\\Antena';
                    network.networkable_id = newNetworkableId;
                    network.portnumber = null;
                }
            }
            if (latitude !== undefined)
                network.latitude = latitude ? parseFloat(latitude) : null;
            if (longitude !== undefined)
                network.longitude = longitude ? parseFloat(longitude) : null;
            if (zoom !== undefined)
                network.zoom = zoom ? parseInt(zoom, 10) : null;
            if (codigo_slp !== undefined)
                network.codigo_slp = codigo_slp || null;
            if (location !== undefined)
                network.location = location ? location.trim().toUpperCase() : network.location;
            await networkRepo.save(network);
            return res.json({
                message: 'Conexión actualizada exitosamente.',
                data: network,
                toast: (0, helpers_js_1.toastJson)('Conexión actualizada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async toggleStatus(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const network = await networkRepo.findOne({ where: { id } });
            if (!network) {
                return res.status(404).json({ message: 'Conexión no encontrada.' });
            }
            // 0 = Activo, 2 = Suspendido
            network.status = network.status === '0' ? '2' : '0';
            await networkRepo.save(network);
            const statusText = network.status === '0' ? 'Servicio Activado' : 'Servicio Suspendido';
            return res.json({
                message: statusText,
                status: network.status,
                toast: (0, helpers_js_1.toastJson)(statusText),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async destroy(req, res) {
        try {
            const id = parseInt(req.params.id, 10);
            const networkRepo = dataSource_js_1.AppDataSource.getRepository(Network_js_1.Network);
            const network = await networkRepo.findOne({ where: { id } });
            if (!network) {
                return res.status(404).json({ message: 'Conexión no encontrada.' });
            }
            // Si liberamos una conexión de fibra, restablecer el puerto a disponible ('0')
            if (network.networkable_type.includes('Portboxnav')) {
                const portRepo = dataSource_js_1.AppDataSource.getRepository(Portboxnav_js_1.Portboxnav);
                const port = await portRepo.findOne({ where: { id: network.networkable_id } });
                if (port) {
                    port.status = '0';
                    await portRepo.save(port);
                }
            }
            await networkRepo.remove(network);
            return res.json({
                message: 'Conexión eliminada correctamente.',
                toast: (0, helpers_js_1.toastJson)('Conexión eliminada correctamente'),
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.NetworkController = NetworkController;
