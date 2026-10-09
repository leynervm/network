<div>
    @can('admin.roles.create')
        <x-button wire:click="$set('open', true)" class="gap-1.5 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <span>NUEVO ROL</span>
        </x-button>
    @endcan

    <x-dialog-modal wire:model="open" maxWidth="4xl">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Crear Nuevo Rol</h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Asigna nombre y permisos agrupados por módulo al rol</p>
                    </div>
                </div>
                <button type="button" wire:click="$set('open', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" id="createRoleForm" class="space-y-4">
                {{-- Nombre del Rol --}}
                <div class="bg-gray-50 dark:bg-neutral-800/60 p-3.5 rounded-xl border border-gray-200/80 dark:border-neutral-700/60">
                    <x-label for="role_name" value="Nombre del Rol (en minúsculas, ej: operador, supervisor)" />
                    <x-input id="role_name" type="text" class="w-full mt-1" wire:model.defer="name" placeholder="ej: secretaria, cajero, supervisor" />
                    <x-input-error for="name" class="mt-1" />
                </div>

                {{-- Barra de herramientas para permisos --}}
                <div class="flex flex-wrap items-center justify-between gap-2 p-2 bg-neutral-100 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold text-gray-700 dark:text-neutral-300">Permisos Seleccionados:</span>
                        <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300">
                            {{ count($selectedPermissions) }}
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" wire:click="selectAll" class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-neutral-600 hover:bg-gray-50 font-medium transition shadow-sm">
                            ✓ Marcar Todos
                        </button>
                        <button type="button" wire:click="unselectAll" class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-red-600 dark:text-red-400 border border-gray-200 dark:border-neutral-600 hover:bg-red-50 font-medium transition shadow-sm">
                            ✗ Desmarcar Todos
                        </button>
                    </div>
                </div>

                {{-- Permisos agrupados por tabla --}}
                <div class="max-h-[55vh] overflow-y-auto pr-1 space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($permissionsByTable as $table => $permissions)
                            @php
                                $tablePermNames = $permissions->pluck('name')->toArray();
                                $selectedInTable = array_intersect($tablePermNames, $selectedPermissions);
                                $isAllTableSelected = count($selectedInTable) === count($tablePermNames);
                            @endphp
                            <div class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm transition hover:border-indigo-400 dark:hover:border-indigo-500">
                                {{-- Cabecera del grupo/tabla --}}
                                <div class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full {{ $isAllTableSelected ? 'bg-green-500 ring-2 ring-green-200' : 'bg-gray-300 dark:bg-neutral-600' }}"></span>
                                        <span class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                                            TABLA: {{ $table }}
                                        </span>
                                    </div>
                                    <button type="button" wire:click="toggleTablePermissions('{{ $table }}')"
                                        class="text-[10px] uppercase font-bold px-2 py-0.5 rounded transition {{ $isAllTableSelected ? 'bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 hover:bg-green-200' : 'bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-neutral-300 hover:bg-gray-200' }}">
                                        {{ $isAllTableSelected ? 'Desmarcar' : 'Todos' }} ({{ count($selectedInTable) }}/{{ count($permissions) }})
                                    </button>
                                </div>

                                {{-- Lista de permisos del grupo --}}
                                <div class="space-y-1.5">
                                    @foreach ($permissions as $perm)
                                        <label class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-700/50 cursor-pointer select-none transition">
                                            <input type="checkbox" value="{{ $perm->name }}" wire:model="selectedPermissions"
                                                class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900 mt-0.5">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200 leading-tight">
                                                    {{ $perm->description ?: $perm->name }}
                                                </p>
                                                <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono truncate">
                                                    {{ $perm->name }}
                                                </p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center justify-end gap-2">
                <x-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit" form="createRoleForm" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="save">GUARDAR ROL</span>
                    <span wire:loading wire:target="save">GUARDANDO...</span>
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
