import 'reflect-metadata';
import { DataSource, DataSourceOptions } from 'typeorm';
import dotenv from 'dotenv';
import { User } from '../entities/User.js';
import { Role } from '../entities/Role.js';
import { Permission } from '../entities/Permission.js';
import { Olt } from '../entities/Olt.js';
import { OltPort } from '../entities/OltPort.js';
import { Spliter } from '../entities/Spliter.js';
import { SpliterPort } from '../entities/SpliterPort.js';
import { Boxnav } from '../entities/Boxnav.js';
import { Portboxnav } from '../entities/Portboxnav.js';
import { Antena } from '../entities/Antena.js';
import { Ubigeo } from '../entities/Ubigeo.js';
import { Client } from '../entities/Client.js';
import { Network } from '../entities/Network.js';
import { Seriepago } from '../entities/Seriepago.js';
import { Formapay } from '../entities/Formapay.js';
import { Recibo } from '../entities/Recibo.js';
import { Payment } from '../entities/Payment.js';
import { Marca } from '../entities/Marca.js';
import { Product } from '../entities/Product.js';
import { Equipo } from '../entities/Equipo.js';
import { Acceso } from '../entities/Acceso.js';
import { YapeNotification } from '../entities/YapeNotification.js';

import { AllMigrations } from '../database/migrations/index.js';

dotenv.config();

// Detectar el driver de base de datos (DB_CONNECTION de Laravel o DB_TYPE)
const rawDriver = (
  process.env.DB_CONNECTION ||
  process.env.DB_TYPE ||
  process.env.DB_DRIVER ||
  'postgres'
)
  .trim()
  .toLowerCase();

export const isMysql = rawDriver === 'mysql' || rawDriver === 'mariadb';

const defaultPort = isMysql ? 3306 : 5432;
const defaultUser = isMysql ? 'root' : 'postgres';
const defaultPass = isMysql ? '' : 'postgres';

const entities = [
  User,
  Role,
  Permission,
  Olt,
  OltPort,
  Spliter,
  SpliterPort,
  Boxnav,
  Portboxnav,
  Antena,
  Ubigeo,
  Client,
  Network,
  Seriepago,
  Formapay,
  Recibo,
  Payment,
  Marca,
  Product,
  Equipo,
  Acceso,
  YapeNotification,
];

let dataSourceOptions: DataSourceOptions;

if (isMysql) {
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
    migrations: AllMigrations,
    subscribers: [],
    extra: {
      decimalNumbers: true,
    },
  };
} else {
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
    migrations: AllMigrations,
    subscribers: [],
  };
}

export const AppDataSource = new DataSource(dataSourceOptions);
