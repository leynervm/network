<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Gestión ISP') }} - Bienvenido</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Theme Initialization Script (prevents FOUC) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        [x-cloak] { display: none !important; }
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-10px) scale(1.03); }
        }
        .animate-float {
            animation: float 8s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float 10s ease-in-out 3s infinite;
        }
    </style>
</head>

<body x-data="{
        darkMode: document.documentElement.classList.contains('dark'),
        toggleTheme() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }" 
    class="bg-neutral-100 text-neutral-800 dark:bg-neutral-950 dark:text-neutral-100 min-h-screen relative overflow-x-hidden selection:bg-neutral-700 selection:text-white antialiased transition-colors duration-300">

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
        <header class="w-full max-w-6xl mx-auto px-4 sm:px-6 py-3.5 sm:py-4 flex items-center justify-between gap-4">
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
                        <span class="truncate">{{ config('app.name', 'ISP NETWORK') }}</span>
                        <span class="shrink-0 text-[9px] uppercase tracking-widest px-1.5 py-0.5 rounded-md bg-neutral-200/80 dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 font-semibold">Pro</span>
                    </span>
                    <span class="text-[10px] sm:text-[11px] text-neutral-500 dark:text-neutral-400 truncate transition-colors duration-300">Gestión Integral de Telecomunicaciones</span>
                </div>
            </div>

            <!-- Navigation Actions -->
            <nav class="flex items-center gap-2 sm:gap-3 shrink-0">
                
                <!-- Theme Toggle Button -->
                <button @click="toggleTheme()" type="button" aria-label="Alternar tema claro u oscuro"
                    class="p-2 rounded-lg bg-neutral-200/80 dark:bg-neutral-800/80 text-neutral-700 dark:text-neutral-300 hover:bg-neutral-300/80 dark:hover:bg-neutral-700/80 border border-neutral-300 dark:border-neutral-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-neutral-400 shadow-sm">
                    <!-- Sun Icon (Active in Dark Mode) -->
                    <svg x-show="darkMode" x-cloak class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (Active in Light Mode) -->
                    <svg x-show="!darkMode" x-cloak class="w-4 h-4 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="group relative inline-flex items-center gap-1.5 px-3.5 py-1.5 sm:py-2 rounded-lg bg-neutral-800 dark:bg-neutral-100 text-xs sm:text-sm font-medium text-white dark:text-neutral-900 shadow-sm hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200">
                            <span>Ir al Dashboard</span>
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="group relative inline-flex items-center gap-1.5 px-3.5 sm:px-4 py-1.5 sm:py-2 rounded-lg bg-neutral-800 dark:bg-neutral-100 text-xs sm:text-sm font-medium text-white dark:text-neutral-900 shadow-sm hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200">
                            <span>{{ __('Iniciar Sesión') }}</span>
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </a>
                        {{-- Nota: Ruta 'register' eliminada intencionalmente por requerimiento --}}
                    @endauth
                @endif
            </nav>
        </header>

        <!-- Hero Section (Compact & Balanced) -->
        <main class="flex-1 flex flex-col items-center justify-center max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-10 text-center w-full">
            
            <!-- Animated Badge -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/90 dark:bg-neutral-900/90 border border-neutral-300 dark:border-neutral-800 backdrop-blur-md mb-5 sm:mb-6 shadow-2xs transition-colors duration-300">
                <span class="flex h-1.5 w-1.5 rounded-full bg-neutral-700 dark:bg-neutral-300 animate-ping"></span>
                <span class="text-[11px] sm:text-xs font-medium text-neutral-700 dark:text-neutral-300 tracking-wide">Plataforma FTTH & WISP de Alta Precisión</span>
            </div>

            <!-- Main Heading (Moderate Size) -->
            <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-5xl font-extrabold tracking-tight text-neutral-900 dark:text-white max-w-3xl leading-[1.2] sm:leading-tight transition-colors duration-300">
                Control Total para tu <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-neutral-900 via-neutral-600 to-neutral-400 dark:from-white dark:via-neutral-300 dark:to-neutral-500 bg-clip-text text-transparent">
                    Infraestructura de Red
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-neutral-600 dark:text-neutral-400 max-w-xl font-normal leading-relaxed px-2 transition-colors duration-300">
                Administra OLTs, Splitters, clientes, facturación y tickets de soporte desde una interfaz centralizada, veloz y construida con tecnología de vanguardia.
            </p>

            <!-- CTA Buttons -->
            <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row items-center justify-center gap-3 w-full sm:w-auto px-4 sm:px-0">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-neutral-800 dark:bg-neutral-100 text-white dark:text-neutral-900 font-semibold text-xs sm:text-sm shadow-md hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                        <span>Acceder al Panel Principal</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-neutral-800 dark:bg-neutral-100 text-white dark:text-neutral-900 font-semibold text-xs sm:text-sm shadow-md hover:bg-neutral-900 dark:hover:bg-white hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                        <span>Ingresar al Sistema</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </a>
                @endauth
            </div>

            <!-- Features Grid (Compact & Neutral) -->
            <div class="mt-10 sm:mt-14 grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-4 w-full text-left">
                
                <!-- Card 1 -->
                <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </div>
                    <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">Gestión OLT & FTTH</h3>
                    <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Control exhaustivo de puertos, splitters, potencias ópticas y aprovisionamiento en tiempo real para fibra óptica.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                        </svg>
                    </div>
                    <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">Facturación & Recibos</h3>
                    <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Administración automatizada de cobros, emisión de recibos, registro de pagos y control de estados de cuenta.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="group relative rounded-xl p-4 sm:p-5 bg-white/80 dark:bg-neutral-900/60 border border-neutral-200 dark:border-neutral-800/80 backdrop-blur-md hover:bg-white dark:hover:bg-neutral-900 hover:border-neutral-400 dark:hover:border-neutral-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-neutral-100 dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 flex items-center justify-center text-neutral-800 dark:text-neutral-200 mb-3 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-neutral-700 dark:group-hover:text-neutral-300 transition-colors">Tickets & Soporte</h3>
                    <p class="text-xs text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Seguimiento ágil de incidencias técnicas, asignación de técnicos en campo y atención con historial detallado.
                    </p>
                </div>

            </div>
        </main>

        <!-- Footer (Compact & Neutral) -->
        <footer class="w-full border-t border-neutral-200 dark:border-neutral-800 bg-white/60 dark:bg-neutral-950/60 backdrop-blur-md py-4 transition-colors duration-300 mt-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between text-[11px] text-neutral-500 gap-2 sm:gap-3 text-center sm:text-left">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'ISP NETWORK') }}. Todos los derechos reservados.</p>
                <div class="flex flex-wrap justify-center sm:justify-end items-center gap-3 sm:gap-5">
                    <span class="inline-flex items-center gap-1 text-neutral-600 dark:text-neutral-400 font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Sistema Operativo
                    </span>
                    <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
                    <span>PHP v{{ PHP_VERSION }}</span>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
