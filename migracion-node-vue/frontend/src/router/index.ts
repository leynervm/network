import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import { useAuthStore } from '../stores/auth.js';

import WelcomeView from '../views/WelcomeView.vue';
import LoginView from '../views/LoginView.vue';
import DashboardView from '../views/DashboardView.vue';
import OltsView from '../views/OltsView.vue';
import OltDetailView from '../views/OltDetailView.vue';
import AntenasView from '../views/AntenasView.vue';
import ClientsView from '../views/ClientsView.vue';
import NetworksView from '../views/NetworksView.vue';
import NetworkDetailView from '../views/NetworkDetailView.vue';
import RecibosView from '../views/RecibosView.vue';
import PaymentsView from '../views/PaymentsView.vue';
import ProductsView from '../views/ProductsView.vue';
import ReportsView from '../views/ReportsView.vue';
import UsersView from '../views/UsersView.vue';
import RolesView from '../views/RolesView.vue';
import YapeNotificationsView from '../views/YapeNotificationsView.vue';
import ProfileView from '../views/ProfileView.vue';

const routes: RouteRecordRaw[] = [
  { path: '/', component: WelcomeView },
  { path: '/login', component: LoginView, meta: { guestOnly: true } },
  { path: '/dashboard', component: DashboardView, meta: { requiresAuth: true } },
  { path: '/admin/olts', component: OltsView, meta: { requiresAuth: true, permission: 'admin.olts.index' } },
  { path: '/admin/olts/:id', component: OltDetailView, meta: { requiresAuth: true, permission: 'admin.olts.show' } },
  { path: '/admin/olts/:id/show', component: OltDetailView, meta: { requiresAuth: true, permission: 'admin.olts.show' } },
  { path: '/admin/marcas', component: () => import('../views/MarcasView.vue'), meta: { requiresAuth: true, permission: 'admin.marcas.index' } },
  { path: '/admin/antenas', component: AntenasView, meta: { requiresAuth: true, permission: 'admin.antenas.index' } },
  { path: '/admin/clients', component: ClientsView, meta: { requiresAuth: true, permission: 'admin.clients.index' } },
  { path: '/admin/networks', component: NetworksView, meta: { requiresAuth: true, permission: 'admin.networks.index' } },
  { path: '/admin/client-network/:id/show', component: NetworkDetailView, meta: { requiresAuth: true, permission: 'admin.networks.show' } },
  { path: '/admin/recibos', component: RecibosView, meta: { requiresAuth: true, permission: 'admin.recibos.index' } },
  { path: '/admin/payments', component: PaymentsView, meta: { requiresAuth: true, permission: 'admin.payments.index' } },
  { path: '/admin/products', component: ProductsView, meta: { requiresAuth: true, permission: 'admin.products.index' } },
  { path: '/admin/reports', component: ReportsView, meta: { requiresAuth: true, permission: 'admin.reports.index' } },
  { path: '/admin/yape-notifications', component: YapeNotificationsView, meta: { requiresAuth: true, permission: 'admin.yape.notifications' } },
  { path: '/admin/users', component: UsersView, meta: { requiresAuth: true, permission: 'admin.users.index' } },
  { path: '/admin/roles', component: RolesView, meta: { requiresAuth: true, permission: 'admin.roles.index' } },
  { path: '/admin/permissions', component: () => import('../views/PermissionsView.vue'), meta: { requiresAuth: true, permission: 'admin.roles.index' } },
  { path: '/profile', component: ProfileView, meta: { requiresAuth: true } },
  { path: '/:pathMatch(.*)*', redirect: '/dashboard' },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to, from, next) => {
  const auth = useAuthStore();

  if (auth.loading) {
    await auth.checkAuth();
  }

  if (to.meta.requiresAuth && !auth.isAuthenticated) {
    return next('/login');
  }

  if (to.meta.guestOnly && auth.isAuthenticated) {
    return next('/dashboard');
  }

  const requiredPermission = to.meta.permission as string | undefined;
  if (requiredPermission && !auth.hasPermission(requiredPermission)) {
    return next('/dashboard');
  }

  next();
});
