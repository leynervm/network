<x-app-layout>
    @can('admin.marcas.create')
        <div class="">
            <livewire:admin.marcas.create-marca />
        </div>
    @endcan

    @can('admin.marcas.index')
        <div class="mt-3">
            <livewire:admin.marcas.show-marcas />
        </div>
    @endcan
</x-app-layout>
