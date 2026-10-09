<x-app-layout>

    <x-slot name="header">{{ __('Gestionar Antenas') }}</x-slot>

    @can('admin.antenas.create')
        <div>
            <livewire:admin.antenas.create-antena />
        </div>
    @endcan

    @can('admin.antenas.index')
        <div>
            <livewire:admin.antenas.show-antenas />
        </div>
    @endcan
</x-app-layout>
