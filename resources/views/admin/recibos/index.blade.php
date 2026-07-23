<x-app-layout>

    <x-slot name="header">{{ __('Gestionar Recibos de Pago') }}</x-slot>

    <div>
        <livewire:admin.recibos.create-recibo />
    </div>

    <div class="mt-3">
        <livewire:admin.recibos.show-recibos />
    </div>
</x-app-layout>
