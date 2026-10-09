<x-app-layout>

    <x-slot name="header">{{ __('Gestionar Recibos de Pago') }}</x-slot>

    @can('admin.recibos.create')
        <div>
            <livewire:admin.recibos.create-recibo />
        </div>
    @endcan

    @can('admin.recibos.index')
        <div class="mt-3">
            <livewire:admin.recibos.show-recibos />
        </div>
    @endcan
</x-app-layout>
