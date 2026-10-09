<div>
    {{-- Barra de búsqueda y filtros --}}
    <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-3">
        <div class="w-full max-w-sm">
            <x-label value="Buscar rol por nombre" />
            <x-input class="w-full block" wire:model="search" placeholder="ej: admin, tecnico, cajero..." />
        </div>
        <div class="text-xs text-gray-500 dark:text-neutral-400">
            Total roles registrados: <span
                class="font-bold text-gray-800 dark:text-gray-200">{{ $roles->total() }}</span>
        </div>
    </div>

    {{-- Tabla de Roles --}}
    <div
        class="w-full bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th class="p-3 text-left font-semibold">ID</th>
                    <th class="p-3 text-left font-semibold">NOMBRE DEL ROL</th>
                    <th class="p-3 text-center font-semibold">USUARIOS ASIGNADOS</th>
                    <th class="p-3 text-center font-semibold">PERMISOS ASIGNADOS</th>
                    <th class="p-3 text-right font-semibold">ACCIONES</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($roles as $item)
                    <tr
                        class="border-b border-gray-100 dark:border-neutral-700/60 hover:bg-gray-50/80 dark:hover:bg-neutral-700/40 transition">
                        <td class="p-3 text-gray-500 dark:text-neutral-400 font-mono text-xs">
                            #{{ $item->id }}
                        </td>
                        <td class="p-3">
                            <div class="flex items-center gap-2">
                                <span
                                    class="px-2 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider
                                        {{ $item->name === 'admin' ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/60' : 'bg-indigo-50 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-300 border border-indigo-200/80 dark:border-indigo-800/50' }}">
                                    {{ $item->name }}
                                </span>
                                @if ($item->name === 'admin')
                                    <span class="text-[10px] text-amber-600 dark:text-amber-400 font-semibold"
                                        title="Rol del sistema con acceso total">
                                        (Super Admin)
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="p-3 text-center">
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $item->users_count }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/40">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                {{ $item->permissions_count }} permisos
                            </span>
                        </td>
                        <td class="p-3 text-right">
                            <div class="inline-flex items-center gap-1">
                                {{-- Ver permisos asignados --}}
                                <button type="button" wire:click="view({{ $item->id }})" title="Ver detalles y permisos"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>

                                {{-- Editar rol --}}
                                @can('admin.roles.edit')
                                    @if ($item->name === 'admin')
                                        <span title="Rol de Administrador protegido: cuenta con acceso total permanente"
                                            class="p-1.5 rounded-lg text-amber-500/80 dark:text-amber-400/80 inline-flex items-center cursor-not-allowed">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </span>
                                    @else
                                        <button type="button" wire:click="edit({{ $item->id }})" title="Editar rol y permisos"
                                            class="p-1.5 rounded-lg text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    @endif
                                @endcan

                                {{-- Eliminar rol --}}
                                @can('admin.roles.delete')
                                    @if ($item->name !== 'admin')
                                        <button type="button" onclick="confirmDeleteRole({{ $item->id }}, '{{ $item->name }}')"
                                            title="Eliminar rol"
                                            class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500 dark:text-neutral-400">
                            No se encontraron roles registrados.
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>

        @if ($roles->hasPages())
            <div class="p-3 border-t border-gray-100 dark:border-neutral-700">
                {{ $roles->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL EDITAR ROL --}}
    <x-dialog-modal wire:model="open_edit" maxWidth="4xl">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 flex items-center justify-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">
                            Editar Rol: <span class="text-indigo-600 dark:text-indigo-400">{{ $role_name }}</span>
                        </h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Modifica los permisos asociados a
                            este rol</p>
                    </div>
                </div>
                <button type="button" wire:click="$set('open_edit', false)"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" id="editRoleForm" class="space-y-4">
                {{-- Nombre del Rol --}}
                <div
                    class="bg-gray-50 dark:bg-neutral-800/60 p-3.5 rounded-xl border border-gray-200/80 dark:border-neutral-700/60">
                    <x-label for="edit_role_name" value="Nombre del Rol" />
                    <x-input id="edit_role_name" type="text" class="w-full mt-1" wire:model.defer="role_name"
                        :disabled="$role && $role->name === 'admin'" />
                    @if ($role && $role->name === 'admin')
                        <p class="text-[11px] text-amber-600 dark:text-amber-400 mt-1">El nombre del rol 'admin' está
                            protegido y no puede cambiarse.</p>
                    @endif
                    <x-input-error for="role_name" class="mt-1" />
                </div>

                {{-- Barra de herramientas para permisos --}}
                <div
                    class="flex flex-wrap items-center justify-between gap-2 p-2 bg-neutral-100 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold text-gray-700 dark:text-neutral-300">Permisos Activos:</span>
                        <span
                            class="px-2 py-0.5 rounded-full text-xs font-bold bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300">
                            {{ count($selectedPermissions) }}
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" wire:click="selectAll"
                            class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-neutral-600 hover:bg-gray-50 font-medium transition shadow-sm">
                            ✓ Marcar Todos
                        </button>
                        <button type="button" wire:click="unselectAll"
                            class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-red-600 dark:text-red-400 border border-gray-200 dark:border-neutral-600 hover:bg-red-50 font-medium transition shadow-sm">
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
                            <div
                                class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm transition hover:border-indigo-400 dark:hover:border-indigo-500">
                                {{-- Cabecera del grupo/tabla --}}
                                <div
                                    class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="w-2 h-2 rounded-full {{ $isAllTableSelected ? 'bg-green-500 ring-2 ring-green-200' : 'bg-gray-300 dark:bg-neutral-600' }}"></span>
                                        <span
                                            class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                                            TABLA: {{ $table }}
                                        </span>
                                    </div>
                                    <button type="button" wire:click="toggleTablePermissions('{{ $table }}')"
                                        class="text-[10px] uppercase font-bold px-2 py-0.5 rounded transition {{ $isAllTableSelected ? 'bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 hover:bg-green-200' : 'bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-neutral-300 hover:bg-gray-200' }}">
                                        {{ $isAllTableSelected ? 'Desmarcar' : 'Todos' }}
                                        ({{ count($selectedInTable) }}/{{ count($permissions) }})
                                    </button>
                                </div>

                                {{-- Lista de permisos del grupo --}}
                                <div class="space-y-1.5">
                                    @foreach ($permissions as $perm)
                                        <label
                                            class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-700/50 cursor-pointer select-none transition">
                                            <input type="checkbox" value="{{ $perm->name }}" wire:model="selectedPermissions"
                                                class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900 mt-0.5">
                                            <div class="flex-1 min-w-0">
                                                <p
                                                    class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200 leading-tight">
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
                <x-secondary-button wire:click="$set('open_edit', false)">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit" form="editRoleForm" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="update">ACTUALIZAR ROL</span>
                    <span wire:loading wire:target="update">ACTUALIZANDO...</span>
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>

    {{-- MODAL VER DETALLES DE ROL --}}
    <x-dialog-modal wire:model="open_view" maxWidth="3xl">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">
                            Detalles del Rol: <span
                                class="text-indigo-600 dark:text-indigo-400">{{ $role?->name }}</span>
                        </h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Permisos asignados organizados por
                            tabla</p>
                    </div>
                </div>
                <button type="button" wire:click="$set('open_view', false)"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            @if ($role)
                @php
                    $rolePerms = $role->permissions->groupBy('table_name');
                @endphp
                <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-1">
                    @forelse ($rolePerms as $table => $perms)
                        <div
                            class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm">
                            <div
                                class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
                                <span class="text-xs font-bold text-gray-800 dark:text-white uppercase font-mono">
                                    TABLA: {{ $table }}
                                </span>
                                <span
                                    class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-50 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300">
                                    {{ count($perms) }} permisos
                                </span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                @foreach ($perms as $p)
                                    <div
                                        class="p-2 rounded-lg bg-gray-50 dark:bg-neutral-700/40 border border-gray-100 dark:border-neutral-700/50">
                                        <p class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200">
                                            {{ $p->description ?: $p->name }}</p>
                                        <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono">{{ $p->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-gray-500 text-xs">
                            Este rol aún no tiene permisos asignados.
                        </div>
                    @endforelse
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_view', false)">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    <script>
        function confirmDeleteRole(id, name) {
            Swal.fire({
                title: '¿Eliminar rol ' + name + '?',
                text: "Los usuarios con este rol perderán sus permisos asociados.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'SÍ, ELIMINAR',
                cancelButtonText: 'CANCELAR'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(id);
                }
            });
        }
    </script>
</div>