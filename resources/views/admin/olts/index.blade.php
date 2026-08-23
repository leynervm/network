<x-app-layout>

    <x-slot name="header">{{ __('Gestionar OLTs') }}</x-slot>

    <div>
        <livewire:admin.olts.create-olt />
    </div>

    <div>
        <livewire:admin.olts.show-olts />
    </div>

</x-app-layout>
