"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = require("express");
const AuthController_js_1 = require("../controllers/AuthController.js");
const OltController_js_1 = require("../controllers/OltController.js");
const SpliterController_js_1 = require("../controllers/SpliterController.js");
const BoxnavController_js_1 = require("../controllers/BoxnavController.js");
const AntenaController_js_1 = require("../controllers/AntenaController.js");
const ClientController_js_1 = require("../controllers/ClientController.js");
const NetworkController_js_1 = require("../controllers/NetworkController.js");
const ReciboController_js_1 = require("../controllers/ReciboController.js");
const PaymentController_js_1 = require("../controllers/PaymentController.js");
const CatalogControllers_js_1 = require("../controllers/CatalogControllers.js");
const ReportController_js_1 = require("../controllers/ReportController.js");
const UserRoleControllers_js_1 = require("../controllers/UserRoleControllers.js");
const YapeWebhookController_js_1 = require("../controllers/YapeWebhookController.js");
const CommonControllers_js_1 = require("../controllers/CommonControllers.js");
const auth_js_1 = require("../middlewares/auth.js");
const router = (0, express_1.Router)();
// ================= Rutas Públicas =================
router.post('/auth/login', AuthController_js_1.AuthController.login);
router.post('/auth/logout', AuthController_js_1.AuthController.logout);
router.post('/yape-webhook', YapeWebhookController_js_1.YapeWebhookController.store); // Webhook público MacroDroid
// ================= Rutas Autenticadas =================
router.use(auth_js_1.authMiddleware);
// Perfil de usuario autenticado
router.get('/auth/me', AuthController_js_1.AuthController.me);
router.put('/auth/profile', AuthController_js_1.AuthController.updateProfile);
router.put('/auth/password', AuthController_js_1.AuthController.updatePassword);
// OLTs
router.get('/olts', (0, auth_js_1.can)('admin.olts.index'), OltController_js_1.OltController.index);
router.get('/olts/:id', (0, auth_js_1.can)('admin.olts.show'), OltController_js_1.OltController.show);
router.post('/olts', (0, auth_js_1.can)('admin.olts.create'), OltController_js_1.OltController.store);
router.put('/olts/:id', (0, auth_js_1.can)('admin.olts.edit'), OltController_js_1.OltController.update);
router.delete('/olts/:id', (0, auth_js_1.can)('admin.olts.delete'), OltController_js_1.OltController.destroy);
router.put('/olts/ports/:portId', (0, auth_js_1.can)('admin.olts.edit'), OltController_js_1.OltController.updatePort);
// Splitters
router.get('/spliters', (0, auth_js_1.can)('admin.spliters.index'), SpliterController_js_1.SpliterController.index);
router.get('/spliters/:id', (0, auth_js_1.can)('admin.spliters.index'), SpliterController_js_1.SpliterController.show);
router.post('/spliters', (0, auth_js_1.can)('admin.spliters.create'), SpliterController_js_1.SpliterController.store);
router.put('/spliters/:id', (0, auth_js_1.can)('admin.spliters.edit'), SpliterController_js_1.SpliterController.update);
router.delete('/spliters/:id', (0, auth_js_1.can)('admin.spliters.delete'), SpliterController_js_1.SpliterController.destroy);
router.put('/spliters/ports/:portId', (0, auth_js_1.can)('admin.spliters.edit'), SpliterController_js_1.SpliterController.updatePort);
// Cajas NAP (Boxnavs)
router.get('/boxnavs', (0, auth_js_1.can)('admin.boxnavs.index'), BoxnavController_js_1.BoxnavController.index);
router.get('/boxnavs/:id', (0, auth_js_1.can)('admin.boxnavs.index'), BoxnavController_js_1.BoxnavController.show);
router.post('/boxnavs', (0, auth_js_1.can)('admin.boxnavs.create'), BoxnavController_js_1.BoxnavController.store);
router.put('/boxnavs/:id', (0, auth_js_1.can)('admin.boxnavs.edit'), BoxnavController_js_1.BoxnavController.update);
router.delete('/boxnavs/:id', (0, auth_js_1.can)('admin.boxnavs.delete'), BoxnavController_js_1.BoxnavController.destroy);
router.put('/boxnavs/ports/:portId', (0, auth_js_1.can)('admin.portboxnavs.edit'), BoxnavController_js_1.BoxnavController.updatePort);
// Antenas
router.get('/antenas', (0, auth_js_1.can)('admin.antenas.index'), AntenaController_js_1.AntenaController.index);
router.post('/antenas', (0, auth_js_1.can)('admin.antenas.create'), AntenaController_js_1.AntenaController.store);
router.put('/antenas/:id', (0, auth_js_1.can)('admin.antenas.edit'), AntenaController_js_1.AntenaController.update);
router.delete('/antenas/:id', (0, auth_js_1.can)('admin.antenas.delete'), AntenaController_js_1.AntenaController.destroy);
// Clientes
router.get('/clients', (0, auth_js_1.can)('admin.clients.index'), ClientController_js_1.ClientController.index);
router.get('/clients/:id', (0, auth_js_1.can)('admin.clients.index'), ClientController_js_1.ClientController.show);
router.post('/clients', (0, auth_js_1.can)('admin.clients.create'), ClientController_js_1.ClientController.store);
router.put('/clients/:id', (0, auth_js_1.can)('admin.clients.edit'), ClientController_js_1.ClientController.update);
router.delete('/clients/:id', (0, auth_js_1.can)('admin.clients.delete'), ClientController_js_1.ClientController.destroy);
router.get('/clients/consulta/:document', ClientController_js_1.ClientController.consultaSunat);
// Redes y Conexiones (Networks)
router.get('/networks', (0, auth_js_1.can)('admin.networks.index'), NetworkController_js_1.NetworkController.index);
router.get('/networks/:id', (0, auth_js_1.can)('admin.networks.show'), NetworkController_js_1.NetworkController.show);
router.post('/networks', (0, auth_js_1.can)('admin.networks.create'), NetworkController_js_1.NetworkController.store);
router.put('/networks/:id', (0, auth_js_1.can)('admin.networks.edit'), NetworkController_js_1.NetworkController.update);
router.put('/networks/:id/toggle-status', (0, auth_js_1.can)('admin.networks.edit'), NetworkController_js_1.NetworkController.toggleStatus);
router.delete('/networks/:id', (0, auth_js_1.can)('admin.networks.delete'), NetworkController_js_1.NetworkController.destroy);
// Recibos
router.get('/recibos', (0, auth_js_1.can)('admin.recibos.index'), ReciboController_js_1.ReciboController.index);
router.get('/recibos/:id', (0, auth_js_1.can)('admin.recibos.index'), ReciboController_js_1.ReciboController.show);
router.post('/recibos', (0, auth_js_1.can)('admin.recibos.create'), ReciboController_js_1.ReciboController.store);
router.post('/recibos/masivo', (0, auth_js_1.can)('admin.recibos.create'), ReciboController_js_1.ReciboController.generarMasivo);
router.get('/recibos/:id/print', (0, auth_js_1.can)('admin.recibos.print'), ReciboController_js_1.ReciboController.print);
// Pagos
router.get('/payments', (0, auth_js_1.can)('admin.payments.index'), PaymentController_js_1.PaymentController.index);
router.post('/payments', (0, auth_js_1.can)('admin.payments.create'), PaymentController_js_1.PaymentController.store);
router.post('/payments/generate-qr', PaymentController_js_1.PaymentController.generateQr);
router.delete('/payments/:id', (0, auth_js_1.can)('admin.payments.delete'), PaymentController_js_1.PaymentController.destroy);
router.get('/formapays', PaymentController_js_1.PaymentController.formapays);
// Productos, Marcas y Equipos
router.get('/marcas', (0, auth_js_1.can)('admin.marcas.index'), CatalogControllers_js_1.MarcaController.index);
router.post('/marcas', (0, auth_js_1.can)('admin.marcas.create'), CatalogControllers_js_1.MarcaController.store);
router.put('/marcas/:id', (0, auth_js_1.can)('admin.marcas.edit'), CatalogControllers_js_1.MarcaController.update);
router.delete('/marcas/:id', (0, auth_js_1.can)('admin.marcas.delete'), CatalogControllers_js_1.MarcaController.destroy);
router.get('/products', (0, auth_js_1.can)('admin.products.index'), CatalogControllers_js_1.ProductController.index);
router.post('/products', (0, auth_js_1.can)('admin.products.create'), CatalogControllers_js_1.ProductController.store);
router.put('/products/:id', (0, auth_js_1.can)('admin.products.edit'), CatalogControllers_js_1.ProductController.update);
router.delete('/products/:id', (0, auth_js_1.can)('admin.products.delete'), CatalogControllers_js_1.ProductController.destroy);
router.get('/equipos', CatalogControllers_js_1.EquipoController.index);
router.post('/equipos', CatalogControllers_js_1.EquipoController.store);
router.put('/equipos/:id', CatalogControllers_js_1.EquipoController.update);
router.delete('/equipos/:id', CatalogControllers_js_1.EquipoController.destroy);
// Reportes
router.get('/reports/recibos', (0, auth_js_1.can)('admin.reports.index'), ReportController_js_1.ReportController.recibos);
router.get('/reports/payments', (0, auth_js_1.can)('admin.reports.index'), ReportController_js_1.ReportController.payments);
router.get('/reports/networks', (0, auth_js_1.can)('admin.reports.index'), ReportController_js_1.ReportController.networks);
// Usuarios, Roles y Permisos
router.get('/users', (0, auth_js_1.can)('admin.users.index'), UserRoleControllers_js_1.UserController.index);
router.post('/users', (0, auth_js_1.can)('admin.users.create'), UserRoleControllers_js_1.UserController.store);
router.put('/users/:id', (0, auth_js_1.can)('admin.users.edit'), UserRoleControllers_js_1.UserController.update);
router.delete('/users/:id', (0, auth_js_1.can)('admin.users.delete'), UserRoleControllers_js_1.UserController.destroy);
router.get('/roles', (0, auth_js_1.can)('admin.roles.index'), UserRoleControllers_js_1.RoleController.index);
router.post('/roles', (0, auth_js_1.can)('admin.roles.create'), UserRoleControllers_js_1.RoleController.store);
router.put('/roles/:id', (0, auth_js_1.can)('admin.roles.edit'), UserRoleControllers_js_1.RoleController.update);
router.delete('/roles/:id', (0, auth_js_1.can)('admin.roles.delete'), UserRoleControllers_js_1.RoleController.destroy);
router.get('/permissions', (0, auth_js_1.can)('admin.roles.index'), UserRoleControllers_js_1.PermissionController.index);
router.post('/permissions', (0, auth_js_1.can)('admin.roles.create'), UserRoleControllers_js_1.PermissionController.store);
// Yape Notificaciones Monitoreo
router.get('/yape-notifications', (0, auth_js_1.can)('admin.yape.notifications'), YapeWebhookController_js_1.YapeWebhookController.index);
// Ubigeos y Series
router.get('/ubigeos', CommonControllers_js_1.UbigeoController.index);
router.get('/seriepagos', CommonControllers_js_1.SeriepagoController.index);
router.post('/seriepagos', CommonControllers_js_1.SeriepagoController.store);
router.put('/seriepagos/:id', CommonControllers_js_1.SeriepagoController.update);
exports.default = router;
