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
exports.Olt = void 0;
const typeorm_1 = require("typeorm");
const Spliter_js_1 = require("./Spliter.js");
const OltPort_js_1 = require("./OltPort.js");
let Olt = class Olt {
    id;
    name;
    code;
    outs;
    spliters;
    ports;
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
        if (this.code)
            this.code = this.code.trim().toUpperCase();
    }
};
exports.Olt = Olt;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Olt.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Olt.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 4, unique: true, nullable: true }),
    __metadata("design:type", String)
], Olt.prototype, "code", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'int' }),
    __metadata("design:type", Number)
], Olt.prototype, "outs", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Spliter_js_1.Spliter, (spliter) => spliter.olt),
    __metadata("design:type", Array)
], Olt.prototype, "spliters", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => OltPort_js_1.OltPort, (port) => port.olt),
    __metadata("design:type", Array)
], Olt.prototype, "ports", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Olt.prototype, "formatAttributes", null);
exports.Olt = Olt = __decorate([
    (0, typeorm_1.Entity)('olts')
], Olt);
