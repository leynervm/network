"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.authMiddleware = authMiddleware;
exports.can = can;
const jsonwebtoken_1 = __importDefault(require("jsonwebtoken"));
const dataSource_js_1 = require("../config/dataSource.js");
const User_js_1 = require("../entities/User.js");
async function authMiddleware(req, res, next) {
    try {
        const token = req.cookies?.network_auth_token ||
            (req.headers.authorization?.startsWith('Bearer ')
                ? req.headers.authorization.substring(7)
                : null);
        if (!token) {
            return res.status(401).json({ message: 'No autenticado.' });
        }
        const secret = process.env.JWT_SECRET || 'secret';
        const decoded = jsonwebtoken_1.default.verify(token, secret);
        const userRepo = dataSource_js_1.AppDataSource.getRepository(User_js_1.User);
        const user = await userRepo.findOne({
            where: { id: decoded.id },
            relations: ['roles', 'roles.permissions', 'permissions'],
        });
        if (!user) {
            return res.status(401).json({ message: 'Usuario no encontrado o sesión inválida.' });
        }
        // Aplanar los nombres de permisos disponibles para el usuario
        const permissionSet = new Set();
        if (user.permissions) {
            user.permissions.forEach((p) => permissionSet.add(p.name));
        }
        if (user.roles) {
            user.roles.forEach((r) => {
                if (r.permissions) {
                    r.permissions.forEach((p) => permissionSet.add(p.name));
                }
            });
        }
        req.user = user;
        req.userPermissions = Array.from(permissionSet);
        next();
    }
    catch (error) {
        return res.status(401).json({ message: 'Token de sesión expirado o inválido.' });
    }
}
function can(permissionName) {
    return (req, res, next) => {
        if (!req.user) {
            return res.status(401).json({ message: 'No autenticado.' });
        }
        // Si tiene el rol Administrador o posee el permiso específico
        const isAdmin = req.user.roles?.some((r) => r.name.toLowerCase() === 'administrador');
        const hasPermission = req.userPermissions?.includes(permissionName);
        if (isAdmin || hasPermission) {
            return next();
        }
        return res.status(403).json({
            message: `No tienes el permiso requerido (${permissionName}) para realizar esta acción.`,
        });
    };
}
