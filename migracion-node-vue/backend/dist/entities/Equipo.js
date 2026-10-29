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
exports.Equipo = void 0;
const typeorm_1 = require("typeorm");
const Network_js_1 = require("./Network.js");
let Equipo = class Equipo {
    id;
    descripcion;
    price;
    type;
    mac;
    network_id;
    network;
    // Compatibilidad con código previo que referenciaba .name
    get name() {
        return this.descripcion;
    }
    set name(value) {
        this.descripcion = value;
    }
    formatAttributes() {
        if (this.descripcion)
            this.descripcion = this.descripcion.trim().toUpperCase();
        if (this.mac)
            this.mac = this.mac.trim().toUpperCase();
        if (this.type)
            this.type = this.type.trim().toUpperCase();
    }
};
exports.Equipo = Equipo;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Equipo.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text' }),
    __metadata("design:type", String)
], Equipo.prototype, "descripcion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2, default: 0.0 }),
    __metadata("design:type", Number)
], Equipo.prototype, "price", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Equipo.prototype, "type", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Equipo.prototype, "mac", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Equipo.prototype, "network_id", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Network_js_1.Network, (network) => network.equipos, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'network_id' }),
    __metadata("design:type", Network_js_1.Network)
], Equipo.prototype, "network", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Equipo.prototype, "formatAttributes", null);
exports.Equipo = Equipo = __decorate([
    (0, typeorm_1.Entity)('equipos')
], Equipo);
