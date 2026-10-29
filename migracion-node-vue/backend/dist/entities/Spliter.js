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
exports.Spliter = void 0;
const typeorm_1 = require("typeorm");
const Olt_js_1 = require("./Olt.js");
const Boxnav_js_1 = require("./Boxnav.js");
const SpliterPort_js_1 = require("./SpliterPort.js");
let Spliter = class Spliter {
    id;
    name;
    code;
    outs;
    direccion;
    olt_id;
    olt;
    boxnavs;
    ports;
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
        if (this.code)
            this.code = this.code.trim().toUpperCase();
        if (this.direccion)
            this.direccion = this.direccion.trim().toUpperCase();
    }
};
exports.Spliter = Spliter;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Spliter.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Spliter.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 4 }),
    __metadata("design:type", String)
], Spliter.prototype, "code", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'int' }),
    __metadata("design:type", Number)
], Spliter.prototype, "outs", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Spliter.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Spliter.prototype, "olt_id", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Olt_js_1.Olt, (olt) => olt.spliters, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'olt_id' }),
    __metadata("design:type", Olt_js_1.Olt)
], Spliter.prototype, "olt", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Boxnav_js_1.Boxnav, (boxnav) => boxnav.spliter),
    __metadata("design:type", Array)
], Spliter.prototype, "boxnavs", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => SpliterPort_js_1.SpliterPort, (port) => port.spliter),
    __metadata("design:type", Array)
], Spliter.prototype, "ports", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Spliter.prototype, "formatAttributes", null);
exports.Spliter = Spliter = __decorate([
    (0, typeorm_1.Entity)('spliters')
], Spliter);
