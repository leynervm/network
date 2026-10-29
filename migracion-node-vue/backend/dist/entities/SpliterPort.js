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
exports.SpliterPort = void 0;
const typeorm_1 = require("typeorm");
const Spliter_js_1 = require("./Spliter.js");
let SpliterPort = class SpliterPort {
    id;
    spliter_id;
    port_number;
    alias;
    direccion;
    spliter;
};
exports.SpliterPort = SpliterPort;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], SpliterPort.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    (0, typeorm_1.Index)('spliter_ports_spliter_id_index'),
    __metadata("design:type", Number)
], SpliterPort.prototype, "spliter_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'integer' }),
    __metadata("design:type", Number)
], SpliterPort.prototype, "port_number", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], SpliterPort.prototype, "alias", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], SpliterPort.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Spliter_js_1.Spliter, (spliter) => spliter.ports, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'spliter_id' }),
    __metadata("design:type", Spliter_js_1.Spliter)
], SpliterPort.prototype, "spliter", void 0);
exports.SpliterPort = SpliterPort = __decorate([
    (0, typeorm_1.Entity)('spliter_ports'),
    (0, typeorm_1.Unique)(['spliter_id', 'port_number'])
], SpliterPort);
