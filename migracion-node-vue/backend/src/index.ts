import express from 'express';
import cors from 'cors';
import cookieParser from 'cookie-parser';
import dotenv from 'dotenv';
import { AppDataSource } from './config/dataSource.js';
import apiRouter from './routes/api.js';

dotenv.config();

const app = express();
const PORT = process.env.PORT || 4000;
const FRONTEND_URL = process.env.FRONTEND_URL || 'http://localhost:5173';

app.use(
  cors({
    origin: FRONTEND_URL,
    credentials: true,
  })
);
app.use(cookieParser());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Rutas de API
app.use('/api', apiRouter);

// Endpoint de verificación de salud
app.get('/health', (req, res) => {
  res.json({
    status: 'ok',
    timestamp: new Date().toISOString(),
    database: AppDataSource.isInitialized ? 'connected' : 'disconnected',
  });
});

// Manejo global de errores
app.use((err: any, req: express.Request, res: express.Response, next: express.NextFunction) => {
  console.error('[Error Global]:', err);
  res.status(err.status || 500).json({
    message: err.message || 'Error interno del servidor.',
  });
});

async function startServer() {
  const driverName = (AppDataSource.options.type || 'database').toUpperCase();
  try {
    await AppDataSource.initialize();
    console.log(`✅ [TypeORM]: Conexión exitosa a la base de datos ${driverName} (${AppDataSource.options.database}).`);

    // Asegurar compatibilidad de columnas en bases de datos existentes de Laravel/MySQL
    try {
      const queryRunner = AppDataSource.createQueryRunner();
      const hasNetworksTable = await queryRunner.hasTable('networks');
      if (hasNetworksTable) {
        const hasTypelocal = await queryRunner.hasColumn('networks', 'typelocal');
        if (!hasTypelocal) {
          console.log('🔄 [Compatibility]: Agregando columna "typelocal" faltante en tabla "networks"...');
          const isMysql = AppDataSource.options.type === 'mysql' || AppDataSource.options.type === 'mariadb';
          if (isMysql) {
            await queryRunner.query("ALTER TABLE `networks` ADD COLUMN `typelocal` VARCHAR(20) NOT NULL DEFAULT 'PROPIO';");
          } else {
            await queryRunner.query('ALTER TABLE "networks" ADD COLUMN IF NOT EXISTS "typelocal" VARCHAR(20) NOT NULL DEFAULT \'PROPIO\';');
          }
          console.log('✅ [Compatibility]: Columna "typelocal" creada con éxito.');
        }
      }
      await queryRunner.release();
    } catch (compatErr: any) {
      console.warn('⚠️ [Compatibility Warning]: No se pudo verificar la columna "typelocal":', compatErr.message);
    }

    app.listen(PORT, () => {
      console.log(`🚀 [Backend]: Servidor Node.js/TypeScript corriendo en http://localhost:${PORT}`);
    });
  } catch (error) {
    console.error(`❌ [Error al iniciar TypeORM con ${driverName}]:`, error);
    // Iniciar el servidor Express aun si la BD está en espera de arranque
    app.listen(PORT, () => {
      console.log(`⚠️ [Backend]: Servidor corriendo en http://localhost:${PORT} (${driverName} pendiente de conexión)`);
    });
  }
}

startServer();
