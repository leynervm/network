"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.DatabaseSeeder = void 0;
const UserSeeder_js_1 = require("./UserSeeder.js");
const PermissionSeeder_js_1 = require("./PermissionSeeder.js");
const OltSeeder_js_1 = require("./OltSeeder.js");
const SeriepagoSeeder_js_1 = require("./SeriepagoSeeder.js");
const FormapaySeeder_js_1 = require("./FormapaySeeder.js");
const UbigeoSeeder_js_1 = require("./UbigeoSeeder.js");
class DatabaseSeeder {
    static async run(dataSource) {
        console.log('========================================================');
        console.log('🚀 INICIANDO EJECUCIÓN ORQUESTADA DE SEEDERS TYPEORM');
        console.log('========================================================');
        console.log('\n[1/6] Ejecutando UserSeeder...');
        await UserSeeder_js_1.UserSeeder.run(dataSource);
        console.log('\n[2/6] Ejecutando PermissionSeeder...');
        await PermissionSeeder_js_1.PermissionSeeder.run(dataSource);
        console.log('\n[3/6] Ejecutando OltSeeder (Topología OLT/Splitter/NAP/Puertos)...');
        await OltSeeder_js_1.OltSeeder.run(dataSource);
        console.log('\n[4/6] Ejecutando SeriepagoSeeder...');
        await SeriepagoSeeder_js_1.SeriepagoSeeder.run(dataSource);
        console.log('\n[5/6] Ejecutando FormapaySeeder...');
        await FormapaySeeder_js_1.FormapaySeeder.run(dataSource);
        console.log('\n[6/6] Ejecutando UbigeoSeeder...');
        await UbigeoSeeder_js_1.UbigeoSeeder.run(dataSource);
        console.log('\n========================================================');
        console.log('✅ TODOS LOS SEEDERS FUERON COMPLETADOS CON ÉXITO');
        console.log('========================================================');
    }
}
exports.DatabaseSeeder = DatabaseSeeder;
