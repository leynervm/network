"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.toastJson = toastJson;
exports.alertJson = alertJson;
exports.validarFibra = validarFibra;
exports.amountDays = amountDays;
exports.consultarDocumento = consultarDocumento;
const axios_1 = __importDefault(require("axios"));
const dataSource_js_1 = require("../config/dataSource.js");
const Client_js_1 = require("../entities/Client.js");
function toastJson(title, icon = 'success') {
    return { icon, title };
}
function alertJson(title, text, icon = 'success') {
    return { icon, title, text };
}
function validarFibra(type) {
    if (!type)
        return false;
    const t = type.trim().toUpperCase();
    return (t === 'CABLE TELEVISIÓN' ||
        t === 'FIBRA OPTICA' ||
        t === 'FIBRA OPTICA + CABLE TELEVISIÓN' ||
        t === 'FIBRA' ||
        t === 'FIBRA+TV' ||
        t === 'TV');
}
function amountDays(startDate, endDate, amount) {
    const start = new Date(startDate);
    // Último día del mes de startDate
    const endOfMonth = new Date(start.getFullYear(), start.getMonth() + 1, 0);
    const diffTime = Math.abs(endOfMonth.getTime() - start.getTime());
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    const dailyPrice = amount / endOfMonth.getDate();
    return parseFloat((diffDays * dailyPrice).toFixed(2));
}
async function consultarDocumento(document) {
    const cleanDoc = (document || '').replace(/\D/g, '').trim();
    const docLen = cleanDoc.length;
    if (docLen !== 8 && docLen !== 11) {
        return {
            success: false,
            mensaje: 'El documento debe tener 8 (DNI) u 11 (RUC) dígitos.',
        };
    }
    try {
        const clientRepo = dataSource_js_1.AppDataSource.getRepository(Client_js_1.Client);
        // 1. Buscar en la base de datos local con TRIM
        const existing = await clientRepo
            .createQueryBuilder('c')
            .where('TRIM(c.document) = :cleanDoc', { cleanDoc })
            .getOne();
        if (existing) {
            const clientName = (existing.name || '').trim();
            const clientDir = existing.direccion ? existing.direccion.trim() : null;
            return {
                success: true,
                name: clientName,
                client_id: Number(existing.id),
                direccion: clientDir,
                ubigeo_id: existing.ubigeo_id || null,
                data: {
                    id: Number(existing.id),
                    client_id: Number(existing.id),
                    name: clientName,
                    nombre_o_razon_social: clientName,
                    direccion: clientDir,
                    ubigeo_id: existing.ubigeo_id || null,
                },
            };
        }
        // 2. Si no existe localmente, consultar API externa RENIEC / SUNAT
        const token = process.env.API_SUNAT_TOKEN || '';
        const urldni = process.env.API_SUNAT_URL_DNI || 'https://api.apis.net.pe/v1/dni?numero=';
        const urlruc = process.env.API_SUNAT_URL_RUC || 'https://api.apis.net.pe/v1/ruc?numero=';
        const url = docLen === 8 ? `${urldni}${cleanDoc}` : `${urlruc}${cleanDoc}`;
        const referer = docLen === 8 ? 'https://apis.net.pe/consulta-dni-api' : 'http://apis.net.pe/api-ruc';
        try {
            const response = await axios_1.default.get(url, {
                headers: {
                    ...(token ? { Authorization: `Bearer ${token}` } : {}),
                    Referer: referer,
                },
                timeout: 4000,
            });
            if (response.status === 200 && response.data) {
                const data = response.data;
                const name = docLen === 8
                    ? `${data.nombres || ''} ${data.apellidoPaterno || ''} ${data.apellidoMaterno || ''}`.trim()
                    : data.razonSocial || data.nombre || '';
                const direccion = data.direccion ? String(data.direccion).trim() : null;
                if (name) {
                    const newClient = clientRepo.create({
                        document: cleanDoc,
                        name: name.toUpperCase(),
                        direccion: direccion ? direccion.toUpperCase() : null,
                    });
                    await clientRepo.save(newClient);
                    return {
                        success: true,
                        name: newClient.name,
                        client_id: Number(newClient.id),
                        direccion: newClient.direccion,
                        data: {
                            id: Number(newClient.id),
                            client_id: Number(newClient.id),
                            name: newClient.name,
                            nombre_o_razon_social: newClient.name,
                            direccion: newClient.direccion,
                            ubigeo_id: null,
                        },
                    };
                }
            }
        }
        catch {
            // Ignorar fallo de API externa para continuar al mensaje amigable
        }
        return {
            success: false,
            mensaje: 'Documento no encontrado en RENIEC/SUNAT. Puede ingresar los nombres manualmente.',
        };
    }
    catch (error) {
        let msg = error.message || 'Error al consultar servicio externo.';
        if (error.code === 'ECONNABORTED' || msg.includes('timeout')) {
            msg = 'Tiempo de espera agotado al consultar servicio externo. Puede ingresar los datos manualmente.';
        }
        return {
            success: false,
            mensaje: msg,
        };
    }
}
