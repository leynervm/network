"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const dataSource_js_1 = require("../config/dataSource.js");
const DatabaseSeeder_js_1 = require("./seeds/DatabaseSeeder.js");
async function main() {
    try {
        if (!dataSource_js_1.AppDataSource.isInitialized) {
            await dataSource_js_1.AppDataSource.initialize();
            console.log(`Conexión con ${dataSource_js_1.AppDataSource.options.type.toUpperCase()} establecida para seeding.`);
        }
        await DatabaseSeeder_js_1.DatabaseSeeder.run(dataSource_js_1.AppDataSource);
        await dataSource_js_1.AppDataSource.destroy();
        console.log('Conexión cerrada. Seeding finalizado con éxito.');
        process.exit(0);
    }
    catch (error) {
        console.error('❌ Error durante la ejecución del DatabaseSeeder:', error);
        if (dataSource_js_1.AppDataSource.isInitialized) {
            await dataSource_js_1.AppDataSource.destroy();
        }
        process.exit(1);
    }
}
main();
