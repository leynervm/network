"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.UbigeoSeeder = void 0;
const Ubigeo_js_1 = require("../../entities/Ubigeo.js");
class UbigeoSeeder {
    static async run(dataSource) {
        const repo = dataSource.getRepository(Ubigeo_js_1.Ubigeo);
        const count = await repo.count();
        if (count > 0) {
            console.log(`  [UbigeoSeeder] Ya existen ${count} ubigeos registrados. Omitiendo.`);
            return;
        }
        const ubigeosData = [
            {
                id: 1,
                ubigeo_reniec: '010101',
                ubigeo_inei: '010101',
                departamento_inei: '01',
                departamento: 'AMAZONAS',
                provincia_inei: '0101',
                provincia: 'CHACHAPOYAS',
                distrito: 'CHACHAPOYAS',
                region: 'AMAZONAS',
                superficie: '154',
                altitud: '2338',
                latitud: '-6.2294',
                longitud: '-77.8728',
            },
            {
                id: 2,
                ubigeo_reniec: '010102',
                ubigeo_inei: '010102',
                departamento_inei: '01',
                departamento: 'AMAZONAS',
                provincia_inei: '0101',
                provincia: 'CHACHAPOYAS',
                distrito: 'ASUNCION',
                region: 'AMAZONAS',
                superficie: '26',
                altitud: '2823',
                latitud: '-6.0325',
                longitud: '-77.7108',
            },
            {
                id: 3,
                ubigeo_reniec: '010103',
                ubigeo_inei: '010103',
                departamento_inei: '01',
                departamento: 'AMAZONAS',
                provincia_inei: '0101',
                provincia: 'CHACHAPOYAS',
                distrito: 'BALSAS',
                region: 'AMAZONAS',
                superficie: '357',
                altitud: '854',
                latitud: '-6.8358',
                longitud: '-78.0214',
            },
            {
                id: 150101,
                ubigeo_reniec: '150101',
                ubigeo_inei: '150101',
                departamento_inei: '15',
                departamento: 'LIMA',
                provincia_inei: '1501',
                provincia: 'LIMA',
                distrito: 'LIMA',
                region: 'COSTA',
                superficie: '21.88',
                altitud: '161',
                latitud: '-12.0463',
                longitud: '-77.0427',
            },
            {
                id: 150118,
                ubigeo_reniec: '150118',
                ubigeo_inei: '150118',
                departamento_inei: '15',
                departamento: 'LIMA',
                provincia_inei: '1501',
                provincia: 'LIMA',
                distrito: 'MIRAFLORES',
                region: 'COSTA',
                superficie: '9.62',
                altitud: '79',
                latitud: '-12.1211',
                longitud: '-77.0297',
            },
            {
                id: 150132,
                ubigeo_reniec: '150132',
                ubigeo_inei: '150132',
                departamento_inei: '15',
                departamento: 'LIMA',
                provincia_inei: '1501',
                provincia: 'LIMA',
                distrito: 'SAN ISIDRO',
                region: 'COSTA',
                superficie: '11.1',
                altitud: '109',
                latitud: '-12.0987',
                longitud: '-77.0353',
            },
        ];
        for (const u of ubigeosData) {
            const item = repo.create(u);
            await repo.save(item);
        }
        console.log(`  [UbigeoSeeder] Catálogo de ubigeos inicial insertado (${ubigeosData.length} registros).`);
    }
}
exports.UbigeoSeeder = UbigeoSeeder;
