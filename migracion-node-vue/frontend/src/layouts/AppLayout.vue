<script setup lang="ts">
import { ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useNavStore } from '../stores/nav.js';
import { useAuthStore } from '../stores/auth.js';

defineProps<{
  header?: string;
}>();

const nav = useNavStore();
const auth = useAuthStore();
const route = useRoute();
const router = useRouter();

const hoveredLink = ref<string | null>(null);

// Links idénticos a resources/views/navigation-menu.blade.php
const links = [
  { path: '/dashboard', label: 'Inicio', icon: 'home', can: null },
  { path: '/admin/olts', label: 'OLT Networks', icon: 'server', can: 'admin.olts.index' },
  { path: '/admin/antenas', label: 'Antenas', icon: 'signal', can: 'admin.antenas.index' },
  { path: '/admin/recibos', label: 'Recibos', icon: 'document', can: 'admin.recibos.index' },
  { path: '/admin/payments', label: 'Pagos', icon: 'creditcard', can: 'admin.payments.index' },
  { path: '/admin/products', label: 'Productos', icon: 'cube', can: 'admin.products.index' },
  { path: '/admin/yape-notifications', label: 'Yape Webhook', icon: 'bell', can: 'admin.yape.notifications' },
  { path: '/admin/users', label: 'Usuarios', icon: 'users', can: 'admin.users.index' },
  { path: '/admin/roles', label: 'Roles y Permisos', icon: 'shield', can: 'admin.roles.index' },
];

function isLinkActive(path: string) {
  if (path === '/dashboard') return route.path === '/dashboard';
  return route.path.startsWith(path);
}

async function handleLogout() {
  await auth.logout();
  router.push('/login');
}
</script>

