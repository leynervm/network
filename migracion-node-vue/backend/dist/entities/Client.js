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
exports.Client = void 0;
const typeorm_1 = require("typeorm");
const Ubigeo_js_1 = require("./Ubigeo.js");
const Network_js_1 = require("./Network.js");
const Recibo_js_1 = require("./Recibo.js");
let Client = class Client {
    id;
    document;
    name;
    direccion;
    ubigeo_id;
    deleted_at;
    ubigeo;
    networks;
    recibos;
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
        if (this.direccion)
            this.direccion = this.direccion.trim().toUpperCase();
    }
};
exports.Client = Client;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Client.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 11 }),
    (0, typeorm_1.Index)('clients_document_index'),
    __metadata("design:type", String)
], Client.prototype, "document", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    (0, typeorm_1.Index)('clients_name_index'),
    __metadata("design:type", String)
], Client.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Client.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    __metadata("design:type", Number)
], Client.prototype, "ubigeo_id", void 0);
__decorate([
    (0, typeorm_1.DeleteDateColumn)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], Client.prototype, "deleted_at", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Ubigeo_js_1.Ubigeo, (ubigeo) => ubigeo.clients, { nullable: true }),
    (0, typeorm_1.JoinColumn)({ name: 'ubigeo_id' }),
    __metadata("design:type", Ubigeo_js_1.Ubigeo)
], Client.prototype, "ubigeo", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Network_js_1.Network, (network) => network.client),
    __metadata("design:type", Array)
], Client.prototype, "networks", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Recibo_js_1.Recibo, (recibo) => recibo.client),
    __metadata("design:type", Array)
], Client.prototype, "recibos", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Client.prototype, "formatAttributes", null);
exports.Client = Client = __decorate([
    (0, typeorm_1.Entity)('clients')
], Client);
