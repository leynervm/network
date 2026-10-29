"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.Ubigeo = void 0;
const typeorm_1 = require("typeorm");
const Client_js_1 = require("./Client.js");
const Network_js_1 = require("./Network.js");
let Ubigeo = class Ubigeo {
    id;
    ubigeo_reniec;
    ubigeo_inei;
    departamento_inei;
    departamento;
    provincia_inei;
    provincia;
    distrito;
    region;
    superficie;
    altitud;
    latitud;
    longitud;
    clients;
    networks;
};
exports.Ubigeo = Ubigeo;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Ubigeo.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 6 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "ubigeo_reniec", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 6 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "ubigeo_inei", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "departamento_inei", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "departamento", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 4 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "provincia_inei", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "provincia", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "distrito", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100 }),
    __metadata("design:type", String)
], Ubigeo.prototype, "region", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Ubigeo.prototype, "superficie", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 12, nullable: true }),
    __metadata("design:type", String)
], Ubigeo.prototype, "altitud", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Ubigeo.prototype, "latitud", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Ubigeo.prototype, "longitud", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Client_js_1.Client, (client) => client.ubigeo),
    __metadata("design:type", Array)
], Ubigeo.prototype, "clients", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Network_js_1.Network, (network) => network.ubigeo),
    __metadata("design:type", Array)
], Ubigeo.prototype, "networks", void 0);
exports.Ubigeo = Ubigeo = __decorate([
    (0, typeorm_1.Entity)('ubigeos')
], Ubigeo);
