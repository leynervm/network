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
exports.Seriepago = void 0;
const typeorm_1 = require("typeorm");
const Recibo_js_1 = require("./Recibo.js");
let Seriepago = class Seriepago {
    id;
    descripcion;
    serie;
    contador;
    recibos;
    // Compatibilidad con accesos previos .name y .count
    get name() {
        return this.descripcion;
    }
    set name(value) {
        this.descripcion = value;
    }
    get count() {
        return this.contador;
    }
    set count(value) {
        this.contador = value;
    }
    formatAttributes() {
        if (this.descripcion)
            this.descripcion = this.descripcion.trim().toUpperCase();
        if (this.serie)
            this.serie = this.serie.trim().toUpperCase();
    }
};
exports.Seriepago = Seriepago;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'smallint' }),
    __metadata("design:type", Number)
], Seriepago.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Seriepago.prototype, "descripcion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 4, unique: true }),
    __metadata("design:type", String)
], Seriepago.prototype, "serie", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'integer', default: 0 }),
    __metadata("design:type", Number)
], Seriepago.prototype, "contador", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Recibo_js_1.Recibo, (recibo) => recibo.seriepago),
    __metadata("design:type", Array)
], Seriepago.prototype, "recibos", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Seriepago.prototype, "formatAttributes", null);
exports.Seriepago = Seriepago = __decorate([
    (0, typeorm_1.Entity)('seriepagos')
], Seriepago);
