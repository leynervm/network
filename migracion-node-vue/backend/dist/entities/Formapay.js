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
var Formapay_1;
Object.defineProperty(exports, "__esModule", { value: true });
exports.Formapay = void 0;
const typeorm_1 = require("typeorm");
const Payment_js_1 = require("./Payment.js");
let Formapay = class Formapay {
    static { Formapay_1 = this; }
    id;
    name;
    type;
    deleted_at;
    payments;
    static EFECTIVO = '0';
    static TRANSFERENCIA = '1';
    isTransferencia() {
        return this.type === Formapay_1.TRANSFERENCIA;
    }
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
    }
};
exports.Formapay = Formapay;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'smallint' }),
    __metadata("design:type", Number)
], Formapay.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Formapay.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 1, default: '0' }),
    __metadata("design:type", String)
], Formapay.prototype, "type", void 0);
__decorate([
    (0, typeorm_1.DeleteDateColumn)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], Formapay.prototype, "deleted_at", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Payment_js_1.Payment, (payment) => payment.formapay),
    __metadata("design:type", Array)
], Formapay.prototype, "payments", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Formapay.prototype, "formatAttributes", null);
exports.Formapay = Formapay = Formapay_1 = __decorate([
    (0, typeorm_1.Entity)('formapays')
], Formapay);
