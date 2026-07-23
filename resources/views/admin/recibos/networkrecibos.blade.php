<x-app-layout>
    <!-- Header / Tarjeta Principal de Información -->
    <div
        class="w-full bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 shadow-sm rounded-xl mb-3 overflow-hidden transition-colors duration-300">
        <div
            class="p-2 sm:p-3 flex flex-col md:flex-row md:items-center justify-between gap-2 border-b border-neutral-100 dark:border-neutral-800">
            <div>
                <div class="flex flex-wrap items-center gap-3 mb-1.5">
                    <h1
                        class="text-xl sm:text-2xl font-black text-neutral-800 dark:text-neutral-100 uppercase tracking-tight flex items-center">
                        <span class="text-neutral-400 dark:text-neutral-500 font-semibold text-sm mr-2">CÓDIGO:</span>
                        {{ $network->code }}
                    </h1>
                    @if ($network->isSuspendido())
                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400 border border-red-200 dark:border-red-500/20 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5 animate-pulse"></span> Suspendido
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Activo
                        </span>
                    @endif
                </div>
                <div class="text-sm text-neutral-600 dark:text-neutral-400 font-medium flex items-center gap-2">
                    <svg class="w-4 h-4 text-neutral-400 dark:text-neutral-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ $network->client->name }}</span>
                    <span
                        class="opacity-75 text-xs bg-neutral-100 dark:bg-neutral-800 px-2 py-0.5 rounded-md border border-neutral-200 dark:border-neutral-700">{{ $network->client->document }}</span>
                </div>
            </div>

            <!-- Bloque de Precio -->
            <div
                class="flex flex-col md:items-end bg-neutral-50 dark:bg-neutral-800/50 p-2 rounded-lg border border-neutral-100 dark:border-neutral-800">
                <span
                    class="text-[10px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider mb-0.5">Costo
                    de Servicio</span>
                <div class="flex items-baseline gap-1 text-emerald-600 dark:text-emerald-400">
                    <span class="text-sm font-semibold">S/.</span>
                    <span class="text-xl font-black tracking-tight">{{ $network->price }}</span>
                </div>
            </div>
        </div>

        <div class="p-2 sm:p-3 bg-neutral-50/50 dark:bg-neutral-900/30">
            <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3">
                <!-- Fecha Alta -->
                <div class="flex flex-col gap-1">
                    <dt
                        class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Fecha de Alta
                    </dt>
                    <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                        {{ formatDate($network->date) }}</dd>
                </div>

                <!-- Puerto -->
                <div class="flex flex-col gap-1">
                    <dt
                        class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Número de Puerto
                    </dt>
                    <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">{{ $network->portnumber }}
                    </dd>
                </div>

                <!-- Servicio -->
                <div class="flex flex-col gap-1">
                    <dt
                        class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        Servicio
                    </dt>
                    <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">{{ $network->type }}</dd>
                </div>

                <!-- Ciclo de pago -->
                <div class="flex flex-col gap-1">
                    <dt
                        class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Ciclos de Pago
                    </dt>
                    <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">Último día cada mes</dd>
                </div>

                <!-- Dirección -->
                <div
                    class="flex flex-col gap-1 sm:col-span-2 lg:col-span-4 border-t border-neutral-200/60 dark:border-neutral-800 pt-2 mt-1">
                    <dt
                        class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Dirección de Instalación
                    </dt>
                    <dd
                        class="text-sm font-medium text-neutral-800 dark:text-neutral-200 flex flex-wrap items-center gap-2">
                        {{ $network->direccion }}
                        <span
                            class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-neutral-200 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 border border-neutral-300 dark:border-neutral-700 shadow-sm">{{ $network->typelocal }}</span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Modulos Adicionales (Equipos & Recibos) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">

        <!-- Equipos Section (Sidebar) -->
        <div class="lg:col-span-1 space-y-2">
            <div
                class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-xl shadow-sm p-2 transition-colors duration-300">
                <div class="flex items-center gap-2 mb-2">
                    <div
                        class="p-1.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-lg border border-indigo-100 dark:border-indigo-500/20 shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-bold text-neutral-800 dark:text-neutral-100 uppercase tracking-wide">Equipos
                        Agregados</h2>
                </div>

                <div class="space-y-3">
                    <livewire:admin.equipos.create-equipo :network="$network" />
                    <div class="w-full">
                        <livewire:admin.equipos.show-equipos-network :network="$network" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Recibos Section (Main Content) -->
        <div class="lg:col-span-2 space-y-2">
            <div
                class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-xl shadow-sm overflow-hidden transition-colors duration-300 p-2">
                <div class="flex items-center gap-2 mb-2">
                    <div
                        class="p-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg border border-emerald-100 dark:border-emerald-500/20 shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-bold text-neutral-800 dark:text-neutral-100 uppercase tracking-wide">
                        Recibos de Pago</h2>
                </div>

                <livewire:admin.clientnetworks.show-client-recibos :network="$network" />
            </div>
        </div>

    </div>
</x-app-layout>
