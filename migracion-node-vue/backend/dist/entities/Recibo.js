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
exports.Recibo = void 0;
const typeorm_1 = require("typeorm");
const Network_js_1 = require("./Network.js");
const Client_js_1 = require("./Client.js");
const Seriepago_js_1 = require("./Seriepago.js");
let Recibo = class Recibo {
    id;
    date;
    vencimiento;
    seriecompleta;
    month;
    amount;
    descuento;
    total;
    status;
    seriepago_id;
    client_id;
    network_id;
    network;
    client;
    seriepago;
};
exports.Recibo = Recibo;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Recibo.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'timestamp' }),
    (0, typeorm_1.Index)('recibos_date_index'),
    __metadata("design:type", Object)
], Recibo.prototype, "date", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'date' }),
    __metadata("design:type", String)
], Recibo.prototype, "vencimiento", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 13, unique: true }),
    __metadata("design:type", String)
], Recibo.prototype, "seriecompleta", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 7 }),
    (0, typeorm_1.Index)('recibos_month_index'),
    __metadata("design:type", String)
], Recibo.prototype, "month", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2 }),
    __metadata("design:type", Number)
], Recibo.prototype, "amount", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2, default: 0.0 }),
    __metadata("design:type", Number)
], Recibo.prototype, "descuento", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2 }),
    __metadata("design:type", Number)
], Recibo.prototype, "total", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 1, default: '0' }),
    __metadata("design:type", String)
], Recibo.prototype, "status", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'smallint' }),
    (0, typeorm_1.Index)('recibos_seriepago_id_index'),
    __metadata("design:type", Number)
], Recibo.prototype, "seriepago_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    (0, typeorm_1.Index)('recibos_client_id_index'),
    __metadata("design:type", Number)
], Recibo.prototype, "client_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    (0, typeorm_1.Index)('recibos_network_id_index'),
    __metadata("design:type", Number)
], Recibo.prototype, "network_id", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Network_js_1.Network, (network) => network.recibos, { nullable: true, onDelete: 'SET NULL', onUpdate: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'network_id' }),
    __metadata("design:type", Network_js_1.Network)
], Recibo.prototype, "network", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Client_js_1.Client, (client) => client.recibos),
    (0, typeorm_1.JoinColumn)({ name: 'client_id' }),
    __metadata("design:type", Client_js_1.Client)
], Recibo.prototype, "client", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Seriepago_js_1.Seriepago, (seriepago) => seriepago.recibos),
    (0, typeorm_1.JoinColumn)({ name: 'seriepago_id' }),
    __metadata("design:type", Seriepago_js_1.Seriepago)
], Recibo.prototype, "seriepago", void 0);
exports.Recibo = Recibo = __decorate([
    (0, typeorm_1.Entity)('recibos')
], Recibo);
