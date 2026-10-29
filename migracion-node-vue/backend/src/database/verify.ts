import { AppDataSource } from '../config/dataSource.js';

async function verify() {
  await AppDataSource.initialize();
  console.log('--- REPORTE DE VERIFICACIÓN DE BASE DE DATOS TYPEORM ---');

  const tables = [
    'users',
    'roles',
    'permissions',
    'model_has_roles',
    'role_has_permissions',
    'olts',
    'spliters',
    'boxnavs',
    'portboxnavs',
    'seriepagos',
    'formapays',
    'ubigeos',
    'clients',
    'networks',
    'recibos',
    'payments',
    'equipos',
    'marcas',
    'products',
    'accesos',
    'yape_notifications',
    'olt_ports',
    'spliter_ports',
  ];

  const isMysql = AppDataSource.options.type === 'mysql' || AppDataSource.options.type === 'mariadb';
  const q = isMysql ? '`' : '"';
  for (const table of tables) {
    const res = await AppDataSource.query(`SELECT COUNT(*) as count FROM ${q}${table}${q}`);
    console.log(`Tabla [${table}]: ${res[0].count} registros`);
  }

  await AppDataSource.destroy();
}

verify();
