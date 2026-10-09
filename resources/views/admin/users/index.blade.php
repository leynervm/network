<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-base font-bold text-gray-800 dark:text-neutral-200 uppercase tracking-wide">
                {{ __('Gestión de Usuarios') }}
            </h1>
        </div>
    </x-slot>

    <div class="flex flex-wrap gap-2 items-center justify-start mb-3">
        @can('admin.users.create')
            <livewire:admin.users.create-user />
        @endcan

        @can('admin.roles.index')
            <a href="{{ route('admin.roles') }}"
                class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span>ROLES</span>
            </a>

            <a href="{{ route('admin.permissions') }}"
                class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <span>MATRIZ PERMISOS</span>
            </a>
        @endcan
    </div>

    @can('admin.users.index')
        <div>
            <livewire:admin.users.show-users />
        </div>
    @else
        <div class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
            No tienes permiso para ver el listado de usuarios.
        </div>
    @endcan
</x-app-layout>