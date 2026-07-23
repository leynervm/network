<x-app-layout>

    <x-slot name="header">{{ __('Gestionar Antenas') }}</x-slot>

    <div>
        <livewire:admin.antenas.create-antena />
    </div>

    <div>
        <livewire:admin.antenas.show-antenas />
    </div>
</x-app-layout>
