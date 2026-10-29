<script setup lang="ts">
import { useNavStore } from '../stores/nav.js';
import { useAuthStore } from '../stores/auth.js';

const nav = useNavStore();
const auth = useAuthStore();
</script>

<template>
  <div class="bg-neutral-100 text-neutral-800 dark:bg-neutral-950 dark:text-neutral-100 min-h-screen relative overflow-x-hidden selection:bg-neutral-700 selection:text-white antialiased transition-colors duration-300">
    <!-- Glowing Background Orbs (Neutral / Monochrome) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
      <div class="absolute -top-32 -left-32 w-72 sm:w-80 h-72 sm:h-80 bg-neutral-400/25 dark:bg-neutral-600/15 rounded-full blur-[110px] animate-float transition-colors duration-500"></div>
      <div class="absolute top-1/3 -right-32 w-80 sm:w-96 h-80 sm:h-96 bg-neutral-300/30 dark:bg-neutral-700/15 rounded-full blur-[120px] animate-float-delayed transition-colors duration-500"></div>
      <div class="absolute -bottom-32 left-1/3 w-72 sm:w-80 h-72 sm:h-80 bg-neutral-400/20 dark:bg-neutral-600/15 rounded-full blur-[110px] animate-float transition-colors duration-500"></div>
      <!-- Grid pattern overlay -->
      <div class="absolute inset-0 bg-[linear-gradient(to_right,#17171708_1px,transparent_1px),linear-gradient(to_bottom,#17171708_1px,transparent_1px)] dark:bg-[linear-gradient(to_right,#ffffff0a_1px,transparent_1px),linear-gradient(to_bottom,#ffffff0a_1px,transparent_1px)] bg-[size:2.5rem_2.5rem] sm:bg-[size:3rem_3rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>
    </div>

    <div class="relative z-10 flex flex-col min-h-screen justify-between">
      <!-- Header / Navbar (Compact & Neutral) -->
      <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-3.5 sm:py-4 flex items-center justify-between gap-4">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-2.5 min-w-0">
          <div class="w-8 h-8 sm:w-9 sm:h-9 shrink-0 rounded-xl bg-gradient-to-tr from-neutral-800 via-neutral-600 to-neutral-400 dark:from-neutral-200 dark:via-neutral-400 dark:to-neutral-600 p-[1.5px] shadow-sm">
            <div class="w-full h-full bg-white dark:bg-neutral-950 rounded-[10px] flex items-center justify-center transition-colors duration-300">
              <svg class="w-4 h-4 text-neutral-800 dark:text-neutral-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
          </div>
          <div class="flex flex-col min-w-0">
            <span class="font-bold text-sm sm:text-base tracking-tight text-neutral-900 dark:text-white flex items-center gap-1.5 truncate transition-colors duration-300">
              <span class="truncate">ISP NETWORK</span>
              <span class="shrink-0 text-[9px] uppercase tracking-widest px-1.5 py-0.5 rounded-md bg-neutral-200/80 dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 font-semibold">Pro</span>
            </span>
            <span class="text-[10px] sm:text-[11px] text-neutral-500 dark:text-neutral-400 truncate transition-colors duration-300">
              Gestión Integral de Telecomunicaciones
            </span>
          </div>
        </div>

        <!-- Navigation Actions -->
        <nav class="flex items-center gap-2 sm:gap-3 shrink-0">
          <!-- Theme Toggle Button -->
          <button
            @click="nav.toggleTheme()"
            type="button"
            aria-label="Alternar tema claro u oscuro"
            class="p-2 rounded-lg bg-neutral-200/80 dark:bg-neutral-800/80 text-neutral-700 dark:text-neutral-300 hover:bg-neutral-300/80 dark:hover:bg-neutral-700/80 border border-neutral-300 dark:border-neutral-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-neutral-400 shadow-sm"
          >
            <!-- Sun Icon (Active in Dark Mode) -->
            <svg v-if="nav.theme === 'dark'" class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <!-- Moon Icon (Active in Light Mode) -->
            <svg v-else class="w-4 h-4 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </button>
        </nav>
      </header>

      <!-- Hero Section -->
      <main class="flex-1 flex flex-col items-center justify-center max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-10 text-center w-full">
        <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-5xl font-extrabold tracking-tight text-neutral-900 dark:text-white max-w-3xl leading-[1.2] sm:leading-tight transition-colors duration-300">
          Control Total para tu <br class="hidden sm:inline">
          <span class="bg-gradient-to-r from-neutral-900 via-neutral-600 to-neutral-400 dark:from-white dark:via-neutral-300 dark:to-neutral-500 bg-clip-text text-transparent">
            Infraestructura de Red
          </span>
        </h1>

        <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-neutral-600 dark:text-neutral-400 max-w-xl font-normal leading-relaxed px-2 transition-colors duration-300">
          Administra OLTs, Splitters, clientes, facturación y tickets de soporte desde una interfaz centralizada, veloz y construida con tecnología de vanguardia.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row items-center justify-center gap-3 w-full sm:w-auto px-4 sm:px-0">
          <router-link
            v-if="auth.isAuthenticated"
            to="/dashboard"
            class="w-full sm:w-auto px-6 py-3 rounded-xl bg-neutral-800 dark:bg-neutral-100 text-white dark:text-neutral-900 font-semibold text-xs sm:text-sm shadow-md hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2"
          >
            <span>Acceder al Panel Principal</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </router-link>
          <router-link
            v-else
            to="/login"
            class="w-full sm:w-auto px-6 py-3 rounded-xl bg-neutral-800 dark:bg-neutral-100 text-white dark:text-neutral-900 font-semibold text-xs sm:text-sm shadow-md hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2"
          >
            <span>Ingresar al Sistema</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
          </router-link>
        </div>

        <!-- Features Grid -->
        <div class="mt-10 sm:mt-14 grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-4 w-full text-left">
          <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
              <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
              </svg>
            </div>
            <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">
              Gestión OLT & FTTH
            </h3>
            <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
              Control exhaustivo de puertos, splitters, potencias ópticas y aprovisionamiento en tiempo real para fibra óptica.
            </p>
          </div>

          <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
              <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">
              Facturación & Cobranzas
            </h3>
            <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
              Generación masiva de recibos, pasarela Yape con confirmación automática y cortes programados de servicio.
            </p>
          </div>

          <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
              <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">
              Monitoreo y Mapeo
            </h3>
            <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
              Georreferenciación de clientes en mapas satelitales, estado de cajas NAP y seguimiento de inventario.
            </p>
          </div>
        </div>
      </main>

      <footer class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-4 text-center text-[10px] text-neutral-500 dark:text-neutral-500">
        &copy; 2026 ISP Network. Todos los derechos reservados.
      </footer>
    </div>
  </div>
</template>
