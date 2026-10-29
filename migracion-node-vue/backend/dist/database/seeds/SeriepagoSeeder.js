"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.SeriepagoSeeder = void 0;
const Seriepago_js_1 = require("../../entities/Seriepago.js");
class SeriepagoSeeder {
    static async run(dataSource) {
        const repo = dataSource.getRepository(Seriepago_js_1.Seriepago);
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
            }
            else {
                item.descripcion = data.descripcion;
                await repo.save(item);
                console.log(`  [SeriepagoSeeder] Serie actualizada: ${data.serie}`);
            }
        }
    }
}
exports.SeriepagoSeeder = SeriepagoSeeder;
