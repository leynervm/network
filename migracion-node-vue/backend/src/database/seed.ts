import { AppDataSource } from '../config/dataSource.js';
import { DatabaseSeeder } from './seeds/DatabaseSeeder.js';

async function main() {
  try {
    if (!AppDataSource.isInitialized) {
      await AppDataSource.initialize();
      console.log(`Conexión con ${AppDataSource.options.type.toUpperCase()} establecida para seeding.`);
    }

    await DatabaseSeeder.run(AppDataSource);

    await AppDataSource.destroy();
    console.log('Conexión cerrada. Seeding finalizado con éxito.');
    process.exit(0);
  } catch (error) {
    console.error('❌ Error durante la ejecución del DatabaseSeeder:', error);
    if (AppDataSource.isInitialized) {
      await AppDataSource.destroy();
    }
    process.exit(1);
  }
}

main();
