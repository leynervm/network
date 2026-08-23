<!DOCTYPE html>
<html lang="es" :class="{ 'dark': darkMode }" x-data="setupHandler()">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Base de Datos | Laravel DevSetup</title>
    <!-- Fonts: Inter & JetBrains Mono for logs -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <!-- Vite Assets (Tailwind & Alpine) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', 'Figtree', sans-serif;
        }
    </style>
</head>
<body :class="darkMode ? 'bg-zinc-950 text-zinc-300' : 'bg-zinc-50 text-zinc-600'" class="min-h-screen flex flex-col justify-between py-4 px-4 select-none transition-colors duration-300">
    
    <div class="max-w-4xl w-full mx-auto my-auto">
        <!-- Top Navigation (Theme Toggle) -->
        <div class="flex justify-end mb-4">
            <button @click="toggleTheme()" :class="darkMode ? 'bg-zinc-900 border-zinc-800 text-zinc-400 hover:text-zinc-200' : 'bg-white border-zinc-200 text-zinc-600 hover:text-zinc-950 shadow-sm'" class="p-2.5 rounded-xl border transition-all duration-200 flex items-center justify-center">
                <!-- Sun icon for light mode (visible in dark mode) -->
                <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M14 12a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <!-- Moon icon for dark mode (visible in light mode) -->
                <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            </button>
        </div>

        <!-- Header -->
        <div class="text-center mb-8">
            <div :class="darkMode ? 'bg-zinc-900 border-zinc-800 text-zinc-400' : 'bg-white border-zinc-200 text-zinc-600 shadow-sm'" class="inline-flex items-center gap-2 px-3 py-1 rounded-full border text-xs font-semibold mb-3 tracking-wide uppercase">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                Entorno Local
            </div>
            <h1 :class="darkMode ? 'text-zinc-100' : 'text-zinc-900'" class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                Configuración de Base de Datos
            </h1>
            <p :class="darkMode ? 'text-zinc-500' : 'text-zinc-400'" class="mt-2 text-sm max-w-xl mx-auto">
                Asistente interactivo para inicializar el esquema y los datos iniciales de tu proyecto de forma segura.
            </p>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Connection Details Card -->
            <div :class="darkMode ? 'bg-zinc-900 border-zinc-800' : 'bg-white border-zinc-200 shadow-sm'" class="md:col-span-1 rounded-2xl p-6 flex flex-col justify-between border transition-all duration-300">
                <div>
                    <h3 :class="darkMode ? 'text-zinc-100' : 'text-zinc-900'" class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"></path></svg>
                        Conexión
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" class="text-xs block uppercase font-semibold">Motor</span>
                            <span :class="darkMode ? 'text-zinc-300' : 'text-zinc-800'" class="text-sm font-semibold">{{ strtoupper($dbDetails['connection']) }}</span>
                        </div>
                        <div>
                            <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" class="text-xs block uppercase font-semibold">Host / Puerto</span>
                            <span :class="darkMode ? 'text-zinc-300' : 'text-zinc-800'" class="text-sm font-semibold">{{ $dbDetails['host'] }}:{{ $dbDetails['port'] }}</span>
                        </div>
                        <div>
                            <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" class="text-xs block uppercase font-semibold">Base de Datos</span>
                            <span class="text-sm font-semibold text-emerald-500">{{ $dbDetails['database'] }}</span>
                        </div>
                        <div>
                            <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" class="text-xs block uppercase font-semibold">Usuario</span>
                            <span :class="darkMode ? 'text-zinc-300' : 'text-zinc-800'" class="text-sm font-semibold">{{ $dbDetails['username'] }}</span>
                        </div>
                    </div>
                </div>

                <div :class="darkMode ? 'border-zinc-800' : 'border-zinc-100'" class="mt-8 pt-4 border-t">
                    <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" class="text-xs block uppercase font-semibold mb-2">Estado Actual</span>
                    
                    <!-- Dynamic Badges -->
                    <div x-show="dbStatus === 'db_missing'" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-500 text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                        BD No Existe
                    </div>
                    <div x-show="dbStatus === 'pending_migrations'" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/20 text-amber-500 text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        Tablas Faltantes
                    </div>
                    <div x-show="dbStatus === 'connection_error'" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-500 text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                        Error de Conexión
                    </div>
                    <div x-show="dbStatus === 'ok'" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Conexión OK
                    </div>
                </div>
            </div>

            <!-- Terminal / Actions Card -->
            <div class="md:col-span-2 flex flex-col gap-6">
                <!-- Terminal Panel -->
                <div :class="darkMode ? 'bg-zinc-900 border-zinc-800' : 'bg-white border-zinc-200 shadow-sm'" class="border rounded-2xl flex-1 flex flex-col overflow-hidden transition-all duration-300">
                    <!-- Terminal Header -->
                    <div :class="darkMode ? 'bg-zinc-950/60 border-zinc-800' : 'bg-zinc-50 border-zinc-200'" class="px-4 py-3 flex items-center justify-between border-b transition-colors duration-350">
                        <div class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                            <span :class="darkMode ? 'text-zinc-550' : 'text-zinc-400'" class="text-xs ml-2 font-mono">console.sh</span>
                        </div>
                        <button @click="clearLogs()" :class="darkMode ? 'text-zinc-500 hover:text-zinc-350' : 'text-zinc-400 hover:text-zinc-650'" class="text-xs font-mono transition">clear</button>
                    </div>
                    <div :class="darkMode ? 'bg-zinc-950' : 'bg-zinc-50'" class="p-4 flex-1 min-h-[220px] max-h-[300px] overflow-y-auto font-mono text-xs leading-relaxed scroll-smooth transition-colors duration-300" id="log-container">
                        <template x-for="log in logs" :key="log.id">
                            <div class="mb-1.5">
                                <span :class="darkMode ? 'text-zinc-600' : 'text-zinc-400'" x-text="log.time"></span>
                                <span class="font-bold mr-1" :class="log.color" x-text="log.prefix"></span>
                                <span class="whitespace-pre-wrap" :class="darkMode ? 'text-zinc-300' : 'text-zinc-700'" x-text="log.message"></span>
                            </div>
                        </template>
                        <div x-show="loading" class="inline-flex items-center gap-2 text-zinc-500 mt-2 font-mono">
                            <svg class="animate-spin h-3 w-3 text-zinc-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Ejecutando proceso en background...</span>
                        </div>
                    </div>
                </div>

                <!-- Action Controls -->
                <div :class="darkMode ? 'bg-zinc-900 border-zinc-800' : 'bg-white border-zinc-200 shadow-sm'" class="border rounded-2xl p-6 flex flex-col sm:flex-row gap-4 justify-between items-center transition-all duration-300">
                    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                        
                        <!-- CREATE DATABASE COMPONENT -->
                        <!-- If DB missing: active button -->
                        <template x-if="dbStatus === 'db_missing'">
                            <button 
                                @click="executeAction('create_db')" 
                                :disabled="loading"
                                :class="darkMode ? 'bg-zinc-100 hover:bg-zinc-200 text-zinc-900' : 'bg-zinc-900 hover:bg-zinc-800 text-white'"
                                class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center justify-center gap-2 shadow-sm active:scale-[0.98]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span>1. Crear Base de Datos</span>
                            </button>
                        </template>
                        <!-- If DB NOT missing: span mockup -->
                        <template x-if="dbStatus !== 'db_missing'">
                            <span :class="darkMode ? 'bg-zinc-850/50 text-zinc-650 border-zinc-800/80' : 'bg-zinc-100/80 text-zinc-400 border-zinc-200'" class="px-5 py-2.5 rounded-xl font-semibold text-sm border cursor-not-allowed select-none flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>1. Crear Base de Datos</span>
                            </span>
                        </template>

                        <!-- MIGRATIONS AND SEEDERS COMPONENT -->
                        <!-- If DB missing: span mockup -->
                        <template x-if="dbStatus === 'db_missing'">
                            <span :class="darkMode ? 'bg-zinc-850/50 text-zinc-650 border-zinc-800/80' : 'bg-zinc-100/80 text-zinc-400 border-zinc-200'" class="px-5 py-2.5 rounded-xl font-semibold text-sm border cursor-not-allowed select-none flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                <span>2. Migraciones y Seeders</span>
                            </span>
                        </template>
                        <!-- If DB NOT missing and NOT finished: active button -->
                        <template x-if="dbStatus !== 'db_missing' && !isFinished">
                            <button 
                                @click="executeAction('migrate')" 
                                :disabled="loading"
                                :class="darkMode ? 'bg-zinc-100 hover:bg-zinc-200 text-zinc-900' : 'bg-zinc-900 hover:bg-zinc-800 text-white'"
                                class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center justify-center gap-2 shadow-sm active:scale-[0.98]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H17"></path></svg>
                                <span>2. Migraciones y Seeders</span>
                            </button>
                        </template>
                        <!-- If finished: span mockup -->
                        <template x-if="isFinished">
                            <span :class="darkMode ? 'bg-zinc-850/50 text-zinc-650 border-zinc-800/80' : 'bg-zinc-100/80 text-zinc-400 border-zinc-200'" class="px-5 py-2.5 rounded-xl font-semibold text-sm border cursor-not-allowed select-none flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>2. Migraciones y Seeders</span>
                            </span>
                        </template>

                    </div>

                    <!-- Finish/Redirect -->
                    <a 
                        href="/" 
                        x-show="isFinished"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        :class="darkMode ? 'bg-emerald-550 hover:bg-emerald-500 text-white' : 'bg-emerald-600 hover:bg-emerald-550 text-white'"
                        class="w-full sm:w-auto text-center px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 shadow-sm active:scale-[0.98]">
                        Ir al Dashboard
                    </a>
                </div>
            </div>

        </div>

        @if($dbError)
            <!-- Expandable Error Details -->
            <div :class="darkMode ? 'bg-rose-950/15 border-rose-900/30' : 'bg-rose-50 border-rose-250'" class="mt-6 border rounded-2xl p-6 transition-all duration-300">
                <h4 class="font-bold text-rose-500 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Detalle del Error de Conexión
                </h4>
                <div :class="darkMode ? 'bg-zinc-950/80 text-rose-350' : 'bg-white text-rose-700 border border-rose-200/60'" class="p-3 rounded-xl font-mono text-xs overflow-x-auto whitespace-pre-wrap max-h-36">
                    {{ $dbError }}
                </div>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div :class="darkMode ? 'text-zinc-650' : 'text-zinc-400'" class="text-center text-xs font-mono mt-8 transition-colors duration-300">
        Laravel DevSetup Assistant
    </div>

    <script>
        function setupHandler() {
            return {
                darkMode: localStorage.getItem('theme') !== 'light',
                dbStatus: '{{ $dbStatus }}',
                loading: false,
                isFinished: false,
                logCounter: 0,
                logs: [],

                init() {
                    this.addLog('system', 'Iniciando módulo de diagnóstico de base de datos...');
                    if (this.dbStatus === 'db_missing') {
                        this.addLog('warning', 'La base de datos especificada en .env no existe en el servidor.');
                        this.addLog('info', 'Haz clic en "1. Crear Base de Datos" para continuar.');
                    } else if (this.dbStatus === 'pending_migrations') {
                        this.addLog('warning', 'La base de datos existe, pero faltan las tablas requeridas.');
                        this.addLog('info', 'Haz clic en "2. Migraciones y Seeders" para inicializar el esquema.');
                    } else {
                        this.addLog('error', 'Error genérico de conexión. Verifica las credenciales en .env.');
                    }
                },

                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
                    this.addLog('system', 'Tema cambiado a ' + (this.darkMode ? 'Oscuro' : 'Claro'));
                },

                addLog(type, message) {
                    const time = new Date().toLocaleTimeString();
                    let prefix = '[INFO] ';
                    let color = this.darkMode ? 'text-zinc-450' : 'text-zinc-600';

                    if (type === 'system') {
                        prefix = '[SYS] ';
                        color = this.darkMode ? 'text-indigo-400' : 'text-indigo-600';
                    } else if (type === 'warning') {
                        prefix = '[WARN] ';
                        color = this.darkMode ? 'text-amber-400' : 'text-amber-600';
                    } else if (type === 'error') {
                        prefix = '[ERR] ';
                        color = this.darkMode ? 'text-rose-500' : 'text-rose-600';
                    } else if (type === 'success') {
                        prefix = '[OK] ';
                        color = this.darkMode ? 'text-emerald-500' : 'text-emerald-600';
                    }

                    this.logs.push({ id: this.logCounter++, time, prefix, message, color });
                    
                    // Auto-scroll to bottom of logs
                    this.$nextTick(() => {
                        const container = document.getElementById('log-container');
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    });
                },

                clearLogs() {
                    this.logs = [];
                },

                async executeAction(action) {
                    this.loading = true;
                    
                    if (action === 'create_db') {
                        this.addLog('system', 'Ejecutando creación de base de datos...');
                        try {
                            const res = await this.postRequest('/database-setup/run', { action: 'create_db' });
                            if (res.success) {
                                this.addLog('success', res.message);
                                this.addLog('system', 'Salida: ' + res.output);
                                
                                // UPDATE DYNAMICALLY THE STATE
                                this.dbStatus = 'pending_migrations';
                                this.addLog('info', 'Estado actualizado a: Tablas Faltantes.');
                            } else {
                                this.addLog('error', res.message || 'Error desconocido.');
                            }
                        } catch (err) {
                            this.addLog('error', err.message);
                        }
                    } else if (action === 'migrate') {
                        this.addLog('system', 'Iniciando migraciones (php artisan migrate --force)...');
                        try {
                            const res = await this.postRequest('/database-setup/run', { action: 'migrate' });
                            if (res.success) {
                                this.addLog('success', res.message);
                                this.addLog('system', res.output);
                                
                                // Automatically chain seeders
                                this.addLog('system', 'Iniciando seeders de datos (php artisan db:seed --force)...');
                                const seedRes = await this.postRequest('/database-setup/run', { action: 'seed' });
                                if (seedRes.success) {
                                    this.addLog('success', seedRes.message);
                                    this.addLog('system', seedRes.output);
                                    this.addLog('success', 'Base de datos completamente inicializada y lista.');
                                    this.dbStatus = 'ok';
                                    this.isFinished = true;
                                } else {
                                    this.addLog('error', seedRes.message || 'Error al ejecutar seeders.');
                                    this.addLog('system', seedRes.output);
                                }
                            } else {
                                this.addLog('error', res.message || 'Error al ejecutar migraciones.');
                                this.addLog('system', res.output);
                            }
                        } catch (err) {
                            this.addLog('error', err.message);
                        }
                    }
                    
                    this.loading = false;
                },

                async postRequest(url, data) {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const result = await response.json();
                    if (!response.ok) {
                        throw new Error(result.message || 'Error en la petición');
                    }
                    return result;
                }
            }
        }
    </script>
</body>
</html>
