<x-app-layout>

    <x-slot name="header">{{ __('Historial de Pagos') }}</x-slot>

    @can('admin.payments.index')
        <div>
            <livewire:admin.payments.show-payments />
        </div>
    @endcan
</x-app-layout>
