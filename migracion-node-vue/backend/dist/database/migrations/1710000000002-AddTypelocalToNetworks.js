"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.AddTypelocalToNetworks1710000000002 = void 0;
const typeorm_1 = require("typeorm");
class AddTypelocalToNetworks1710000000002 {
    name = 'AddTypelocalToNetworks1710000000002';
    async up(queryRunner) {
        const hasTable = await queryRunner.hasTable('networks');
        if (!hasTable)
            return;
        const hasColumn = await queryRunner.hasColumn('networks', 'typelocal');
        if (!hasColumn) {
            await queryRunner.addColumn('networks', new typeorm_1.TableColumn({
                name: 'typelocal',
                type: 'varchar',
                length: '20',
                default: "'PROPIO'",
                isNullable: true,
            }));
        }
    }
    async down(queryRunner) {
        const hasTable = await queryRunner.hasTable('networks');
        if (!hasTable)
            return;
        const hasColumn = await queryRunner.hasColumn('networks', 'typelocal');
        if (hasColumn) {
            await queryRunner.dropColumn('networks', 'typelocal');
        }
    }
}
exports.AddTypelocalToNetworks1710000000002 = AddTypelocalToNetworks1710000000002;
