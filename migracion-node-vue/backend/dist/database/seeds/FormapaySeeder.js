"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.FormapaySeeder = void 0;
const Formapay_js_1 = require("../../entities/Formapay.js");
class FormapaySeeder {
    static async run(dataSource) {
        const repo = dataSource.getRepository(Formapay_js_1.Formapay);
        const formsData = [
            { name: 'EFECTIVO', type: Formapay_js_1.Formapay.EFECTIVO },
            { name: 'TRANSFERENCIA', type: Formapay_js_1.Formapay.TRANSFERENCIA },
            { name: 'YAPE', type: Formapay_js_1.Formapay.TRANSFERENCIA },
            { name: 'PLIN', type: Formapay_js_1.Formapay.TRANSFERENCIA },
            { name: 'DEPOSITO', type: Formapay_js_1.Formapay.TRANSFERENCIA },
        ];
        for (const data of formsData) {
            let item = await repo.findOne({ where: { name: data.name } });
            if (!item) {
                item = repo.create(data);
                await repo.save(item);
                console.log(`  [FormapaySeeder] Forma de pago creada: ${data.name}`);
            }
            else {
                item.type = data.type;
                await repo.save(item);
                console.log(`  [FormapaySeeder] Forma de pago actualizada: ${data.name}`);
            }
        }
    }
}
exports.FormapaySeeder = FormapaySeeder;
