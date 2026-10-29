"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.MakeNetworksDescripcionNullable1710000000001 = void 0;
const typeorm_1 = require("typeorm");
class MakeNetworksDescripcionNullable1710000000001 {
    name = 'MakeNetworksDescripcionNullable1710000000001';
    async up(queryRunner) {
        await queryRunner.changeColumn('networks', 'descripcion', new typeorm_1.TableColumn({
            name: 'descripcion',
            type: 'text',
            isNullable: true,
        }));
    }
    async down(queryRunner) {
        const isMysql = queryRunner.connection.driver.options.type === 'mysql' || queryRunner.connection.driver.options.type === 'mariadb';
        const q = isMysql ? '`' : '"';
        await queryRunner.query(`UPDATE ${q}networks${q} SET ${q}descripcion${q} = '' WHERE ${q}descripcion${q} IS NULL;`);
        await queryRunner.changeColumn('networks', 'descripcion', new typeorm_1.TableColumn({
            name: 'descripcion',
            type: 'text',
            isNullable: false,
            default: "''",
        }));
    }
}
exports.MakeNetworksDescripcionNullable1710000000001 = MakeNetworksDescripcionNullable1710000000001;
