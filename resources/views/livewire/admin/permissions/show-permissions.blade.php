<div>
    {{-- Barra superior con filtros y botón para nuevo permiso --}}
    <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-4">
        <div class="flex flex-wrap items-center gap-2 flex-1 max-w-2xl">
            {{-- Buscar --}}
            <div class="w-full sm:w-64">
                <x-input class="w-full block text-xs" wire:model="search" placeholder="Buscar permiso o descripción..." />
            </div>

            {{-- Filtrar por tabla --}}
            <div class="w-full sm:w-48">
                <x-select-input class="w-full text-xs" wire:model="selectedTable">
                    <option value="">TODAS LAS TABLAS ({{ count($tables) }})</option>
                    @foreach ($tables as $t)
                        <option value="{{ $t }}">TABLA: {{ strtoupper($t) }}</option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

        <div class="flex items-center gap-2">
            @can('admin.roles.create')
                <x-button wire:click="$set('open_create', true)" class="gap-1 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    NUEVO PERMISO
                </x-button>
            @endcan
        </div>
    </div>

    {{-- Resumen de estadísticas --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-4">
        <div class="p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-neutral-400">Total Permisos</p>
                <p class="text-base font-bold text-gray-800 dark:text-white">{{ $totalPermissions }}</p>
            </div>
        </div>

        <div class="p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z" />
                </svg>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-neutral-400">Módulos / Tablas</p>
                <p class="text-base font-bold text-gray-800 dark:text-white">{{ count($tables) }}</p>
            </div>
        </div>
    </div>

    {{-- Grid de permisos agrupados por tabla --}}
    <div class="space-y-4">
        @forelse ($permissionsGrouped as $table => $permissions)
            <div class="bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden">
                {{-- Cabecera de la tabla/módulo --}}
                <div class="px-4 py-3 bg-gray-50/80 dark:bg-neutral-800/80 border-b border-gray-200 dark:border-neutral-700/80 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                        <h3 class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                            TABLA: {{ $table }}
                        </h3>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300">
                        {{ count($permissions) }} permisos
                    </span>
                </div>

                {{-- Contenido de permisos en cuadrícula --}}
                <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @foreach ($permissions as $item)
                        <div class="p-3 rounded-lg border border-gray-100 dark:border-neutral-700/60 bg-gray-50/50 dark:bg-neutral-900/40 hover:border-indigo-300 dark:hover:border-indigo-600 transition flex flex-col justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-1 mb-1">
                                    <p class="text-xs font-bold text-gray-800 dark:text-gray-100 leading-snug">
                                        {{ $item->description ?: $item->name }}
                                    </p>
                                </div>
                                <code class="text-[10px] font-mono text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/40 px-1.5 py-0.5 rounded border border-indigo-100 dark:border-indigo-900/40 block w-fit truncate max-w-full">
                                    {{ $item->name }}
                                </code>
                            </div>

                            {{-- Roles que tienen este permiso --}}
                            <div class="mt-2.5 pt-2 border-t border-gray-100 dark:border-neutral-800 flex flex-wrap items-center gap-1">
                                <span class="text-[9px] text-gray-400 dark:text-neutral-400">Roles:</span>
                                @forelse ($item->roles as $role)
                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-semibold uppercase
                                        {{ $role->name === 'admin' ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300' : 'bg-gray-200 dark:bg-neutral-700 text-gray-700 dark:text-neutral-300' }}">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-[9px] text-gray-400 italic">Ninguno</span>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="p-8 text-center bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700 text-gray-500">
                No se encontraron permisos con los filtros aplicados.
            </div>
        @endforelse
    </div>

    {{-- MODAL CREAR PERMISO --}}
    <x-dialog-modal wire:model="open_create" maxWidth="md">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <h2 class="text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-white">Nuevo Permiso</h2>
                <button type="button" wire:click="$set('open_create', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="savePermission" id="createPermissionForm" class="space-y-3">
                <div>
                    <x-label value="Tabla / Módulo (ej: users, olts, recibos, etc.)" />
                    <x-input type="text" class="w-full mt-1" wire:model.defer="table_name" placeholder="ej: reportes, auditoria, clientes" />
                    <x-input-error for="table_name" class="mt-1" />
                </div>

                <div>
                    <x-label value="Identificador Técnico (ej: admin.users.export)" />
                    <x-input type="text" class="w-full mt-1" wire:model.defer="name" placeholder="ej: admin.reports.export" />
                    <x-input-error for="name" class="mt-1" />
                </div>

                <div>
                    <x-label value="Descripción Amigable" />
                    <x-input type="text" class="w-full mt-1" wire:model.defer="description" placeholder="ej: Exportar reportes en Excel o PDF" />
                    <x-input-error for="description" class="mt-1" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center justify-end gap-2">
                <x-secondary-button wire:click="$set('open_create', false)">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit" form="createPermissionForm" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="savePermission">GUARDAR PERMISO</span>
                    <span wire:loading wire:target="savePermission">GUARDANDO...</span>
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
