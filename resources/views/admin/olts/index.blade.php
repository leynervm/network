<x-app-layout>

    <x-slot name="header">{{ __('Gestionar OLTs') }}</x-slot>

    @can('admin.olts.create')
        <div>
            <livewire:admin.olts.create-olt />
        </div>
    @endcan

    @can('admin.olts.index')
        <div>
            <livewire:admin.olts.show-olts />
        </div>
    @endcan
</x-app-layout>
