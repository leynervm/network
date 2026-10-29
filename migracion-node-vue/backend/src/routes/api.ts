import { Router } from 'express';
import { AuthController } from '../controllers/AuthController.js';
import { OltController } from '../controllers/OltController.js';
import { SpliterController } from '../controllers/SpliterController.js';
import { BoxnavController } from '../controllers/BoxnavController.js';
import { AntenaController } from '../controllers/AntenaController.js';
import { ClientController } from '../controllers/ClientController.js';
import { NetworkController } from '../controllers/NetworkController.js';
import { ReciboController } from '../controllers/ReciboController.js';
import { PaymentController } from '../controllers/PaymentController.js';
import { MarcaController, ProductController, EquipoController } from '../controllers/CatalogControllers.js';
import { ReportController } from '../controllers/ReportController.js';
import { UserController, RoleController, PermissionController } from '../controllers/UserRoleControllers.js';
import { YapeWebhookController } from '../controllers/YapeWebhookController.js';
import { UbigeoController, SeriepagoController } from '../controllers/CommonControllers.js';
import { authMiddleware, can } from '../middlewares/auth.js';

const router = Router();

// ================= Rutas Públicas =================
router.post('/auth/login', AuthController.login);
router.post('/auth/logout', AuthController.logout);
router.post('/yape-webhook', YapeWebhookController.store); // Webhook público MacroDroid

// ================= Rutas Autenticadas =================
router.use(authMiddleware);

// Perfil de usuario autenticado
router.get('/auth/me', AuthController.me);
router.put('/auth/profile', AuthController.updateProfile);
router.put('/auth/password', AuthController.updatePassword);

// OLTs
router.get('/olts', can('admin.olts.index'), OltController.index);
router.get('/olts/:id', can('admin.olts.show'), OltController.show);
router.post('/olts', can('admin.olts.create'), OltController.store);
router.put('/olts/:id', can('admin.olts.edit'), OltController.update);
router.delete('/olts/:id', can('admin.olts.delete'), OltController.destroy);
router.put('/olts/ports/:portId', can('admin.olts.edit'), OltController.updatePort);

// Splitters
router.get('/spliters', can('admin.spliters.index'), SpliterController.index);
router.get('/spliters/:id', can('admin.spliters.index'), SpliterController.show);
router.post('/spliters', can('admin.spliters.create'), SpliterController.store);
router.put('/spliters/:id', can('admin.spliters.edit'), SpliterController.update);
router.delete('/spliters/:id', can('admin.spliters.delete'), SpliterController.destroy);
router.put('/spliters/ports/:portId', can('admin.spliters.edit'), SpliterController.updatePort);

// Cajas NAP (Boxnavs)
router.get('/boxnavs', can('admin.boxnavs.index'), BoxnavController.index);
router.get('/boxnavs/:id', can('admin.boxnavs.index'), BoxnavController.show);
router.post('/boxnavs', can('admin.boxnavs.create'), BoxnavController.store);
router.put('/boxnavs/:id', can('admin.boxnavs.edit'), BoxnavController.update);
router.delete('/boxnavs/:id', can('admin.boxnavs.delete'), BoxnavController.destroy);
router.put('/boxnavs/ports/:portId', can('admin.portboxnavs.edit'), BoxnavController.updatePort);

// Antenas
router.get('/antenas', can('admin.antenas.index'), AntenaController.index);
router.post('/antenas', can('admin.antenas.create'), AntenaController.store);
router.put('/antenas/:id', can('admin.antenas.edit'), AntenaController.update);
router.delete('/antenas/:id', can('admin.antenas.delete'), AntenaController.destroy);

// Clientes
router.get('/clients', can('admin.clients.index'), ClientController.index);
router.get('/clients/:id', can('admin.clients.index'), ClientController.show);
router.post('/clients', can('admin.clients.create'), ClientController.store);
router.put('/clients/:id', can('admin.clients.edit'), ClientController.update);
router.delete('/clients/:id', can('admin.clients.delete'), ClientController.destroy);
router.get('/clients/consulta/:document', ClientController.consultaSunat);

// Redes y Conexiones (Networks)
router.get('/networks', can('admin.networks.index'), NetworkController.index);
router.get('/networks/:id', can('admin.networks.show'), NetworkController.show);
router.post('/networks', can('admin.networks.create'), NetworkController.store);
router.put('/networks/:id', can('admin.networks.edit'), NetworkController.update);
router.put('/networks/:id/toggle-status', can('admin.networks.edit'), NetworkController.toggleStatus);
router.delete('/networks/:id', can('admin.networks.delete'), NetworkController.destroy);

// Recibos
router.get('/recibos', can('admin.recibos.index'), ReciboController.index);
router.get('/recibos/:id', can('admin.recibos.index'), ReciboController.show);
router.post('/recibos', can('admin.recibos.create'), ReciboController.store);
router.post('/recibos/masivo', can('admin.recibos.create'), ReciboController.generarMasivo);
router.get('/recibos/:id/print', can('admin.recibos.print'), ReciboController.print);

// Pagos
router.get('/payments', can('admin.payments.index'), PaymentController.index);
router.post('/payments', can('admin.payments.create'), PaymentController.store);
router.post('/payments/generate-qr', PaymentController.generateQr);
router.delete('/payments/:id', can('admin.payments.delete'), PaymentController.destroy);
router.get('/formapays', PaymentController.formapays);

// Productos, Marcas y Equipos
router.get('/marcas', can('admin.marcas.index'), MarcaController.index);
router.post('/marcas', can('admin.marcas.create'), MarcaController.store);
router.put('/marcas/:id', can('admin.marcas.edit'), MarcaController.update);
router.delete('/marcas/:id', can('admin.marcas.delete'), MarcaController.destroy);

router.get('/products', can('admin.products.index'), ProductController.index);
router.post('/products', can('admin.products.create'), ProductController.store);
router.put('/products/:id', can('admin.products.edit'), ProductController.update);
router.delete('/products/:id', can('admin.products.delete'), ProductController.destroy);

router.get('/equipos', EquipoController.index);
router.post('/equipos', EquipoController.store);
router.put('/equipos/:id', EquipoController.update);
router.delete('/equipos/:id', EquipoController.destroy);

// Reportes
router.get('/reports/recibos', can('admin.reports.index'), ReportController.recibos);
router.get('/reports/payments', can('admin.reports.index'), ReportController.payments);
router.get('/reports/networks', can('admin.reports.index'), ReportController.networks);

// Usuarios, Roles y Permisos
router.get('/users', can('admin.users.index'), UserController.index);
router.post('/users', can('admin.users.create'), UserController.store);
router.put('/users/:id', can('admin.users.edit'), UserController.update);
router.delete('/users/:id', can('admin.users.delete'), UserController.destroy);

router.get('/roles', can('admin.roles.index'), RoleController.index);
router.post('/roles', can('admin.roles.create'), RoleController.store);
router.put('/roles/:id', can('admin.roles.edit'), RoleController.update);
router.delete('/roles/:id', can('admin.roles.delete'), RoleController.destroy);

router.get('/permissions', can('admin.roles.index'), PermissionController.index);
router.post('/permissions', can('admin.roles.create'), PermissionController.store);

// Yape Notificaciones Monitoreo
router.get('/yape-notifications', can('admin.yape.notifications'), YapeWebhookController.index);

// Ubigeos y Series
router.get('/ubigeos', UbigeoController.index);
router.get('/seriepagos', SeriepagoController.index);
router.post('/seriepagos', SeriepagoController.store);
router.put('/seriepagos/:id', SeriepagoController.update);

export default router;
