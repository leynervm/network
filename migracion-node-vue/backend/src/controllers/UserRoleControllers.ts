import { Request, Response } from 'express';
import bcrypt from 'bcryptjs';
import { AppDataSource } from '../config/dataSource.js';
import { User } from '../entities/User.js';
import { Role } from '../entities/Role.js';
import { Permission } from '../entities/Permission.js';
import { toastJson } from '../utils/helpers.js';

export class UserController {
  static async index(req: Request, res: Response) {
    try {
      const userRepo = AppDataSource.getRepository(User);
      const users = await userRepo.find({
        relations: ['roles', 'permissions'],
        order: { id: 'ASC' },
      });

      const sanitized = users.map((u) => ({
        id: u.id,
        name: u.name,
        email: u.email,
        roles: u.roles || [],
        permissions: u.permissions || [],
      }));

      return res.json(sanitized);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, email, password, role_ids } = req.body;
      if (!name || !email || !password) {
        return res.status(422).json({ message: 'Nombre, correo y contraseña son obligatorios.' });
      }

      const userRepo = AppDataSource.getRepository(User);
      const existing = await userRepo.findOne({ where: { email } });
      if (existing) {
        return res.status(422).json({ message: 'El correo electrónico ya se encuentra registrado.' });
      }

      const hashedPassword = await bcrypt.hash(password, 10);
      const user = userRepo.create({
        name,
        email,
        password: hashedPassword,
      });

      if (role_ids && Array.isArray(role_ids)) {
        const roleRepo = AppDataSource.getRepository(Role);
        user.roles = await roleRepo.findByIds(role_ids);
      }

      await userRepo.save(user);

      return res.status(201).json({
        message: 'Usuario registrado exitosamente.',
        data: { id: user.id, name: user.name, email: user.email },
        toast: toastJson('Usuario creado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { name, email, password, role_ids } = req.body;
      const userRepo = AppDataSource.getRepository(User);

      const user = await userRepo.findOne({ where: { id }, relations: ['roles'] });
      if (!user) return res.status(404).json({ message: 'Usuario no encontrado.' });

      if (email && email !== user.email) {
        const existing = await userRepo.findOne({ where: { email } });
        if (existing && existing.id !== user.id) {
          return res.status(422).json({ message: 'El correo electrónico ya está en uso.' });
        }
        user.email = email;
      }

      user.name = name;
      if (password && password.trim() !== '') {
        user.password = await bcrypt.hash(password, 10);
      }

      if (role_ids && Array.isArray(role_ids)) {
        const roleRepo = AppDataSource.getRepository(Role);
        user.roles = await roleRepo.findByIds(role_ids);
      }

      await userRepo.save(user);

      return res.json({
        message: 'Usuario actualizado correctamente.',
        data: { id: user.id, name: user.name, email: user.email },
        toast: toastJson('Usuario actualizado correctamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const userRepo = AppDataSource.getRepository(User);
      const user = await userRepo.findOne({ where: { id } });
      if (!user) return res.status(404).json({ message: 'Usuario no encontrado.' });

      await userRepo.remove(user);
      return res.json({ message: 'Usuario eliminado.', toast: toastJson('Usuario eliminado con éxito') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}

import { In, Like } from 'typeorm';

export class RoleController {
  static async index(req: Request, res: Response) {
    try {
      const search = req.query.search ? String(req.query.search).trim() : '';
      const roleRepo = AppDataSource.getRepository(Role);
      
      let query = roleRepo
        .createQueryBuilder('role')
        .leftJoinAndSelect('role.permissions', 'permission')
        .leftJoinAndSelect('role.users', 'user')
        .orderBy('role.id', 'ASC');

      if (search) {
        query = query.where('LOWER(role.name) LIKE :search', { search: `%${search.toLowerCase()}%` });
      }

      const roles = await query.getMany();

      const mapped = roles.map((r) => ({
        id: r.id,
        name: r.name,
        guard_name: r.guard_name,
        created_at: r.created_at,
        updated_at: r.updated_at,
        permissions: r.permissions || [],
        permissions_count: r.permissions ? r.permissions.length : 0,
        users_count: r.users ? r.users.length : 0,
      }));

      return res.json(mapped);
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, selectedPermissions, permission_ids } = req.body;
      if (!name || !name.trim()) return res.status(422).json({ message: 'El nombre del rol es obligatorio.' });

      const roleRepo = AppDataSource.getRepository(Role);
      const permRepo = AppDataSource.getRepository(Permission);

      const cleanName = name.trim().toLowerCase();
      const existing = await roleRepo.findOne({ where: { name: cleanName } });
      if (existing) {
        return res.status(422).json({ message: 'Ya existe un rol con este nombre.' });
      }

      const role = roleRepo.create({ name: cleanName, guard_name: 'web' });

      if (Array.isArray(selectedPermissions) && selectedPermissions.length > 0) {
        role.permissions = await permRepo.find({ where: { name: In(selectedPermissions) } });
      } else if (Array.isArray(permission_ids) && permission_ids.length > 0) {
        role.permissions = await permRepo.find({ where: { id: In(permission_ids) } });
      } else {
        role.permissions = [];
      }

      await roleRepo.save(role);
      return res.status(201).json({ message: 'Rol creado con éxito.', data: role, toast: toastJson('Rol creado con éxito') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async update(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const { name, role_name, selectedPermissions, permission_ids } = req.body;
      const targetName = (role_name || name || '').trim().toLowerCase();

      const roleRepo = AppDataSource.getRepository(Role);
      const permRepo = AppDataSource.getRepository(Permission);

      const role = await roleRepo.findOne({ where: { id }, relations: ['permissions'] });
      if (!role) return res.status(404).json({ message: 'Rol no encontrado.' });

      if (role.name === 'admin' && targetName && targetName !== 'admin') {
        return res.status(403).json({ message: 'El rol Administrador está protegido y su nombre no puede modificarse.' });
      }

      if (targetName && role.name !== 'admin') {
        const existing = await roleRepo.findOne({ where: { name: targetName } });
        if (existing && Number(existing.id) !== id) {
          return res.status(422).json({ message: 'Este nombre de rol ya está en uso.' });
        }
        role.name = targetName;
      }

      if (role.name !== 'admin') {
        if (Array.isArray(selectedPermissions)) {
          role.permissions = selectedPermissions.length > 0 
            ? await permRepo.find({ where: { name: In(selectedPermissions) } })
            : [];
        } else if (Array.isArray(permission_ids)) {
          role.permissions = permission_ids.length > 0
            ? await permRepo.find({ where: { id: In(permission_ids) } })
            : [];
        }
      }

      await roleRepo.save(role);
      return res.json({ message: 'Rol y permisos actualizados correctamente.', data: role, toast: toastJson('Rol y permisos actualizados correctamente') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async destroy(req: Request, res: Response) {
    try {
      const id = parseInt(req.params.id, 10);
      const roleRepo = AppDataSource.getRepository(Role);
      const role = await roleRepo.findOne({ where: { id } });
      if (!role) return res.status(404).json({ message: 'El rol seleccionado no existe.' });
      if (role.name === 'admin') {
        return res.status(403).json({ message: 'El rol de Administrador principal no puede ser eliminado por seguridad del sistema.' });
      }
      role.permissions = [];
      await roleRepo.save(role);
      await roleRepo.remove(role);
      return res.json({ message: 'Rol eliminado.', toast: toastJson('Rol eliminado correctamente') });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}

export class PermissionController {
  static async index(req: Request, res: Response) {
    try {
      const search = req.query.search ? String(req.query.search).trim() : '';
      const selectedTable = req.query.selectedTable ? String(req.query.selectedTable).trim() : '';

      const permRepo = AppDataSource.getRepository(Permission);
      const permissions = await permRepo.find({ 
        relations: ['roles'],
        order: { table_name: 'ASC', name: 'ASC' } 
      });

      const tablesSet = new Set<string>();
      permissions.forEach(p => {
        if (p.table_name) tablesSet.add(p.table_name);
      });
      const tables = Array.from(tablesSet).sort();

      let filtered = permissions;
      if (selectedTable) {
        filtered = filtered.filter(p => p.table_name === selectedTable);
      }
      if (search) {
        const s = search.toLowerCase();
        filtered = filtered.filter(p => 
          p.name.toLowerCase().includes(s) || 
          (p.description && p.description.toLowerCase().includes(s)) ||
          (p.table_name && p.table_name.toLowerCase().includes(s))
        );
      }

      const grouped: Record<string, Permission[]> = {};
      filtered.forEach((p) => {
        const key = p.table_name || 'general';
        if (!grouped[key]) grouped[key] = [];
        grouped[key].push(p);
      });

      return res.json({
        all: permissions,
        filtered,
        grouped,
        tables,
        totalPermissions: permissions.length,
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }

  static async store(req: Request, res: Response) {
    try {
      const { name, table_name, description } = req.body;
      if (!name || !name.trim()) return res.status(422).json({ message: 'El identificador del permiso es obligatorio.' });
      if (!table_name || !table_name.trim()) return res.status(422).json({ message: 'El nombre de tabla/módulo es obligatorio.' });
      if (!description || !description.trim()) return res.status(422).json({ message: 'La descripción es obligatoria.' });

      const cleanName = name.trim().toLowerCase();
      const permRepo = AppDataSource.getRepository(Permission);
      const existing = await permRepo.findOne({ where: { name: cleanName } });
      if (existing) {
        return res.status(422).json({ message: 'Ya existe un permiso con este identificador.' });
      }

      const perm = permRepo.create({
        name: cleanName,
        table_name: table_name.trim().toLowerCase(),
        description: description.trim(),
        guard_name: 'web',
      });
      await permRepo.save(perm);

      // Asignar al rol admin automáticamente
      const roleRepo = AppDataSource.getRepository(Role);
      const adminRole = await roleRepo.findOne({ where: { name: 'admin' }, relations: ['permissions'] });
      if (adminRole) {
        adminRole.permissions = [...(adminRole.permissions || []), perm];
        await roleRepo.save(adminRole);
      }

      return res.status(201).json({
        message: 'Permiso creado exitosamente.',
        data: perm,
        toast: toastJson('Permiso creado exitosamente'),
      });
    } catch (error: any) {
      return res.status(500).json({ message: error.message });
    }
  }
}