<template>
  <div class="flex min-h-screen">
    <!-- ===== DESKTOP SIDEBAR (CLONE navigation-menu.blade.php) ===== -->
    <aside
      class="hidden lg:flex fixed inset-y-0 left-0 z-30 flex-col bg-white dark:bg-neutral-900 border-r border-gray-200 dark:border-neutral-700/40 sidebar-transition overflow-hidden transition-colors duration-200"
      :class="nav.open ? 'w-52' : 'w-14'"
    >
      <!-- Header -->
      <div
        class="flex items-center h-12 px-2 border-b border-gray-200 dark:border-neutral-700/40 shrink-0 transition-colors duration-200"
        :class="nav.open ? 'justify-between' : 'justify-center'"
      >
        <router-link
          v-show="nav.open"
          to="/dashboard"
          class="flex items-center gap-2 overflow-hidden"
        >
          <span class="text-gray-800 dark:text-white text-xs font-semibold leading-tight truncate">
            Clientes Internet
          </span>
        </router-link>

        <button
          type="button"
          @click="nav.toggle()"
          class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-neutral-700 p-2 rounded-lg transition-colors shrink-0"
        >
          <svg
            v-show="nav.open"
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
          </svg>
          <svg
            v-show="!nav.open"
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- Nav Links -->
      <nav class="flex-1 overflow-y-auto overflow-x-hidden py-2 space-y-0.5 px-1.5">
        <template v-for="link in links" :key="link.path">
          <router-link
            v-if="!link.can || auth.hasPermission(link.can)"
            :to="link.path"
            @mouseenter="hoveredLink = link.path"
            @mouseleave="hoveredLink = null"
            :class="[
              nav.open ? 'gap-3' : 'justify-center',
              isLinkActive(link.path)
                ? 'bg-neutral-600 dark:bg-neutral-700 text-white shadow-md'
                : 'text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white',
            ]"
            class="group relative flex items-center px-2 py-2 rounded-lg text-sm transition-all duration-150"
          >
            <!-- Icons exactos a navigation-menu.blade.php -->
            <svg
              v-if="link.icon === 'home'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
            </svg>
            <svg
              v-else-if="link.icon === 'server'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
            </svg>
            <svg
              v-else-if="link.icon === 'signal'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
            </svg>
            <svg
              v-else-if="link.icon === 'document'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <svg
              v-else-if="link.icon === 'creditcard'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            <svg
              v-else-if="link.icon === 'cube'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <svg
              v-else-if="link.icon === 'bell'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            <svg
              v-else-if="link.icon === 'users'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            <svg
              v-else-if="link.icon === 'shield'"
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 shrink-0"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="1.5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>

            <!-- Label -->
            <span
              v-show="nav.open"
              class="truncate text-xs font-medium leading-none whitespace-nowrap"
            >
              {{ link.label }}
            </span>

            <!-- Tooltip when collapsed -->
            <span
              v-show="!nav.open && hoveredLink === link.path"
              class="absolute left-full ml-2 px-2 py-1 bg-gray-800 dark:bg-neutral-800 text-white text-xs rounded-md shadow-lg whitespace-nowrap pointer-events-none z-50"
            >
              {{ link.label }}
            </span>
          </router-link>
        </template>
      </nav>

      <!-- User Section (Theme toggle, Profile, Logout) -->
      <div class="border-t border-gray-200 dark:border-neutral-700/40 p-1.5 shrink-0 space-y-0.5 transition-colors duration-200">
        <!-- Theme Toggle Button -->
        <button
          type="button"
          @click="nav.toggleTheme()"
          @mouseenter="hoveredLink = 'theme'"
          @mouseleave="hoveredLink = null"
          :class="nav.open ? 'gap-3' : 'justify-center'"
          class="group relative w-full flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors"
        >
          <!-- Sun Icon (shown when dark) -->
          <svg
            v-show="nav.theme === 'dark'"
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 shrink-0 text-amber-500 dark:text-amber-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
          </svg>
          <!-- Moon Icon (shown when light) -->
          <svg
            v-show="nav.theme !== 'dark'"
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 shrink-0 text-neutral-700 dark:text-neutral-300"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
          </svg>
          <span v-show="nav.open" class="text-xs font-medium truncate">
            <span v-show="nav.theme === 'dark'">Modo Claro</span>
            <span v-show="nav.theme !== 'dark'">Modo Oscuro</span>
          </span>
          <span
            v-show="!nav.open && hoveredLink === 'theme'"
            class="absolute left-full ml-2 px-2 py-1 bg-gray-800 dark:bg-neutral-800 text-white text-xs rounded-md shadow-lg whitespace-nowrap pointer-events-none z-50"
          >
            {{ nav.theme === 'dark' ? 'Modo Claro' : 'Modo Oscuro' }}
          </span>
        </button>

        <!-- Profile Link -->
        <router-link
          to="/profile"
          :class="[
            nav.open ? 'gap-3' : 'justify-center',
            route.path === '/profile' ? 'bg-gray-100 dark:bg-neutral-700 text-gray-900 dark:text-white' : ''
          ]"
          class="flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span v-show="nav.open" class="text-xs font-medium truncate">{{ auth.user?.name || 'Usuario' }}</span>
        </router-link>

        <!-- Logout Form -->
        <button
          type="button"
          @click="handleLogout"
          :class="nav.open ? 'gap-3' : 'justify-center'"
          class="w-full flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-red-50 dark:hover:bg-red-600/20 hover:text-red-600 dark:hover:text-red-400 transition-colors"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          <span v-show="nav.open" class="text-xs font-medium truncate">Cerrar sesión</span>
        </button>
      </div>
    </aside>

    <!-- ===== MOBILE OVERLAY ===== -->
    <div
      v-show="nav.mobileOpen"
      @click="nav.closeMobile()"
      class="lg:hidden fixed inset-0 z-20 bg-black/60 transition-opacity"
    ></div>

    <!-- ===== MOBILE SIDEBAR DRAWER ===== -->
    <aside
      v-show="nav.mobileOpen"
      class="lg:hidden fixed inset-y-0 left-0 z-30 w-64 flex flex-col bg-white dark:bg-neutral-900 border-r border-gray-200 dark:border-neutral-700/40 transition-colors duration-200"
    >
      <!-- Mobile Header -->
      <div class="flex items-center justify-between h-12 px-3 border-b border-gray-200 dark:border-neutral-700/40 transition-colors duration-200">
        <span class="text-gray-800 dark:text-white text-xs font-semibold leading-tight truncate">
          Clientes Internet
        </span>
        <button
          type="button"
          @click="nav.closeMobile()"
          class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-neutral-700 p-2 rounded-lg transition-colors shrink-0"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Nav Links -->
      <nav class="flex-1 overflow-y-auto py-2 space-y-0.5 px-2">
        <template v-for="link in links" :key="link.path">
          <router-link
            v-if="!link.can || auth.hasPermission(link.can)"
            :to="link.path"
            @click="nav.closeMobile()"
            :class="[
              isLinkActive(link.path)
                ? 'bg-neutral-600 dark:bg-neutral-700 text-white shadow-md'
                : 'text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white',
            ]"
            class="group flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all duration-150"
          >
            <span class="text-xs font-medium">{{ link.label }}</span>
          </router-link>
        </template>
      </nav>

      <!-- Mobile User Section -->
      <div class="border-t border-gray-200 dark:border-neutral-700/40 p-3 space-y-1">
        <button
          type="button"
          @click="nav.toggleTheme()"
          class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60"
        >
          <span class="text-xs font-medium">
            {{ nav.theme === 'dark' ? 'Modo Claro' : 'Modo Oscuro' }}
          </span>
        </button>
        <button
          type="button"
          @click="handleLogout"
          class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-600/20"
        >
          <span class="text-xs font-medium">Cerrar sesión</span>
        </button>
      </div>
    </aside>

    <!-- ===== MAIN WRAPPER ===== -->
    <div
      class="flex flex-col flex-1 min-w-0 content-transition"
      :class="nav.open ? 'lg:pl-52' : 'lg:pl-14'"
    >
      <!-- Mobile top bar -->
      <div
        class="lg:hidden flex items-center h-11 px-3 bg-white dark:bg-neutral-900 border-b border-gray-200 dark:border-neutral-700/50 sticky top-0 z-10 transition-colors duration-200"
      >
        <button
          @click="nav.openMobile()"
          class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white p-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-neutral-700 transition-colors"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <span class="ml-3 text-gray-800 dark:text-white text-sm font-semibold truncate">
          Clientes Internet
        </span>
      </div>

      <!-- Header Slot -->
      <header
        v-if="header"
        class="bg-white dark:bg-neutral-800 border-b border-gray-200 dark:border-neutral-700/50 transition-colors duration-200"
      >
        <div class="px-4 py-3 pb-2.5 font-semibold text-xl leading-tight text-gray-800 dark:text-neutral-200">
          {{ header }}
        </div>
      </header>

      <!-- Slot Principal -->
      <main class="flex-1 p-3">
        <slot />
      </main>
    </div>
  </div>
</template>
