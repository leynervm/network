"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.PermissionSeeder = void 0;
const Permission_js_1 = require("../../entities/Permission.js");
const Role_js_1 = require("../../entities/Role.js");
const User_js_1 = require("../../entities/User.js");
class PermissionSeeder {
    static async run(dataSource) {
        const permRepo = dataSource.getRepository(Permission_js_1.Permission);
        const roleRepo = dataSource.getRepository(Role_js_1.Role);
        const userRepo = dataSource.getRepository(User_js_1.User);
        const permissionsByTable = {
            Usuarios: [
                { name: 'admin.users.index', description: 'Listar y buscar usuarios' },
                { name: 'admin.users.create', description: 'Crear nuevos usuarios' },
                { name: 'admin.users.edit', description: 'Editar usuarios y cambiar contraseñas' },
                { name: 'admin.users.delete', description: 'Eliminar usuarios' },
            ],
            Roles: [
                { name: 'admin.roles.index', description: 'Listar roles y permisos del sistema' },
                { name: 'admin.roles.create', description: 'Crear nuevos roles' },
                { name: 'admin.roles.edit', description: 'Editar roles y asignar permisos' },
                { name: 'admin.roles.delete', description: 'Eliminar roles' },
            ],
            OLTs: [
                { name: 'admin.olts.index', description: 'Listar OLTs' },
                { name: 'admin.olts.create', description: 'Crear OLT' },
                { name: 'admin.olts.edit', description: 'Editar OLT' },
                { name: 'admin.olts.delete', description: 'Eliminar OLT' },
                { name: 'admin.olts.show', description: 'Ver detalle y puertos OLT' },
            ],
            Splitters: [
                { name: 'admin.spliters.index', description: 'Listar Splitters' },
                { name: 'admin.spliters.create', description: 'Crear Splitters' },
                { name: 'admin.spliters.edit', description: 'Editar Splitters' },
                { name: 'admin.spliters.delete', description: 'Eliminar Splitters' },
            ],
            'Cajas NAP': [
                { name: 'admin.boxnavs.index', description: 'Listar Cajas NAP' },
                { name: 'admin.boxnavs.create', description: 'Crear Cajas NAP' },
                { name: 'admin.boxnavs.edit', description: 'Editar Cajas NAP' },
                { name: 'admin.boxnavs.delete', description: 'Eliminar Cajas NAP' },
            ],
            'Puertos NAP': [
                { name: 'admin.portboxnavs.index', description: 'Ver puertos de Cajas NAP' },
                { name: 'admin.portboxnavs.edit', description: 'Modificar estado de puertos' },
            ],
            Antenas: [
                { name: 'admin.antenas.index', description: 'Listar Antenas' },
                { name: 'admin.antenas.create', description: 'Crear Antenas' },
                { name: 'admin.antenas.edit', description: 'Editar Antenas' },
                { name: 'admin.antenas.delete', description: 'Eliminar Antenas' },
            ],
            Clientes: [
                { name: 'admin.clients.index', description: 'Listar Clientes' },
                { name: 'admin.clients.create', description: 'Registrar Clientes' },
                { name: 'admin.clients.edit', description: 'Editar Clientes' },
                { name: 'admin.clients.delete', description: 'Eliminar Clientes' },
            ],
            Redes: [
                { name: 'admin.networks.index', description: 'Listar Conexiones de Red' },
                { name: 'admin.networks.create', description: 'Crear Conexiones de Red' },
                { name: 'admin.networks.edit', description: 'Editar Conexiones de Red' },
                { name: 'admin.networks.delete', description: 'Eliminar Conexiones de Red' },
                { name: 'admin.networks.show', description: 'Ver Detalle de Red / Recibos' },
            ],
            Recibos: [
                { name: 'admin.recibos.index', description: 'Listar Recibos' },
                { name: 'admin.recibos.create', description: 'Generar Recibos' },
                { name: 'admin.recibos.edit', description: 'Editar Recibos' },
                { name: 'admin.recibos.delete', description: 'Eliminar o anular Recibos' },
                { name: 'admin.recibos.print', description: 'Imprimir Recibo PDF' },
            ],
            Pagos: [
                { name: 'admin.payments.index', description: 'Listar Pagos' },
                { name: 'admin.payments.create', description: 'Registrar Pagos' },
                { name: 'admin.payments.edit', description: 'Editar Pagos' },
                { name: 'admin.payments.delete', description: 'Eliminar Pagos' },
            ],
            Productos: [
                { name: 'admin.products.index', description: 'Listar Productos' },
                { name: 'admin.products.create', description: 'Crear Productos' },
                { name: 'admin.products.edit', description: 'Editar Productos' },
                { name: 'admin.products.delete', description: 'Eliminar Productos' },
            ],
            Marcas: [
                { name: 'admin.marcas.index', description: 'Listar Marcas' },
                { name: 'admin.marcas.create', description: 'Crear Marcas' },
                { name: 'admin.marcas.edit', description: 'Editar Marcas' },
                { name: 'admin.marcas.delete', description: 'Eliminar Marcas' },
            ],
            Equipos: [
                { name: 'admin.equipos.index', description: 'Listar Equipos' },
                { name: 'admin.equipos.create', description: 'Crear Equipos' },
                { name: 'admin.equipos.edit', description: 'Editar Equipos' },
                { name: 'admin.equipos.delete', description: 'Eliminar Equipos' },
            ],
            'Series de Pago': [
                { name: 'admin.seriepagos.index', description: 'Listar Series de Pago' },
                { name: 'admin.seriepagos.create', description: 'Crear Series de Pago' },
                { name: 'admin.seriepagos.edit', description: 'Editar Series de Pago' },
                { name: 'admin.seriepagos.delete', description: 'Eliminar Series de Pago' },
            ],
            'Formas de Pago': [
                { name: 'admin.formapays.index', description: 'Listar Formas de Pago' },
                { name: 'admin.formapays.create', description: 'Crear Formas de Pago' },
                { name: 'admin.formapays.edit', description: 'Editar Formas de Pago' },
                { name: 'admin.formapays.delete', description: 'Eliminar Formas de Pago' },
            ],
            Reportes: [
                { name: 'admin.reports.index', description: 'Ver Reportes Generales del Sistema' },
            ],
            'Notificaciones Yape': [
                { name: 'admin.yape.notifications', description: 'Ver Webhook y Notificaciones Yape' },
                { name: 'admin.yape.delete', description: 'Eliminar Notificaciones Yape' },
            ],
        };
        const allPermissions = [];
        for (const [tableName, permissions] of Object.entries(permissionsByTable)) {
            for (const item of permissions) {
                let perm = await permRepo.findOne({ where: { name: item.name } });
                if (!perm) {
                    perm = permRepo.create({
                        name: item.name,
                        guard_name: 'web',
                        table_name: tableName,
                        description: item.description,
                    });
                    await permRepo.save(perm);
                }
                else {
                    perm.table_name = tableName;
                    perm.description = item.description;
                    await permRepo.save(perm);
                }
                allPermissions.push(perm);
            }
        }
        console.log(`  [PermissionSeeder] ${allPermissions.length} permisos sincronizados.`);
        // 1. Rol admin (Acceso total)
        let roleAdmin = await roleRepo.findOne({ where: { name: 'admin' }, relations: ['permissions'] });
        if (!roleAdmin) {
            roleAdmin = roleRepo.create({ name: 'admin', guard_name: 'web', permissions: allPermissions });
        }
        else {
            roleAdmin.permissions = allPermissions;
        }
        await roleRepo.save(roleAdmin);
        // 2. Rol tecnico
        const tecnicoTables = [
            'OLTs', 'Splitters', 'Cajas NAP', 'Puertos NAP', 'Antenas', 'Clientes', 'Redes', 'Equipos', 'Marcas', 'Productos'
        ];
        const tecnicoPermissions = allPermissions.filter((p) => p.table_name && tecnicoTables.includes(p.table_name));
        let roleTecnico = await roleRepo.findOne({ where: { name: 'tecnico' }, relations: ['permissions'] });
        if (!roleTecnico) {
            roleTecnico = roleRepo.create({ name: 'tecnico', guard_name: 'web', permissions: tecnicoPermissions });
        }
        else {
            roleTecnico.permissions = tecnicoPermissions;
        }
        await roleRepo.save(roleTecnico);
        // 3. Rol asistente
        const asistenteTables = [
            'Clientes', 'Recibos', 'Pagos', 'Series de Pago', 'Formas de Pago', 'Reportes', 'Notificaciones Yape'
        ];
        const extraAsistenteNames = ['admin.networks.index', 'admin.networks.show', 'admin.products.index'];
        const asistentePermissions = allPermissions.filter((p) => (p.table_name && asistenteTables.includes(p.table_name)) || extraAsistenteNames.includes(p.name));
        let roleAsistente = await roleRepo.findOne({ where: { name: 'asistente' }, relations: ['permissions'] });
        if (!roleAsistente) {
            roleAsistente = roleRepo.create({ name: 'asistente', guard_name: 'web', permissions: asistentePermissions });
        }
        else {
            roleAsistente.permissions = asistentePermissions;
        }
        await roleRepo.save(roleAsistente);
        // Asignar rol admin a admin@gmail.com
        const adminUser = await userRepo.findOne({ where: { email: 'admin@gmail.com' }, relations: ['roles'] });
        if (adminUser) {
            adminUser.roles = [roleAdmin];
            await userRepo.save(adminUser);
            console.log(`  [PermissionSeeder] Rol admin asignado a admin@gmail.com`);
        }
        // Asignar rol tecnico a eliceo@gmail.com
        const eliceoUser = await userRepo.findOne({ where: { email: 'eliceo@gmail.com' }, relations: ['roles'] });
        if (eliceoUser) {
            eliceoUser.roles = [roleTecnico];
            await userRepo.save(eliceoUser);
            console.log(`  [PermissionSeeder] Rol tecnico asignado a eliceo@gmail.com`);
        }
    }
}
exports.PermissionSeeder = PermissionSeeder;
