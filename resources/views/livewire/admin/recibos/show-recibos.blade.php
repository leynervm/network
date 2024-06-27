<div>
    @if ($recibos->hasPages())
        <div class="w-full mb-2">
            {{ $recibos->links() }}
        </div>
    @endif

    <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-xs">
            <x-label value="Buscar serie recibo" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>
        <div class="w-full max-w-xs">
            <x-label value="Filtrar mes" />
            <x-input class="w-full block" wire:model.lazy="searchmonth" type="month" />
        </div>
        <div class="w-full max-w-xs">
            <x-label value="Tipo recibo" />
            <select class="w-full" wire:model.lazy="searchtype">
                <option value="">SELECCIONAR...</option>
                <option value="{{ \App\Models\Network::TV }}">{{ \App\Models\Network::TV }}</option>
                <option value="{{ \App\Models\Network::FIBRA }}">{{ \App\Models\Network::FIBRA }}</option>
                <option value="{{ \App\Models\Network::FIBRA_TV }}">{{ \App\Models\Network::FIBRA_TV }}</option>
                <option value="{{ \App\Models\Network::SATELITAL }}">{{ \App\Models\Network::SATELITAL }}</option>
            </select>
        </div>
    </div>

    <div class="w-full">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>REGISTRADO</th>
                    <th>SERIE</th>
                    <th>CLIENTE</th>
                    <th>MES PAGO</th>
                    <th>SUBTOTAL</th>
                    <th>DESCUENTO</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>IMPRIMIR</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($recibos) > 0)
                    @foreach ($recibos as $item)
                        <tr>
                            <td class="text-center uppercase">
                                {{ formatDate($item->date) }}
                                <p class="text-[10px] text-red-600">VENCE : {{ formatDate($item->vencimiento) }}</p>
                            </td>
                            <td class="text-center">{{ $item->seriecompleta }}</td>
                            <td>
                                <p>{{ $item->client->name }}</p>
                                <p>{{ $item->client->document }}</p>
                                <p class="font-semibold">SERVICIO :{{ $item->network->type }}</p>
                            </td>
                            <td class="text-center uppercase">{{ formatDate($item->month, 'MMMM Y') }}</td>
                            <td class="text-center">{{ $item->amount }}</td>
                            <td class="text-center">{{ $item->descuento }}</td>
                            <td class="text-center">{{ $item->total }}</td>
                            <td class="text-center flex flex-col gap-1 justify-center items-center">
                                @if ($item->payment)
                                    <span class="bg-green-500 text-white text-[10px] p-1 rounded leading-3">
                                        PAGADO</span>
                                    <x-danger-button wire:key="deletepay_{{ $item->id }}"
                                        onclick="confirmDeletePayment({{ $item }})"
                                        wire:loading.attr="disabled">ANULAR</x-danger-button>
                                @else
                                    <x-button wire:click="pay({{ $item->id }})"
                                        wire:key="pay{{ $item->id }}">PAGAR</x-button>
                                @endif
                            </td>
                            <td class="text-center">
                                <x-link class="2"
                                    href="{{ route('admin.recibo.print', $item->id) }}">IMPRIMIR</x-link>
                                <x-danger-button wire:key="deleterecibo_{{ $item->id }}"
                                    onclick="confirmDeleteRecibo({{ $item }})"
                                    wire:loading.attr="disabled">ELIMINAR</x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>



    <x-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PAGO</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="savepayment" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full grid gap-2 grid-cols-1">
                    <div class="w-full">
                        <x-label value="Serie recibo" />
                        <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                            {{ $recibo->seriecompleta }}
                        </p>
                    </div>

                    <div class="w-full">
                        <x-label value="Importe" />
                        <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                            {{ number_format($recibo->amount, 2, '.', '') }}
                        </p>
                    </div>

                    <div class="w-full">
                        <x-label value="Descuento" />
                        <x-input wire:model.lazy="descuento" class="w-full" type="number" min="0"
                            step="0.01" />
                    </div>

                    <div class="w-full">
                        <x-label value="Total pagar" />
                        <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                            {{ number_format($recibo->total - $descuento, 2, '.', '') }}
                        </p>
                    </div>

                    <div class="w-full">
                        <x-label value="Forma pago" />
                        <select class="w-full block rounded-md border-gray-300 " wire:model.defer="formapay_id">
                            <option value="">SELECCIONAR...</option>
                            @if (count($formapays) > 0)
                                @foreach ($formapays as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="formapay_id" />
                    </div>

                    <div class="w-full">
                        <x-label value="Codigo transferencia" />
                        <x-input class="w-full block" wire:model.defer="codetransferencia" />
                        <x-input-error for="codetransferencia" />
                    </div>

                    <div class="w-full">
                        <x-label value="Detalle" />
                        <x-input class="w-full block" wire:model.defer="detalle" />
                        <x-input-error for="detalle" />
                    </div>
                </div>

                <div class="text-end">
                    {{ print_r($errors->all()) }}
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        function confirmDeletePayment(recibo) {
            Swal.fire({
                title: 'Eliminar pago del recibo con serie ' + recibo.seriecompleta + ' ?',
                text: "El registro dejará de estar disponible en la base de datos.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deletepayment(recibo.id);
                }
            })
        }

        function confirmDeleteRecibo(recibo) {
            Swal.fire({
                title: 'Eliminar recibo con serie ' + recibo.seriecompleta + ' ?',
                text: "El registro dejará de estar disponible en la base de datos.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleterecibo(recibo.id);
                }
            })
        }
    </script>
</div>
