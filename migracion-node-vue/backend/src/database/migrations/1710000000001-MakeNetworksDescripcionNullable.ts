import { MigrationInterface, QueryRunner, TableColumn } from 'typeorm';

export class MakeNetworksDescripcionNullable1710000000001 implements MigrationInterface {
  name = 'MakeNetworksDescripcionNullable1710000000001';

  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.changeColumn(
      'networks',
      'descripcion',
      new TableColumn({
        name: 'descripcion',
        type: 'text',
        isNullable: true,
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    const isMysql = queryRunner.connection.driver.options.type === 'mysql' || queryRunner.connection.driver.options.type === 'mariadb';
    const q = isMysql ? '`' : '"';
    await queryRunner.query(`UPDATE ${q}networks${q} SET ${q}descripcion${q} = '' WHERE ${q}descripcion${q} IS NULL;`);
    await queryRunner.changeColumn(
      'networks',
      'descripcion',
      new TableColumn({
        name: 'descripcion',
        type: 'text',
        isNullable: false,
        default: "''",
      })
    );
  }
}
