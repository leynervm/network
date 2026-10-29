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
exports.Marca = void 0;
const typeorm_1 = require("typeorm");
const Product_js_1 = require("./Product.js");
let Marca = class Marca {
    id;
    name;
    products;
    formatAttributes() {
        if (this.name)
            this.name = this.name.trim().toUpperCase();
    }
};
exports.Marca = Marca;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], Marca.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], Marca.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Product_js_1.Product, (product) => product.marca),
    __metadata("design:type", Array)
], Marca.prototype, "products", void 0);
__decorate([
    (0, typeorm_1.BeforeInsert)(),
    (0, typeorm_1.BeforeUpdate)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], Marca.prototype, "formatAttributes", null);
exports.Marca = Marca = __decorate([
    (0, typeorm_1.Entity)('marcas')
], Marca);
