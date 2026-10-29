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
exports.User = void 0;
const typeorm_1 = require("typeorm");
const Role_js_1 = require("./Role.js");
const Permission_js_1 = require("./Permission.js");
const Network_js_1 = require("./Network.js");
let User = class User {
    id;
    name;
    email;
    email_verified_at;
    password;
    two_factor_secret;
    two_factor_recovery_codes;
    two_factor_confirmed_at;
    remember_token;
    current_team_id;
    profile_photo_path;
    created_at;
    updated_at;
    roles;
    permissions;
    networks;
};
exports.User = User;
__decorate([
    (0, typeorm_1.PrimaryGeneratedColumn)({ type: 'bigint' }),
    __metadata("design:type", Number)
], User.prototype, "id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], User.prototype, "name", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255, unique: true }),
    __metadata("design:type", String)
], User.prototype, "email", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], User.prototype, "email_verified_at", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 255 }),
    __metadata("design:type", String)
], User.prototype, "password", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], User.prototype, "two_factor_secret", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'text', nullable: true }),
    __metadata("design:type", String)
], User.prototype, "two_factor_recovery_codes", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], User.prototype, "two_factor_confirmed_at", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 100, nullable: true }),
    __metadata("design:type", String)
], User.prototype, "remember_token", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'bigint', nullable: true }),
    __metadata("design:type", Number)
], User.prototype, "current_team_id", void 0);
__decorate([
    (0, typeorm_1.Column)({ type: 'varchar', length: 2048, nullable: true }),
    __metadata("design:type", String)
], User.prototype, "profile_photo_path", void 0);
__decorate([
    (0, typeorm_1.CreateDateColumn)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], User.prototype, "created_at", void 0);
__decorate([
    (0, typeorm_1.UpdateDateColumn)({ type: 'timestamp', nullable: true }),
    __metadata("design:type", Date)
], User.prototype, "updated_at", void 0);
__decorate([
    (0, typeorm_1.ManyToMany)(() => Role_js_1.Role),
    (0, typeorm_1.JoinTable)({
        name: 'model_has_roles',
        joinColumn: { name: 'model_id', referencedColumnName: 'id' },
        inverseJoinColumn: { name: 'role_id', referencedColumnName: 'id' },
    }),
    __metadata("design:type", Array)
], User.prototype, "roles", void 0);
__decorate([
    (0, typeorm_1.ManyToMany)(() => Permission_js_1.Permission),
    (0, typeorm_1.JoinTable)({
        name: 'model_has_permissions',
        joinColumn: { name: 'model_id', referencedColumnName: 'id' },
        inverseJoinColumn: { name: 'permission_id', referencedColumnName: 'id' },
    }),
    __metadata("design:type", Array)
], User.prototype, "permissions", void 0);
__decorate([
    (0, typeorm_1.OneToMany)(() => Network_js_1.Network, (network) => network.user),
    __metadata("design:type", Array)
], User.prototype, "networks", void 0);
exports.User = User = __decorate([
    (0, typeorm_1.Entity)('users')
], User);
