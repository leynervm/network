import { DataSource } from 'typeorm';
import { Seriepago } from '../../entities/Seriepago.js';

export class SeriepagoSeeder {
  static async run(dataSource: DataSource): Promise<void> {
    const repo = dataSource.getRepository(Seriepago);

    const seriesData = [
      {
        descripcion: 'BOLETA DE VENTA',
        serie: 'B001',
        contador: 0,
      },
      {
        descripcion: 'FACTURA DE VENTA',
        serie: 'F001',
        contador: 0,
      },
    ];

    for (const data of seriesData) {
      let item = await repo.findOne({ where: { serie: data.serie } });
      if (!item) {
        item = repo.create(data);
        await repo.save(item);
        console.log(`  [SeriepagoSeeder] Serie creada: ${data.serie} - ${data.descripcion}`);
      } else {
        item.descripcion = data.descripcion;
        await repo.save(item);
        console.log(`  [SeriepagoSeeder] Serie actualizada: ${data.serie}`);
      }
    }
  }
}
