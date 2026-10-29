import { MigrationInterface, QueryRunner, TableColumn } from 'typeorm';

export class AddTypelocalToNetworks1710000000002 implements MigrationInterface {
  name = 'AddTypelocalToNetworks1710000000002';

  public async up(queryRunner: QueryRunner): Promise<void> {
    const hasTable = await queryRunner.hasTable('networks');
    if (!hasTable) return;

    const hasColumn = await queryRunner.hasColumn('networks', 'typelocal');
    if (!hasColumn) {
      await queryRunner.addColumn(
        'networks',
        new TableColumn({
          name: 'typelocal',
          type: 'varchar',
          length: '20',
          default: "'PROPIO'",
          isNullable: true,
        })
      );
    }
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    const hasTable = await queryRunner.hasTable('networks');
    if (!hasTable) return;

    const hasColumn = await queryRunner.hasColumn('networks', 'typelocal');
    if (hasColumn) {
      await queryRunner.dropColumn('networks', 'typelocal');
    }
  }
}
