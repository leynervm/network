"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const dataSource_js_1 = require("../config/dataSource.js");
async function verify() {
    await dataSource_js_1.AppDataSource.initialize();
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
    const isMysql = dataSource_js_1.AppDataSource.options.type === 'mysql' || dataSource_js_1.AppDataSource.options.type === 'mariadb';
    const q = isMysql ? '`' : '"';
    for (const table of tables) {
        const res = await dataSource_js_1.AppDataSource.query(`SELECT COUNT(*) as count FROM ${q}${table}${q}`);
        console.log(`Tabla [${table}]: ${res[0].count} registros`);
    }
    await dataSource_js_1.AppDataSource.destroy();
}
verify();
