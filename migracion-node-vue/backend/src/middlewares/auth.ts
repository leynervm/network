import { Request, Response, NextFunction } from 'express';
import jwt from 'jsonwebtoken';
import { AppDataSource } from '../config/dataSource.js';
import { User } from '../entities/User.js';

export interface AuthRequest extends Request {
  user?: User;
  userPermissions?: string[];
}

export async function authMiddleware(req: AuthRequest, res: Response, next: NextFunction) {
  try {
    const token =
      req.cookies?.network_auth_token ||
      (req.headers.authorization?.startsWith('Bearer ')
        ? req.headers.authorization.substring(7)
        : null);

    if (!token) {
      return res.status(401).json({ message: 'No autenticado.' });
    }

    const secret = process.env.JWT_SECRET || 'secret';
    const decoded = jwt.verify(token, secret) as { id: number };

    const userRepo = AppDataSource.getRepository(User);
    const user = await userRepo.findOne({
      where: { id: decoded.id },
      relations: ['roles', 'roles.permissions', 'permissions'],
    });

    if (!user) {
      return res.status(401).json({ message: 'Usuario no encontrado o sesión inválida.' });
    }

    // Aplanar los nombres de permisos disponibles para el usuario
    const permissionSet = new Set<string>();

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
  } catch (error) {
    return res.status(401).json({ message: 'Token de sesión expirado o inválido.' });
  }
}

export function can(permissionName: string) {
  return (req: AuthRequest, res: Response, next: NextFunction) => {
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
