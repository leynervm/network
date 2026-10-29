import { DataSource } from 'typeorm';
import { Formapay } from '../../entities/Formapay.js';

export class FormapaySeeder {
  static async run(dataSource: DataSource): Promise<void> {
    const repo = dataSource.getRepository(Formapay);

    const formsData = [
      { name: 'EFECTIVO', type: Formapay.EFECTIVO },
      { name: 'TRANSFERENCIA', type: Formapay.TRANSFERENCIA },
      { name: 'YAPE', type: Formapay.TRANSFERENCIA },
      { name: 'PLIN', type: Formapay.TRANSFERENCIA },
      { name: 'DEPOSITO', type: Formapay.TRANSFERENCIA },
    ];

    for (const data of formsData) {
      let item = await repo.findOne({ where: { name: data.name } });
      if (!item) {
        item = repo.create(data);
        await repo.save(item);
        console.log(`  [FormapaySeeder] Forma de pago creada: ${data.name}`);
      } else {
        item.type = data.type;
        await repo.save(item);
        console.log(`  [FormapaySeeder] Forma de pago actualizada: ${data.name}`);
      }
    }
  }
}
