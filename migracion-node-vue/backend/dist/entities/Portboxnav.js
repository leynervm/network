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
exports.Portboxnav = void 0;
const typeorm_1 = require("typeorm");
const Boxnav_js_1 = require("./Boxnav.js");
let Portboxnav = class Portboxnav {
    id;
    code;
    status;
    boxnav_id;
    alias;
    direccion;
    boxnav;
    formatAttributes() {
        if (this.code)
            this.code = this.code.trim().toUpperCase();
        if (this.alias)
            this.alias = this.alias.trim().toUpperCase();
        if (this.direccion)
            this.direccion = this.direccion.trim().toUpperCase();
    }
};
exports.Portboxnav = Portboxnav;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Portboxnav.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 12 }),
    __metadata("design:type", String)
], Portboxnav.prototype, "code", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 1, default: '0' }),
    __metadata("design:type", String)
], Portboxnav.prototype, "status", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Portboxnav.prototype, "boxnav_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    (0, typeorm_1.Index)('portboxnavs_alias_index'),
    __metadata("design:type", String)
], Portboxnav.prototype, "alias", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Portboxnav.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Boxnav_js_1.Boxnav, (boxnav) => boxnav.portboxnavs, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'boxnav_id' }),
    __metadata("design:type", Boxnav_js_1.Boxnav)
], Portboxnav.prototype, "boxnav", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Portboxnav.prototype, "formatAttributes", null);
exports.Portboxnav = Portboxnav = __decorate([
    (0, typeorm_1.Entity)('portboxnavs')
], Portboxnav);
