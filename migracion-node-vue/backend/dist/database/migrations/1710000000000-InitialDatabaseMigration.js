"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.InitialDatabaseMigration1710000000000 = void 0;
class InitialDatabaseMigration1710000000000 {
    name = 'InitialDatabaseMigration1710000000000';
    async up(queryRunner) {
        const isMysql = queryRunner.connection.driver.options.type === 'mysql' || queryRunner.connection.driver.options.type === 'mariadb';
        const origQuery = queryRunner.query.bind(queryRunner);
        if (isMysql) {
            queryRunner.query = async (queryString, parameters) => {
                let adapted = queryString
                    .replace(/BIGSERIAL PRIMARY KEY/gi, 'BIGINT AUTO_INCREMENT PRIMARY KEY')
                    .replace(/SERIAL PRIMARY KEY/gi, 'INT AUTO_INCREMENT PRIMARY KEY')
                    .replace(/DEFAULT NOW\(\)/gi, 'DEFAULT CURRENT_TIMESTAMP')
                    .replace(/CREATE INDEX IF NOT EXISTS/gi, 'CREATE INDEX')
                    .replace(/"/g, '`')
                    .replace(/CASCADE;/gi, ';');
                const stmts = adapted
                    .split(';')
                    .map((s) => s.trim())
                    .filter((s) => s.length > 0);
                let lastRes = [];
                for (const st of stmts) {
                    try {
                        lastRes = await origQuery(st, parameters);
                    }
                    catch (e) {
                        if (!e.message?.includes('already exists') && !e.message?.includes('Duplicate')) {
                            throw e;
                        }
                    }
                }
                return lastRes;
            };
        }
        try {
            // 1. users
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "users" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "email" VARCHAR(255) NOT NULL UNIQUE,
        "email_verified_at" TIMESTAMP NULL,
        "password" VARCHAR(255) NOT NULL,
        "two_factor_secret" TEXT NULL,
        "two_factor_recovery_codes" TEXT NULL,
        "two_factor_confirmed_at" TIMESTAMP NULL,
        "remember_token" VARCHAR(100) NULL,
        "current_team_id" BIGINT NULL,
        "profile_photo_path" VARCHAR(2048) NULL,
        "created_at" TIMESTAMP NULL DEFAULT NOW(),
        "updated_at" TIMESTAMP NULL DEFAULT NOW()
      );
    `);
            // 2. roles
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "roles" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "guard_name" VARCHAR(255) NOT NULL DEFAULT 'web',
        "created_at" TIMESTAMP NULL DEFAULT NOW(),
        "updated_at" TIMESTAMP NULL DEFAULT NOW(),
        CONSTRAINT "roles_name_guard_name_unique" UNIQUE ("name", "guard_name")
      );
    `);
            // 3. permissions
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "permissions" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "guard_name" VARCHAR(255) NOT NULL DEFAULT 'web',
        "table_name" VARCHAR(255) NULL,
        "description" VARCHAR(255) NULL,
        "created_at" TIMESTAMP NULL DEFAULT NOW(),
        "updated_at" TIMESTAMP NULL DEFAULT NOW(),
        CONSTRAINT "permissions_name_guard_name_unique" UNIQUE ("name", "guard_name")
      );
      CREATE INDEX IF NOT EXISTS "permissions_table_name_index" ON "permissions" ("table_name");
    `);
            // 4. model_has_roles
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "model_has_roles" (
        "role_id" BIGINT NOT NULL,
        "model_type" VARCHAR(255) NOT NULL DEFAULT 'App\\\\Models\\\\User',
        "model_id" BIGINT NOT NULL,
        PRIMARY KEY ("role_id", "model_id", "model_type"),
        CONSTRAINT "model_has_roles_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "roles" ("id") ON DELETE CASCADE
      );
      CREATE INDEX IF NOT EXISTS "model_has_roles_model_id_model_type_index" ON "model_has_roles" ("model_id", "model_type");
    `);
            // 5. model_has_permissions
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "model_has_permissions" (
        "permission_id" BIGINT NOT NULL,
        "model_type" VARCHAR(255) NOT NULL DEFAULT 'App\\\\Models\\\\User',
        "model_id" BIGINT NOT NULL,
        PRIMARY KEY ("permission_id", "model_id", "model_type"),
        CONSTRAINT "model_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "permissions" ("id") ON DELETE CASCADE
      );
      CREATE INDEX IF NOT EXISTS "model_has_permissions_model_id_model_type_index" ON "model_has_permissions" ("model_id", "model_type");
    `);
            // 6. role_has_permissions
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "role_has_permissions" (
        "permission_id" BIGINT NOT NULL,
        "role_id" BIGINT NOT NULL,
        PRIMARY KEY ("permission_id", "role_id"),
        CONSTRAINT "role_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "permissions" ("id") ON DELETE CASCADE,
        CONSTRAINT "role_has_permissions_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "roles" ("id") ON DELETE CASCADE
      );
    `);
            // 7. olts
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "olts" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "code" CHAR(4) NULL UNIQUE,
        "outs" INTEGER NOT NULL
      );
    `);
            // 8. formapays
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "formapays" (
        "id" SMALLSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "type" CHAR(1) NOT NULL DEFAULT '0',
        "deleted_at" TIMESTAMP NULL
      );
    `);
            // 9. ubigeos
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "ubigeos" (
        "id" BIGSERIAL PRIMARY KEY,
        "ubigeo_reniec" VARCHAR(6) NOT NULL,
        "ubigeo_inei" VARCHAR(6) NOT NULL,
        "departamento_inei" VARCHAR(100) NOT NULL,
        "departamento" VARCHAR(100) NOT NULL,
        "provincia_inei" VARCHAR(4) NOT NULL,
        "provincia" VARCHAR(100) NOT NULL,
        "distrito" VARCHAR(100) NOT NULL,
        "region" VARCHAR(100) NOT NULL,
        "superficie" VARCHAR(255) NULL,
        "altitud" VARCHAR(12) NULL,
        "latitud" VARCHAR(255) NULL,
        "longitud" VARCHAR(255) NULL
      );
    `);
            // 10. seriepagos
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "seriepagos" (
        "id" SMALLSERIAL PRIMARY KEY,
        "descripcion" VARCHAR(255) NOT NULL,
        "serie" CHAR(4) NOT NULL UNIQUE,
        "contador" INTEGER NOT NULL DEFAULT 0
      );
    `);
            // 11. antenas
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "antenas" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "direccion" TEXT NULL
      );
    `);
            // 12. spliters
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "spliters" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "code" VARCHAR(4) NOT NULL,
        "outs" INTEGER NOT NULL,
        "direccion" TEXT NULL,
        "olt_id" BIGINT NOT NULL,
        CONSTRAINT "spliters_olt_id_foreign" FOREIGN KEY ("olt_id") REFERENCES "olts" ("id") ON DELETE CASCADE
      );
    `);
            // 13. clients
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "clients" (
        "id" BIGSERIAL PRIMARY KEY,
        "document" CHAR(11) NOT NULL,
        "name" VARCHAR(255) NOT NULL,
        "direccion" TEXT NULL,
        "ubigeo_id" BIGINT NULL,
        "deleted_at" TIMESTAMP NULL,
        CONSTRAINT "clients_ubigeo_id_foreign" FOREIGN KEY ("ubigeo_id") REFERENCES "ubigeos" ("id") ON DELETE SET NULL
      );
      CREATE INDEX IF NOT EXISTS "clients_document_index" ON "clients" ("document");
      CREATE INDEX IF NOT EXISTS "clients_name_index" ON "clients" ("name");
    `);
            // 14. boxnavs
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "boxnavs" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL,
        "code" VARCHAR(12) NOT NULL,
        "outs" SMALLINT NOT NULL,
        "direccion" TEXT NULL,
        "status" CHAR(1) NOT NULL DEFAULT '0',
        "spliter_id" BIGINT NOT NULL,
        "splitter_port" INTEGER NULL,
        CONSTRAINT "boxnavs_spliter_id_foreign" FOREIGN KEY ("spliter_id") REFERENCES "spliters" ("id") ON DELETE CASCADE
      );
    `);
            // 15. portboxnavs
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "portboxnavs" (
        "id" BIGSERIAL PRIMARY KEY,
        "code" VARCHAR(12) NOT NULL,
        "status" CHAR(1) NOT NULL DEFAULT '0',
        "boxnav_id" BIGINT NOT NULL,
        "alias" VARCHAR(255) NULL,
        "direccion" TEXT NULL,
        CONSTRAINT "portboxnavs_boxnav_id_foreign" FOREIGN KEY ("boxnav_id") REFERENCES "boxnavs" ("id") ON DELETE CASCADE
      );
      CREATE INDEX IF NOT EXISTS "portboxnavs_alias_index" ON "portboxnavs" ("alias");
    `);
            // 16. networks
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "networks" (
        "id" BIGSERIAL PRIMARY KEY,
        "date" TIMESTAMP NOT NULL,
        "code" VARCHAR(12) NULL UNIQUE,
        "portnumber" VARCHAR(255) NULL,
        "descripcion" TEXT NULL,
        "type" VARCHAR(255) NOT NULL,
        "telefono" VARCHAR(15) NULL,
        "price" NUMERIC(12, 2) NOT NULL DEFAULT 0.00,
        "direccion" TEXT NOT NULL,
        "typelocal" VARCHAR(20) NOT NULL DEFAULT 'PROPIO',
        "status" CHAR(1) NOT NULL DEFAULT '0',
        "client_id" BIGINT NOT NULL,
        "user_id" BIGINT NULL,
        "ubigeo_id" BIGINT NULL,
        "networkable_id" BIGINT NULL,
        "networkable_type" VARCHAR(255) NULL,
        "latitude" NUMERIC(10, 7) NULL,
        "longitude" NUMERIC(10, 7) NULL,
        "zoom" SMALLINT NULL DEFAULT 16,
        "codigo_slp" VARCHAR(255) NULL,
        "location" VARCHAR(255) NULL,
        CONSTRAINT "networks_client_id_foreign" FOREIGN KEY ("client_id") REFERENCES "clients" ("id") ON DELETE CASCADE,
        CONSTRAINT "networks_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE SET NULL,
        CONSTRAINT "networks_ubigeo_id_foreign" FOREIGN KEY ("ubigeo_id") REFERENCES "ubigeos" ("id") ON DELETE SET NULL
      );
      CREATE INDEX IF NOT EXISTS "networks_date_index" ON "networks" ("date");
      CREATE INDEX IF NOT EXISTS "networks_type_index" ON "networks" ("type");
      CREATE INDEX IF NOT EXISTS "networks_status_index" ON "networks" ("status");
      CREATE INDEX IF NOT EXISTS "networks_client_id_index" ON "networks" ("client_id");
      CREATE INDEX IF NOT EXISTS "networks_ubigeo_id_index" ON "networks" ("ubigeo_id");
    `);
            // 17. recibos
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "recibos" (
        "id" BIGSERIAL PRIMARY KEY,
        "date" TIMESTAMP NOT NULL,
        "vencimiento" DATE NOT NULL,
        "seriecompleta" VARCHAR(13) NOT NULL UNIQUE,
        "month" CHAR(7) NOT NULL,
        "amount" NUMERIC(12, 2) NOT NULL,
        "descuento" NUMERIC(12, 2) NOT NULL DEFAULT 0.00,
        "total" NUMERIC(12, 2) NOT NULL,
        "status" CHAR(1) NOT NULL DEFAULT '0',
        "seriepago_id" SMALLINT NOT NULL,
        "client_id" BIGINT NOT NULL,
        "network_id" BIGINT NULL,
        CONSTRAINT "recibos_seriepago_id_foreign" FOREIGN KEY ("seriepago_id") REFERENCES "seriepagos" ("id"),
        CONSTRAINT "recibos_client_id_foreign" FOREIGN KEY ("client_id") REFERENCES "clients" ("id") ON DELETE CASCADE,
        CONSTRAINT "recibos_network_id_foreign" FOREIGN KEY ("network_id") REFERENCES "networks" ("id") ON UPDATE CASCADE ON DELETE SET NULL
      );
      CREATE INDEX IF NOT EXISTS "recibos_date_index" ON "recibos" ("date");
      CREATE INDEX IF NOT EXISTS "recibos_month_index" ON "recibos" ("month");
      CREATE INDEX IF NOT EXISTS "recibos_seriepago_id_index" ON "recibos" ("seriepago_id");
      CREATE INDEX IF NOT EXISTS "recibos_client_id_index" ON "recibos" ("client_id");
      CREATE INDEX IF NOT EXISTS "recibos_network_id_index" ON "recibos" ("network_id");
    `);
            // 18. payments
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "payments" (
        "id" BIGSERIAL PRIMARY KEY,
        "date" TIMESTAMP NOT NULL,
        "month" CHAR(7) NOT NULL,
        "amount" NUMERIC(12, 2) NOT NULL,
        "codetransferencia" VARCHAR(255) NULL,
        "detalle" TEXT NULL,
        "formapay_id" SMALLINT NOT NULL,
        "paymentable_id" BIGINT NOT NULL,
        "paymentable_type" VARCHAR(255) NOT NULL,
        CONSTRAINT "payments_formapay_id_foreign" FOREIGN KEY ("formapay_id") REFERENCES "formapays" ("id")
      );
      CREATE INDEX IF NOT EXISTS "payments_date_index" ON "payments" ("date");
      CREATE INDEX IF NOT EXISTS "payments_month_index" ON "payments" ("month");
      CREATE INDEX IF NOT EXISTS "payments_paymentable_type_paymentable_id_index" ON "payments" ("paymentable_type", "paymentable_id");
    `);
            // 19. equipos
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "equipos" (
        "id" BIGSERIAL PRIMARY KEY,
        "descripcion" TEXT NOT NULL,
        "price" NUMERIC(12, 2) NOT NULL DEFAULT 0.00,
        "type" VARCHAR(255) NOT NULL,
        "mac" VARCHAR(255) NULL,
        "network_id" BIGINT NOT NULL,
        CONSTRAINT "equipos_network_id_foreign" FOREIGN KEY ("network_id") REFERENCES "networks" ("id") ON DELETE CASCADE
      );
    `);
            // 20. marcas
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "marcas" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" VARCHAR(255) NOT NULL
      );
    `);
            // 21. products
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "products" (
        "id" BIGSERIAL PRIMARY KEY,
        "name" TEXT NOT NULL,
        "modelo" VARCHAR(255) NULL,
        "mac" VARCHAR(255) NULL,
        "ip" VARCHAR(255) NULL,
        "pricebuy" NUMERIC(18, 2) NULL,
        "pricesale" NUMERIC(18, 2) NULL,
        "unit" VARCHAR(5) NULL,
        "stock" NUMERIC(18, 2) NOT NULL DEFAULT 0.00,
        "image" VARCHAR(255) NULL,
        "marca_id" BIGINT NULL,
        CONSTRAINT "products_marca_id_foreign" FOREIGN KEY ("marca_id") REFERENCES "marcas" ("id") ON DELETE SET NULL
      );
    `);
            // 22. accesos
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "accesos" (
        "id" BIGSERIAL PRIMARY KEY,
        "date" TIMESTAMP NOT NULL,
        "status" SMALLINT NOT NULL,
        "description" TEXT NULL,
        "user_id" BIGINT NULL,
        CONSTRAINT "accesos_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE SET NULL
      );
    `);
            // 23. yape_notifications
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "yape_notifications" (
        "id" BIGSERIAL PRIMARY KEY,
        "title" VARCHAR(255) NULL,
        "content" TEXT NULL,
        "created_at" TIMESTAMP NULL DEFAULT NOW(),
        "updated_at" TIMESTAMP NULL DEFAULT NOW()
      );
    `);
            // 24. olt_ports
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "olt_ports" (
        "id" BIGSERIAL PRIMARY KEY,
        "olt_id" BIGINT NOT NULL,
        "port_number" INTEGER NOT NULL,
        "alias" VARCHAR(255) NULL,
        "direccion" TEXT NULL,
        CONSTRAINT "olt_ports_olt_id_port_number_unique" UNIQUE ("olt_id", "port_number"),
        CONSTRAINT "olt_ports_olt_id_foreign" FOREIGN KEY ("olt_id") REFERENCES "olts" ("id") ON DELETE CASCADE
      );
      CREATE INDEX IF NOT EXISTS "olt_ports_olt_id_index" ON "olt_ports" ("olt_id");
    `);
            // 25. spliter_ports
            await queryRunner.query(`
      CREATE TABLE IF NOT EXISTS "spliter_ports" (
        "id" BIGSERIAL PRIMARY KEY,
        "spliter_id" BIGINT NOT NULL,
        "port_number" INTEGER NOT NULL,
        "alias" VARCHAR(255) NULL,
        "direccion" TEXT NULL,
        CONSTRAINT "spliter_ports_spliter_id_port_number_unique" UNIQUE ("spliter_id", "port_number"),
        CONSTRAINT "spliter_ports_spliter_id_foreign" FOREIGN KEY ("spliter_id") REFERENCES "spliters" ("id") ON DELETE CASCADE
      );
      CREATE INDEX IF NOT EXISTS "spliter_ports_spliter_id_index" ON "spliter_ports" ("spliter_id");
    `);
        }
        finally {
            if (isMysql) {
                queryRunner.query = origQuery;
            }
        }
    }
    async down(queryRunner) {
        const isMysql = queryRunner.connection.driver.options.type === 'mysql' || queryRunner.connection.driver.options.type === 'mariadb';
        if (isMysql) {
            await queryRunner.query('SET FOREIGN_KEY_CHECKS = 0;');
        }
        const origQuery = queryRunner.query.bind(queryRunner);
        const dropTable = async (table) => {
            const q = isMysql ? '`' : '"';
            const cascade = isMysql ? '' : ' CASCADE';
            await origQuery(`DROP TABLE IF EXISTS ${q}${table}${q}${cascade};`);
        };
        await dropTable('spliter_ports');
        await dropTable('olt_ports');
        await dropTable('yape_notifications');
        await dropTable('accesos');
        await dropTable('products');
        await dropTable('marcas');
        await dropTable('equipos');
        await dropTable('payments');
        await dropTable('recibos');
        await dropTable('networks');
        await dropTable('portboxnavs');
        await dropTable('boxnavs');
        await dropTable('clients');
        await dropTable('spliters');
        await dropTable('antenas');
        await dropTable('seriepagos');
        await dropTable('ubigeos');
        await dropTable('formapays');
        await dropTable('olts');
        await dropTable('role_has_permissions');
        await dropTable('model_has_permissions');
        await dropTable('model_has_roles');
        await dropTable('permissions');
        await dropTable('roles');
        await dropTable('users');
        if (isMysql) {
            await queryRunner.query('SET FOREIGN_KEY_CHECKS = 1;');
        }
    }
}
exports.InitialDatabaseMigration1710000000000 = InitialDatabaseMigration1710000000000;
