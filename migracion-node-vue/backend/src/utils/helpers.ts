import axios from 'axios';
import { AppDataSource } from '../config/dataSource.js';
import { Client } from '../entities/Client.js';

export function toastJson(title: string, icon: string = 'success') {
  return { icon, title };
}

export function alertJson(title: string, text: string, icon: string = 'success') {
  return { icon, title, text };
}

export function validarFibra(type: string): boolean {
  if (!type) return false;
  const t = type.trim().toUpperCase();
  return (
    t === 'CABLE TELEVISIÓN' ||
    t === 'FIBRA OPTICA' ||
    t === 'FIBRA OPTICA + CABLE TELEVISIÓN' ||
    t === 'FIBRA' ||
    t === 'FIBRA+TV' ||
    t === 'TV'
  );
}

export function amountDays(startDate: string, endDate: string, amount: number): number {
  const start = new Date(startDate);
  // Último día del mes de startDate
  const endOfMonth = new Date(start.getFullYear(), start.getMonth() + 1, 0);
  const diffTime = Math.abs(endOfMonth.getTime() - start.getTime());
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  const dailyPrice = amount / endOfMonth.getDate();
  return parseFloat((diffDays * dailyPrice).toFixed(2));
}

export async function consultarDocumento(document: string) {
  const cleanDoc = (document || '').replace(/\D/g, '').trim();
  const docLen = cleanDoc.length;

  if (docLen !== 8 && docLen !== 11) {
    return {
      success: false,
      mensaje: 'El documento debe tener 8 (DNI) u 11 (RUC) dígitos.',
    };
  }

  try {
    const clientRepo = AppDataSource.getRepository(Client);
    
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
      const response = await axios.get(url, {
        headers: {
          ...(token ? { Authorization: `Bearer ${token}` } : {}),
          Referer: referer,
        },
        timeout: 4000,
      });

      if (response.status === 200 && response.data) {
        const data = response.data;
        const name =
          docLen === 8
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
    } catch {
      // Ignorar fallo de API externa para continuar al mensaje amigable
    }

    return {
      success: false,
      mensaje: 'Documento no encontrado en RENIEC/SUNAT. Puede ingresar los nombres manualmente.',
    };
  } catch (error: any) {
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
