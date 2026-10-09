<div>
    @can('admin.users.create')
        <x-button wire:click="$set('open', true)" class="gap-1.5 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <span>NUEVO USUARIO</span>
        </x-button>
    @endcan

    <x-dialog-modal wire:model="open" maxWidth="lg">
        <x-slot name="title">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Crear Nuevo Usuario</h2>
                        <p class="text-[11px] text-gray-500 dark:text-neutral-400">Completa los datos y asigna roles de acceso</p>
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
            <form wire:submit.prevent="save" id="createUserForm" class="space-y-3">
                {{-- Nombre --}}
                <div>
                    <x-label for="new_user_name" value="Nombre Completo" />
                    <x-input id="new_user_name" type="text" class="w-full mt-1" wire:model.defer="name" placeholder="ej: Juan Pérez" />
                    <x-input-error for="name" class="mt-1" />
                </div>

                {{-- Email --}}
                <div>
                    <x-label for="new_user_email" value="Correo Electrónico" />
                    <x-input id="new_user_email" type="email" class="w-full mt-1" wire:model.defer="email" placeholder="ej: usuario@ejemplo.com" />
                    <x-input-error for="email" class="mt-1" />
                </div>

                {{-- Contraseña --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <x-label for="new_user_password" value="Contraseña" />
                        <x-input id="new_user_password" type="password" class="w-full mt-1" wire:model.defer="password" placeholder="Mínimo 6 caracteres" />
                        <x-input-error for="password" class="mt-1" />
                    </div>

                    <div>
                        <x-label for="new_user_password_confirmation" value="Confirmar Contraseña" />
                        <x-input id="new_user_password_confirmation" type="password" class="w-full mt-1" wire:model.defer="password_confirmation" placeholder="Repite contraseña" />
                    </div>
                </div>

                {{-- Roles disponibles --}}
                <div class="pt-2">
                    <x-label value="Asignar Roles" />
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-2 p-3 bg-gray-50 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60 max-h-48 overflow-y-auto">
                        @foreach ($roles as $role)
                            <label class="flex items-center gap-2 p-2 rounded-lg bg-white dark:bg-neutral-800 border border-gray-100 dark:border-neutral-700 hover:border-indigo-400 dark:hover:border-indigo-500 cursor-pointer transition select-none">
                                <input type="checkbox" value="{{ $role->name }}" wire:model.defer="selectedRoles"
                                    class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900">
                                <div>
                                    <span class="text-xs font-bold uppercase text-gray-800 dark:text-gray-200">{{ $role->name }}</span>
                                    <p class="text-[10px] text-gray-400 dark:text-neutral-400">{{ $role->permissions_count ?? $role->permissions->count() }} permisos</p>
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
                <x-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit" form="createUserForm" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="save">GUARDAR USUARIO</span>
                    <span wire:loading wire:target="save">GUARDANDO...</span>
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
