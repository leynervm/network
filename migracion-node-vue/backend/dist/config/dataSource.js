"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.AppDataSource = exports.isMysql = void 0;
require("reflect-metadata");
const typeorm_1 = require("typeorm");
const dotenv_1 = __importDefault(require("dotenv"));
const User_js_1 = require("../entities/User.js");
const Role_js_1 = require("../entities/Role.js");
const Permission_js_1 = require("../entities/Permission.js");
const Olt_js_1 = require("../entities/Olt.js");
const OltPort_js_1 = require("../entities/OltPort.js");
const Spliter_js_1 = require("../entities/Spliter.js");
const SpliterPort_js_1 = require("../entities/SpliterPort.js");
const Boxnav_js_1 = require("../entities/Boxnav.js");
const Portboxnav_js_1 = require("../entities/Portboxnav.js");
const Antena_js_1 = require("../entities/Antena.js");
const Ubigeo_js_1 = require("../entities/Ubigeo.js");
const Client_js_1 = require("../entities/Client.js");
const Network_js_1 = require("../entities/Network.js");
const Seriepago_js_1 = require("../entities/Seriepago.js");
const Formapay_js_1 = require("../entities/Formapay.js");
const Recibo_js_1 = require("../entities/Recibo.js");
const Payment_js_1 = require("../entities/Payment.js");
const Marca_js_1 = require("../entities/Marca.js");
const Product_js_1 = require("../entities/Product.js");
const Equipo_js_1 = require("../entities/Equipo.js");
const Acceso_js_1 = require("../entities/Acceso.js");
const YapeNotification_js_1 = require("../entities/YapeNotification.js");
const index_js_1 = require("../database/migrations/index.js");
dotenv_1.default.config();
// Detectar el driver de base de datos (DB_CONNECTION de Laravel o DB_TYPE)
const rawDriver = (process.env.DB_CONNECTION ||
    process.env.DB_TYPE ||
    process.env.DB_DRIVER ||
    'postgres')
    .trim()
    .toLowerCase();
exports.isMysql = rawDriver === 'mysql' || rawDriver === 'mariadb';
const defaultPort = exports.isMysql ? 3306 : 5432;
const defaultUser = exports.isMysql ? 'root' : 'postgres';
const defaultPass = exports.isMysql ? '' : 'postgres';
const entities = [
    User_js_1.User,
    Role_js_1.Role,
    Permission_js_1.Permission,
    Olt_js_1.Olt,
    OltPort_js_1.OltPort,
    Spliter_js_1.Spliter,
    SpliterPort_js_1.SpliterPort,
    Boxnav_js_1.Boxnav,
    Portboxnav_js_1.Portboxnav,
    Antena_js_1.Antena,
    Ubigeo_js_1.Ubigeo,
    Client_js_1.Client,
    Network_js_1.Network,
    Seriepago_js_1.Seriepago,
    Formapay_js_1.Formapay,
    Recibo_js_1.Recibo,
    Payment_js_1.Payment,
    Marca_js_1.Marca,
    Product_js_1.Product,
    Equipo_js_1.Equipo,
    Acceso_js_1.Acceso,
    YapeNotification_js_1.YapeNotification,
];
let dataSourceOptions;
if (exports.isMysql) {
    dataSourceOptions = {
        type: 'mysql',
        host: process.env.DB_HOST || '127.0.0.1',
        port: parseInt(process.env.DB_PORT || String(defaultPort), 10),
        username: process.env.DB_USERNAME ?? defaultUser,
        password: process.env.DB_PASSWORD ?? defaultPass,
        database: process.env.DB_DATABASE || 'network',
        charset: 'utf8mb4',
        timezone: 'Z',
        synchronize: process.env.DB_SYNCHRONIZE === 'true',
        logging: process.env.NODE_ENV === 'development' ? ['error', 'warn'] : false,
        entities,
        migrations: index_js_1.AllMigrations,
        subscribers: [],
        extra: {
            decimalNumbers: true,
        },
    };
}
else {
    dataSourceOptions = {
        type: 'postgres',
        host: process.env.DB_HOST || '127.0.0.1',
        port: parseInt(process.env.DB_PORT || String(defaultPort), 10),
        username: process.env.DB_USERNAME ?? defaultUser,
        password: process.env.DB_PASSWORD ?? defaultPass,
        database: process.env.DB_DATABASE || 'network',
        synchronize: process.env.DB_SYNCHRONIZE === 'true',
        logging: process.env.NODE_ENV === 'development' ? ['error', 'warn'] : false,
        entities,
        migrations: index_js_1.AllMigrations,
        subscribers: [],
    };
}
exports.AppDataSource = new typeorm_1.DataSource(dataSourceOptions);
