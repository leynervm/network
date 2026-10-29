"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.AuthController = void 0;
const bcryptjs_1 = __importDefault(require("bcryptjs"));
const jsonwebtoken_1 = __importDefault(require("jsonwebtoken"));
const dataSource_js_1 = require("../config/dataSource.js");
const User_js_1 = require("../entities/User.js");
class AuthController {
    static async login(req, res) {
        try {
            const { email, password } = req.body;
            if (!email || !password) {
                return res.status(422).json({ message: 'El correo y la contraseña son requeridos.' });
            }
            const userRepo = dataSource_js_1.AppDataSource.getRepository(User_js_1.User);
            const user = await userRepo.findOne({
                where: { email },
                relations: ['roles', 'roles.permissions', 'permissions'],
            });
            if (!user) {
                return res.status(401).json({ message: 'Las credenciales proporcionadas no son válidas.' });
            }
            const isValid = await bcryptjs_1.default.compare(password, user.password);
            if (!isValid) {
                return res.status(401).json({ message: 'Las credenciales proporcionadas no son válidas.' });
            }
            const secret = process.env.JWT_SECRET || 'secret';
            const token = jsonwebtoken_1.default.sign({ id: user.id, email: user.email }, secret, { expiresIn: (process.env.JWT_EXPIRES_IN || '7d') });
            res.cookie('network_auth_token', token, {
                httpOnly: true,
                secure: process.env.NODE_ENV === 'production',
                sameSite: 'lax',
                maxAge: 7 * 24 * 60 * 60 * 1000,
            });
            // Extraer permisos para el cliente
            const permissions = new Set();
            user.permissions?.forEach((p) => permissions.add(p.name));
            user.roles?.forEach((r) => r.permissions?.forEach((p) => permissions.add(p.name)));
            return res.json({
                user: {
                    id: user.id,
                    name: user.name,
                    email: user.email,
                    roles: user.roles?.map((r) => r.name) || [],
                    permissions: Array.from(permissions),
                },
                token,
            });
        }
        catch (error) {
            return res.status(500).json({ message: error.message || 'Error interno del servidor.' });
        }
    }
    static async me(req, res) {
        if (!req.user) {
            return res.status(401).json({ message: 'No autenticado.' });
        }
        return res.json({
            id: req.user.id,
            name: req.user.name,
            email: req.user.email,
            roles: req.user.roles?.map((r) => r.name) || [],
            permissions: req.userPermissions || [],
        });
    }
    static async logout(req, res) {
        res.clearCookie('network_auth_token');
        return res.json({ message: 'Sesión cerrada correctamente.' });
    }
    static async updateProfile(req, res) {
        try {
            const { name, email } = req.body;
            const userRepo = dataSource_js_1.AppDataSource.getRepository(User_js_1.User);
            const user = req.user;
            if (name)
                user.name = name;
            if (email && email !== user.email) {
                const existing = await userRepo.findOne({ where: { email } });
                if (existing && existing.id !== user.id) {
                    return res.status(422).json({ message: 'El correo electrónico ya se encuentra registrado.' });
                }
                user.email = email;
            }
            await userRepo.save(user);
            return res.json({ message: 'Perfil actualizado correctamente.', user });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
    static async updatePassword(req, res) {
        try {
            const { current_password, password, password_confirmation } = req.body;
            const user = req.user;
            if (!current_password || !password) {
                return res.status(422).json({ message: 'Todos los campos de contraseña son requeridos.' });
            }
            if (password !== password_confirmation) {
                return res.status(422).json({ message: 'La confirmación de la contraseña no coincide.' });
            }
            const isValid = await bcryptjs_1.default.compare(current_password, user.password);
            if (!isValid) {
                return res.status(422).json({ message: 'La contraseña actual ingresada es incorrecta.' });
            }
            user.password = await bcryptjs_1.default.hash(password, 10);
            await dataSource_js_1.AppDataSource.getRepository(User_js_1.User).save(user);
            return res.json({ message: 'Contraseña actualizada con éxito.' });
        }
        catch (error) {
            return res.status(500).json({ message: error.message });
        }
    }
}
exports.AuthController = AuthController;
