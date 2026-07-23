<x-app-layout>

    <x-slot name="header">{{ __('Gestionar Productos') }}</x-slot>

    <div class="flex gap-2 justify-start">
        <livewire:admin.products.create-product />

        <a href="{{ route('admin.marcas') }}"
            class="inline-flex items-center p-1.5 bg-gray-800 border border-transparent rounded-md font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150">MARCAS</a>
    </div>

    <div class="mt-3">
        <livewire:admin.products.show-products />
    </div>
</x-app-layout>
