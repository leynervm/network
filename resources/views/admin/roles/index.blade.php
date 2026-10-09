<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-base font-bold text-gray-800 dark:text-neutral-200 uppercase tracking-wide">
                {{ __('Gestión de Roles y Permisos') }}
            </h1>
        </div>
    </x-slot>

    <div class="flex flex-wrap gap-2 items-center justify-start mb-3">
        @can('admin.roles.create')
            <livewire:admin.roles.create-role />
        @endcan

        @can('admin.users.index')
            <a href="{{ route('admin.users') }}"
                class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>USUARIOS</span>
            </a>
        @endcan

        <a href="{{ route('admin.permissions') }}"
            class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <span>MATRIZ PERMISOS</span>
        </a>
    </div>

    @can('admin.roles.index')
        <div>
            <livewire:admin.roles.show-roles />
        </div>
    @else
        <div class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
            No tienes permiso para ver la gestión de roles.
        </div>
    @endcan
</x-app-layout>