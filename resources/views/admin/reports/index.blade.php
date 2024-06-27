<x-app-layout>
    <div class="w-full" x-data="reports">
        <div class="w-full justify-center items-center text-center">
            <x-button @click="type='0'">CLIENTES INTERNET</x-button>

            <x-button @click="type='1'">RECIBOS INTERNET</x-button>

            <x-button @click="type='2'">PAGOS INTERNET</x-button>
        </div>
        <div x-show="type == '0'" style="display: none;" x-transition>
            <livewire:admin.reports.network-reports />
        </div>
        <div x-show="type == '1'" style="display: none;" x-transition>
            <livewire:admin.reports.recibo-reports />
        </div>
        <div x-show="type == '2'" style="display: none;" x-transition>
            <livewire:admin.reports.payment-reports />
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('reports', () => ({
                type: '0',
            }))
        })
    </script>
</x-app-layout>
