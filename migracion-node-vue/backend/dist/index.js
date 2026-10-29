"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const cors_1 = __importDefault(require("cors"));
const cookie_parser_1 = __importDefault(require("cookie-parser"));
const dotenv_1 = __importDefault(require("dotenv"));
const dataSource_js_1 = require("./config/dataSource.js");
const api_js_1 = __importDefault(require("./routes/api.js"));
dotenv_1.default.config();
const app = (0, express_1.default)();
const PORT = process.env.PORT || 4000;
const FRONTEND_URL = process.env.FRONTEND_URL || 'http://localhost:5173';
app.use((0, cors_1.default)({
    origin: FRONTEND_URL,
    credentials: true,
}));
app.use((0, cookie_parser_1.default)());
app.use(express_1.default.json());
app.use(express_1.default.urlencoded({ extended: true }));
// Rutas de API
app.use('/api', api_js_1.default);
// Endpoint de verificación de salud
app.get('/health', (req, res) => {
    res.json({
        status: 'ok',
        timestamp: new Date().toISOString(),
        database: dataSource_js_1.AppDataSource.isInitialized ? 'connected' : 'disconnected',
    });
});
// Manejo global de errores
app.use((err, req, res, next) => {
    console.error('[Error Global]:', err);
    res.status(err.status || 500).json({
        message: err.message || 'Error interno del servidor.',
    });
});
async function startServer() {
    const driverName = (dataSource_js_1.AppDataSource.options.type || 'database').toUpperCase();
    try {
        await dataSource_js_1.AppDataSource.initialize();
        console.log(`✅ [TypeORM]: Conexión exitosa a la base de datos ${driverName} (${dataSource_js_1.AppDataSource.options.database}).`);
        // Asegurar compatibilidad de columnas en bases de datos existentes de Laravel/MySQL
        try {
            const queryRunner = dataSource_js_1.AppDataSource.createQueryRunner();
            const hasNetworksTable = await queryRunner.hasTable('networks');
            if (hasNetworksTable) {
                const hasTypelocal = await queryRunner.hasColumn('networks', 'typelocal');
                if (!hasTypelocal) {
                    console.log('🔄 [Compatibility]: Agregando columna "typelocal" faltante en tabla "networks"...');
                    const isMysql = dataSource_js_1.AppDataSource.options.type === 'mysql' || dataSource_js_1.AppDataSource.options.type === 'mariadb';
                    if (isMysql) {
                        await queryRunner.query("ALTER TABLE `networks` ADD COLUMN `typelocal` VARCHAR(20) NOT NULL DEFAULT 'PROPIO';");
                    }
                    else {
                        await queryRunner.query('ALTER TABLE "networks" ADD COLUMN IF NOT EXISTS "typelocal" VARCHAR(20) NOT NULL DEFAULT \'PROPIO\';');
                    }
                    console.log('✅ [Compatibility]: Columna "typelocal" creada con éxito.');
                }
            }
            await queryRunner.release();
        }
        catch (compatErr) {
            console.warn('⚠️ [Compatibility Warning]: No se pudo verificar la columna "typelocal":', compatErr.message);
        }
        app.listen(PORT, () => {
            console.log(`🚀 [Backend]: Servidor Node.js/TypeScript corriendo en http://localhost:${PORT}`);
        });
    }
    catch (error) {
        console.error(`❌ [Error al iniciar TypeORM con ${driverName}]:`, error);
        // Iniciar el servidor Express aun si la BD está en espera de arranque
        app.listen(PORT, () => {
            console.log(`⚠️ [Backend]: Servidor corriendo en http://localhost:${PORT} (${driverName} pendiente de conexión)`);
        });
    }
}
startServer();
