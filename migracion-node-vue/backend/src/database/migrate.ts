import { AppDataSource } from '../config/dataSource.js';

async function migrate() {
  const action = process.argv[2] || 'run';

  try {
    if (!AppDataSource.isInitialized) {
      await AppDataSource.initialize();
      console.log(`Conexión con ${AppDataSource.options.type.toUpperCase()} establecida.`);
    }

    if (action === 'revert' || action === 'rollback') {
      console.log('Revirtiendo la última migración...');
      await AppDataSource.undoLastMigration();
      console.log('✅ Migración revertida exitosamente.');
    } else if (action === 'show' || action === 'status') {
      console.log('Consultando estado de migraciones...');
      const hasPending = await AppDataSource.showMigrations();
      console.log(`Estado: ${hasPending ? '⚠️ Hay migraciones pendientes por aplicar' : '✅ Todas las migraciones están al día'}.`);
    } else {
      console.log('Ejecutando migraciones pendientes...');
      const migrations = await AppDataSource.runMigrations();
      if (migrations.length === 0) {
        console.log('ℹ️ No hay migraciones pendientes para ejecutar.');
      } else {
        console.log(`✅ Se ejecutaron exitosamente ${migrations.length} migraciones:`);
        migrations.forEach((m) => console.log(`   - ${m.name}`));
      }
    }

    await AppDataSource.destroy();
    process.exit(0);
  } catch (error) {
    console.error('❌ Error ejecutando migraciones:', error);
    if (AppDataSource.isInitialized) {
      await AppDataSource.destroy();
    }
    process.exit(1);
  }
}

migrate();
