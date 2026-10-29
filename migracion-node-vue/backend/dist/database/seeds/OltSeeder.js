"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.OltSeeder = void 0;
const Olt_js_1 = require("../../entities/Olt.js");
const Spliter_js_1 = require("../../entities/Spliter.js");
const Boxnav_js_1 = require("../../entities/Boxnav.js");
const Portboxnav_js_1 = require("../../entities/Portboxnav.js");
class OltSeeder {
    static async run(dataSource) {
        const oltRepo = dataSource.getRepository(Olt_js_1.Olt);
        const spliterRepo = dataSource.getRepository(Spliter_js_1.Spliter);
        const boxnavRepo = dataSource.getRepository(Boxnav_js_1.Boxnav);
        const portboxnavRepo = dataSource.getRepository(Portboxnav_js_1.Portboxnav);
        let olt = await oltRepo.findOne({ where: { name: 'OLT PRINCIPAL' } });
        if (olt) {
            console.log('  [OltSeeder] OLT PRINCIPAL ya existe. Omitiendo generación masiva.');
            return;
        }
        const outsOLT = 16;
        olt = oltRepo.create({
            name: 'OLT PRINCIPAL',
            code: 'OL01',
            outs: outsOLT,
        });
        await oltRepo.save(olt);
        console.log(`  [OltSeeder] OLT PRINCIPAL creada con ${outsOLT} puertos.`);
        for (let i = 0; i < outsOLT; i++) {
            const spliterNum = i + 1;
            const spliter = spliterRepo.create({
                name: `SPLITER ${spliterNum}`,
                code: `${spliterNum}`,
                outs: 16,
                direccion: '',
                olt_id: olt.id,
            });
            await spliterRepo.save(spliter);
            // Cada splitter tiene 8 o 16 cajas NAP según OltSeeder.php
            const boxnavs = [];
            for (let j = 0; j < spliter.outs; j++) {
                const portIndex = j + 1;
                const codeBoxnav = `${spliter.code.trim()}-${portIndex}`;
                const boxnav = boxnavRepo.create({
                    name: `CAJA NAP ${codeBoxnav}`,
                    code: codeBoxnav,
                    outs: 8,
                    direccion: '',
                    status: '0',
                    splitter_port: portIndex,
                    spliter_id: spliter.id,
                });
                boxnavs.push(boxnav);
            }
            await boxnavRepo.save(boxnavs);
            // Para cada caja NAP, generar sus 8 puertos
            for (const boxnav of boxnavs) {
                const ports = [];
                for (let k = 0; k < boxnav.outs; k++) {
                    const portNum = k + 1;
                    ports.push(portboxnavRepo.create({
                        code: `PORT-${portNum}`,
                        status: '0',
                        boxnav_id: boxnav.id,
                    }));
                }
                await portboxnavRepo.save(ports);
            }
            console.log(`  [OltSeeder] SPLITER ${spliterNum} configurado con sus Cajas NAP y Puertos.`);
        }
        console.log('  [OltSeeder] Topología OLT / Splitters / Cajas NAP / Puertos generada exitosamente.');
    }
}
exports.OltSeeder = OltSeeder;
