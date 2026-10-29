import { DataSource } from 'typeorm';
import { UserSeeder } from './UserSeeder.js';
import { PermissionSeeder } from './PermissionSeeder.js';
import { OltSeeder } from './OltSeeder.js';
import { SeriepagoSeeder } from './SeriepagoSeeder.js';
import { FormapaySeeder } from './FormapaySeeder.js';
import { UbigeoSeeder } from './UbigeoSeeder.js';

export class DatabaseSeeder {
  static async run(dataSource: DataSource): Promise<void> {
    console.log('========================================================');
    console.log('🚀 INICIANDO EJECUCIÓN ORQUESTADA DE SEEDERS TYPEORM');
    console.log('========================================================');

    console.log('\n[1/6] Ejecutando UserSeeder...');
    await UserSeeder.run(dataSource);

    console.log('\n[2/6] Ejecutando PermissionSeeder...');
    await PermissionSeeder.run(dataSource);

    console.log('\n[3/6] Ejecutando OltSeeder (Topología OLT/Splitter/NAP/Puertos)...');
    await OltSeeder.run(dataSource);

    console.log('\n[4/6] Ejecutando SeriepagoSeeder...');
    await SeriepagoSeeder.run(dataSource);

    console.log('\n[5/6] Ejecutando FormapaySeeder...');
    await FormapaySeeder.run(dataSource);

    console.log('\n[6/6] Ejecutando UbigeoSeeder...');
    await UbigeoSeeder.run(dataSource);

    console.log('\n========================================================');
    console.log('✅ TODOS LOS SEEDERS FUERON COMPLETADOS CON ÉXITO');
    console.log('========================================================');
  }
}
