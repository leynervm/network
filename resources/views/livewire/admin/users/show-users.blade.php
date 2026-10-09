<div>
    {{-- Barra de búsqueda y filtros --}}
    <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-3">
        <div class="flex flex-wrap items-center gap-2 flex-1 max-w-xl">
            <div class="w-full sm:w-64">
                <x-label value="Buscar usuario" />
                <x-input class="w-full block" wire:model="search" placeholder="Nombre o correo..." />
            </div>

            <div class="w-full sm:w-48">
                <x-label value="Filtrar por rol" />
                <x-select-input class="w-full" wire:model="roleFilter">
                    <option value="">TODOS LOS ROLES</option>
                    @foreach ($allRoles as $r)
                        <option value="{{ $r->name }}">{{ strtoupper($r->name) }}</option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

        <div class="text-xs text-gray-500 dark:text-neutral-400">
            Total usuarios: <span class="font-bold text-gray-800 dark:text-gray-200">{{ $users->total() }}</span>
        </div>
    </div>

    {{-- Tabla de Usuarios --}}
    <div
        class="w-full bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th class="p-3 text-left font-semibold">USUARIO</th>
                    <th class="p-3 text-left font-semibold">CORREO ELECTRÓNICO</th>
                    <th class="p-3 text-center font-semibold">ROLES ASIGNADOS</th>
                    <th class="p-3 text-center font-semibold">PERMISOS TOTALES</th>
                    <th class="p-3 text-right font-semibold">ACCIONES</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @forelse ($users as $item)
                    <tr
                        class="border-b border-gray-100 dark:border-neutral-700/60 hover:bg-gray-50/80 dark:hover:bg-neutral-700/40 transition">
                        <td class="p-3">
                            <div class="flex items-center gap-3">
                                <img src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}"
                                    class="w-9 h-9 rounded-full object-cover border border-gray-200 dark:border-neutral-700">
                                <div>
                                    <h4 class="text-xs font-bold text-gray-800 dark:text-white">{{ $item->name }}</h4>
                                    <p class="text-[10px] text-gray-400 font-mono">ID #{{ $item->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-3 text-xs text-gray-600 dark:text-neutral-300 font-mono">
                            {{ $item->email }}
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex flex-wrap items-center justify-center gap-1">
                                @forelse ($item->roles as $role)
                                    <span
                                        class="px-2 py-0.5 rounded-lg text-[10px] font-bold uppercase
                                                                        {{ $role->name === 'admin' ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/60' : 'bg-indigo-50 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-300 border border-indigo-200/80 dark:border-indigo-800/50' }}">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-[10px] text-gray-400 italic">Sin rol</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="p-3 text-center">
                            @php
                                $permCount = $item->hasRole('admin')
                                    ? 'Acceso Total (Admin)'
                                    : $item->getAllPermissions()->count() . ' permisos';
                            @endphp
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/40">
                                {{ $permCount }}
                            </span>
                        </td>
                        <td class="p-3 text-right">
                            <div class="inline-flex items-center gap-1">
                                {{-- Ver permisos agrupados --}}
                                <button type="button" wire:click="view({{ $item->id }})"
                                    title="Ver matriz de permisos del usuario"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>

                                {{-- Editar usuario --}}
                                @can('admin.users.edit')
                                    <button type="button" wire:click="edit({{ $item->id }})" title="Editar usuario y roles"
                                        class="p-1.5 rounded-lg text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                @endcan

                                {{-- Eliminar usuario --}}
                                @can('admin.users.delete')
                                    @if ($item->id !== auth()->id() && $item->email !== 'admin@gmail.com')
                                        <button type="button" onclick="confirmDeleteUser({{ $item->id }}, '{{ $item->name }}')"
                                            title="Eliminar usuario"
                                            class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @elseif ($item->email === 'admin@gmail.com')
                                        <span title="Usuario Administrador principal protegido contra eliminación"
                                            class="p-1.5 rounded-lg text-amber-500/80 dark:text-amber-400/80 inline-flex items-center cursor-not-allowed">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </span>
                                    @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500 dark:text-neutral-400">
                            No se encontraron usuarios que coincidan con la búsqueda.
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>

        @if ($users->hasPages())
            <div class="p-3 border-t border-gray-100 dark:border-neutral-700">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL EDITAR USUARIO --}}
    <x-dialog-modal wire:model="open_edit" maxWidth="lg">
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
                            Editar Usuario: <span class="text-indigo-600 dark:text-indigo-400">{{ $name }}</span>
                        </h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Actualiza datos y roles asignados</p>
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
            <form wire:submit.prevent="update" id="editUserForm" class="space-y-3">
                {{-- Nombre --}}
                <div>
                    <x-label for="edit_user_name" value="Nombre Completo" />
                    <x-input id="edit_user_name" type="text" class="w-full mt-1" wire:model.defer="name" />
                    <x-input-error for="name" class="mt-1" />
                </div>

                {{-- Email --}}
                <div>
                    <x-label for="edit_user_email" value="Correo Electrónico" />
                    <x-input id="edit_user_email" type="email" class="w-full mt-1" wire:model.defer="email" />
                    <x-input-error for="email" class="mt-1" />
                </div>

                {{-- Contraseña (opcional) --}}
                <div
                    class="p-3 bg-gray-50 dark:bg-neutral-800/60 rounded-xl border border-gray-200/80 dark:border-neutral-700/60 space-y-2">
                    <p class="text-[11px] font-semibold text-gray-700 dark:text-neutral-300">Cambiar Contraseña
                        (opcional)</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div>
                            <x-label for="edit_user_password" value="Nueva Contraseña" />
                            <x-input id="edit_user_password" type="password" class="w-full mt-1"
                                wire:model.defer="password" placeholder="Dejar en blanco para conservar actual" />
                            <x-input-error for="password" class="mt-1" />
                        </div>
                        <div>
                            <x-label for="edit_user_password_confirmation" value="Confirmar Contraseña" />
                            <x-input id="edit_user_password_confirmation" type="password" class="w-full mt-1"
                                wire:model.defer="password_confirmation" placeholder="Repite contraseña" />
                        </div>
                    </div>
                </div>

                {{-- Roles asignados --}}
                <div>
                    <x-label value="Roles Asignados" />
                    <div
                        class="mt-1 grid grid-cols-1 sm:grid-cols-2 gap-2 p-3 bg-gray-50 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60 max-h-48 overflow-y-auto">
                        @foreach ($allRoles as $role)
                            @if ($role->name === 'admin' && (!$user || $user->email !== 'admin@gmail.com'))
                                @continue
                            @endif
                            @php
                                $isAdminRoleLocked = ($role->name === 'admin' && $user && $user->email === 'admin@gmail.com');
                            @endphp
                            <label
                                class="flex items-center gap-2 p-2 rounded-lg bg-white dark:bg-neutral-800 border border-gray-100 dark:border-neutral-700 transition select-none {{ $isAdminRoleLocked ? 'opacity-85 cursor-not-allowed bg-amber-50/50 dark:bg-amber-950/20' : 'hover:border-indigo-400 dark:hover:border-indigo-500 cursor-pointer' }}">
                                <input type="checkbox" value="{{ $role->name }}" wire:model.defer="selectedRoles"
                                    {{ $isAdminRoleLocked ? 'disabled' : '' }}
                                    class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900 {{ $isAdminRoleLocked ? 'cursor-not-allowed' : '' }}">
                                <div>
                                    <span
                                        class="text-xs font-bold uppercase text-gray-800 dark:text-gray-200">{{ $role->name }}</span>
                                    @if ($isAdminRoleLocked)
                                        <p class="text-[10px] text-amber-600 dark:text-amber-400 font-medium">Rol exclusivo del Administrador (no modificable)</p>
                                    @else
                                        <p class="text-[10px] text-gray-400">{{ $role->permissions->count() }} permisos</p>
                                    @endif
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error for="selectedRoles" class="mt-1" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center justify-end gap-2">
                <x-secondary-button wire:click="$set('open_edit', false)">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit" form="editUserForm" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="update">ACTUALIZAR USUARIO</span>
                    <span wire:loading wire:target="update">GUARDANDO...</span>
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>

    {{-- MODAL VER PERMISOS AGRUPADOS POR TABLA --}}
    <x-dialog-modal wire:model="open_view" maxWidth="3xl">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">
                            Matriz de Permisos: <span
                                class="text-indigo-600 dark:text-indigo-400">{{ $user_to_view?->name }}</span>
                        </h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Permisos efectivos asignados
                            agrupados por tabla/módulo</p>
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
            @if ($user_to_view)
                @if ($user_to_view->hasRole('admin'))
                    <div
                        class="p-4 mb-3 rounded-xl bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800/60 text-amber-800 dark:text-amber-200 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-500 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <p class="text-xs font-bold">Usuario Administrador Principal</p>
                            <p class="text-[11px]">Este usuario cuenta con el rol <strong class="underline">admin</strong> y
                                tiene acceso total a todos los módulos y tablas del sistema.</p>
                        </div>
                    </div>
                @endif

                @php
                    $userPermsGrouped = $user_to_view->getAllPermissions()->groupBy('table_name');
                @endphp

                <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-1">
                    @forelse ($userPermsGrouped as $table => $perms)
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
                                            {{ $p->description ?: $p->name }}
                                        </p>
                                        <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono">
                                            {{ $p->name }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-gray-500 text-xs">
                            Este usuario aún no tiene ningún permiso asociado a través de sus roles.
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
        function confirmDeleteUser(id, name) {
            Swal.fire({
                title: '¿Eliminar usuario ' + name + '?',
                text: "Esta acción no se puede deshacer.",
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