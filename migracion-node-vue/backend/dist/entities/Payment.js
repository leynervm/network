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
exports.Payment = void 0;
const typeorm_1 = require("typeorm");
const Formapay_js_1 = require("./Formapay.js");
let Payment = class Payment {
    id;
    date;
    month;
    amount;
    codetransferencia;
    detalle;
    formapay_id;
    paymentable_type;
    paymentable_id;
    formapay;
    formatAttributes() {
        if (this.codetransferencia)
            this.codetransferencia = this.codetransferencia.trim().toUpperCase();
        if (this.detalle)
            this.detalle = this.detalle.trim().toUpperCase();
    }
};
exports.Payment = Payment;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Payment.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'timestamp' }),
    (0, typeorm_1.Index)('payments_date_index'),
    __metadata("design:type", Object)
], Payment.prototype, "date", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 7 }),
    (0, typeorm_1.Index)('payments_month_index'),
    __metadata("design:type", String)
], Payment.prototype, "month", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2 }),
    __metadata("design:type", Number)
], Payment.prototype, "amount", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Payment.prototype, "codetransferencia", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Payment.prototype, "detalle", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'smallint' }),
    __metadata("design:type", Number)
], Payment.prototype, "formapay_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Payment.prototype, "paymentable_type", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Payment.prototype, "paymentable_id", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Formapay_js_1.Formapay, (formapay) => formapay.payments),
    (0, typeorm_1.JoinColumn)({ name: 'formapay_id' }),
    __metadata("design:type", Formapay_js_1.Formapay)
], Payment.prototype, "formapay", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Payment.prototype, "formatAttributes", null);
exports.Payment = Payment = __decorate([
    (0, typeorm_1.Entity)('payments'),
    (0, typeorm_1.Index)('payments_paymentable_type_paymentable_id_index', ['paymentable_type', 'paymentable_id'])
], Payment);
