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
exports.Boxnav = void 0;
const typeorm_1 = require("typeorm");
const Spliter_js_1 = require("./Spliter.js");
const Portboxnav_js_1 = require("./Portboxnav.js");
let Boxnav = class Boxnav {
    id;
    name;
    code;
    outs;
    direccion;
    status;
    spliter_id;
    splitter_port;
    spliter;
    portboxnavs;
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
        if (this.code)
            this.code = this.code.trim().toUpperCase();
        if (this.direccion)
            this.direccion = this.direccion.trim().toUpperCase();
    }
};
exports.Boxnav = Boxnav;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Boxnav.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Boxnav.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 12 }),
    __metadata("design:type", String)
], Boxnav.prototype, "code", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'smallint' }),
    __metadata("design:type", Number)
], Boxnav.prototype, "outs", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Boxnav.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 1, default: '0' }),
    __metadata("design:type", String)
], Boxnav.prototype, "status", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Boxnav.prototype, "spliter_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'integer', nullable: true }),
    __metadata("design:type", Number)
], Boxnav.prototype, "splitter_port", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Spliter_js_1.Spliter, (spliter) => spliter.boxnavs, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'spliter_id' }),
    __metadata("design:type", Spliter_js_1.Spliter)
], Boxnav.prototype, "spliter", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Portboxnav_js_1.Portboxnav, (port) => port.boxnav),
    __metadata("design:type", Array)
], Boxnav.prototype, "portboxnavs", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Boxnav.prototype, "formatAttributes", null);
exports.Boxnav = Boxnav = __decorate([
    (0, typeorm_1.Entity)('boxnavs')
], Boxnav);
