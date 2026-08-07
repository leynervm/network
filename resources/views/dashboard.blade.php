<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
    <div class="w-full">
        <livewire:admin.clientnetworks.create-client-network wire:key="create-client-network" />
    </div>

    <div class="w-full mt-5">
        <livewire:admin.clientnetworks.show-client-networks wire:key="show-client-networks" />
    </div>
</x-app-layout>
