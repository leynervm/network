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
exports.Network = void 0;
const typeorm_1 = require("typeorm");
const Client_js_1 = require("./Client.js");
const User_js_1 = require("./User.js");
const Ubigeo_js_1 = require("./Ubigeo.js");
const Recibo_js_1 = require("./Recibo.js");
const Equipo_js_1 = require("./Equipo.js");
let Network = class Network {
    id;
    date;
    code;
    portnumber;
    descripcion;
    type;
    telefono;
    price;
    direccion;
    typelocal;
    status;
    client_id;
    user_id;
    ubigeo_id;
    networkable_type;
    networkable_id;
    latitude;
    longitude;
    zoom;
    codigo_slp;
    location;
    client;
    user;
    ubigeo;
    recibos;
    equipos;
    // Helpers de compatibilidad 1:1
    static ALQUILADO = 'ALQUILADO';
    static PROPIO = 'PROPIO';
    static TV = 'CABLE TELEVISIÓN';
    static FIBRA = 'FIBRA OPTICA';
    static FIBRA_TV = 'FIBRA OPTICA + CABLE TELEVISIÓN';
    static SATELITAL = 'INTERNET SATELITAL';
    static ACTIVO = '0';
    static SUSPENDIDO = '2';
    formatAttributes() {
        if (this.descripcion)
            this.descripcion = this.descripcion.trim().toUpperCase();
        if (this.code)
            this.code = this.code.trim().toUpperCase();
        if (this.direccion)
            this.direccion = this.direccion.trim().toUpperCase();
        if (this.location)
            this.location = this.location.trim().toUpperCase();
    }
};
exports.Network = Network;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Network.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'timestamp' }),
    (0, typeorm_1.Index)('networks_date_index'),
    __metadata("design:type", Object)
], Network.prototype, "date", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 12, unique: true, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "code", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "portnumber", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "descripcion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    (0, typeorm_1.Index)('networks_type_index'),
    __metadata("design:type", String)
], Network.prototype, "type", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 15, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "telefono", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 12, scale: 2, default: 0.0 }),
    __metadata("design:type", Number)
], Network.prototype, "price", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text' }),
    __metadata("design:type", String)
], Network.prototype, "direccion", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 20, default: 'PROPIO', nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "typelocal", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'char', length: 1, default: '0' }),
    (0, typeorm_1.Index)('networks_status_index'),
    __metadata("design:type", String)
], Network.prototype, "status", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint' }),
    (0, typeorm_1.Index)('networks_client_id_index'),
    __metadata("design:type", Number)
], Network.prototype, "client_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    __metadata("design:type", Number)
], Network.prototype, "user_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    (0, typeorm_1.Index)('networks_ubigeo_id_index'),
    __metadata("design:type", Number)
], Network.prototype, "ubigeo_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "networkable_type", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    __metadata("design:type", Number)
], Network.prototype, "networkable_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 10, scale: 7, nullable: true }),
    __metadata("design:type", Number)
], Network.prototype, "latitude", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'decimal', precision: 10, scale: 7, nullable: true }),
    __metadata("design:type", Number)
], Network.prototype, "longitude", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'smallint', default: 16, nullable: true }),
    __metadata("design:type", Number)
], Network.prototype, "zoom", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "codigo_slp", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, nullable: true }),
    __metadata("design:type", String)
], Network.prototype, "location", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Client_js_1.Client, (client) => client.networks, { onDelete: 'CASCADE' }),
    (0, typeorm_1.JoinColumn)({ name: 'client_id' }),
    __metadata("design:type", Client_js_1.Client)
], Network.prototype, "client", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => User_js_1.User, (user) => user.networks, { nullable: true }),
    (0, typeorm_1.JoinColumn)({ name: 'user_id' }),
    __metadata("design:type", User_js_1.User)
], Network.prototype, "user", void 0);
__decorate([
    (0, typeorm_1.ManyToOne)(() => Ubigeo_js_1.Ubigeo, (ubigeo) => ubigeo.networks, { nullable: true }),
    (0, typeorm_1.JoinColumn)({ name: 'ubigeo_id' }),
    __metadata("design:type", Ubigeo_js_1.Ubigeo)
], Network.prototype, "ubigeo", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Recibo_js_1.Recibo, (recibo) => recibo.network),
    __metadata("design:type", Array)
], Network.prototype, "recibos", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Equipo_js_1.Equipo, (equipo) => equipo.network),
    __metadata("design:type", Array)
], Network.prototype, "equipos", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Network.prototype, "formatAttributes", null);
exports.Network = Network = __decorate([
    (0, typeorm_1.Entity)('networks')
], Network);
