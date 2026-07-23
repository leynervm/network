<div>
    <div class="w-full flex justify-between items-start gap-3">
        @if ($network->isActivo())
            <x-button wire:click="$toggle('open')">CREAR RECIBO</x-button>
        @endif

        <div class="w-full max-w-36">
            <x-input class="w-full block !py-1 !text-[10px]" type="month" wire:model.lazy="searchmonth" />
        </div>
    </div>

    <div class="overflow-x-auto w-full  pt-3">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>REGISTRADO</th>
                    <th>SERIE</th>
                    <th>MES PAGO</th>
                    <th>SUBTOTAL</th>
                    <th>DESCUENTO</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
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

                            <td class="text-center uppercase">{{ formatDate($item->month, 'MMMM Y') }}</td>
                            <td class="text-center">{{ $item->amount }}</td>
                            <td class="text-center">{{ $item->descuento }}</td>
                            <td class="text-center">{{ $item->total }}</td>
                            <td class="text-center align-middle">
                                <div class="flex flex-col gap-1 justify-center items-center">
                                    @if ($item->payment)
                                        <span
                                            class="inline-block bg-green-500 text-white rounded text-[10px] p-1 leading-3">PAGADO</span>
                                        <x-danger-button wire:key="deletepay_{{ $item->id }}"
                                            onclick="confirmDeletePayment({{ $item }})"
                                            wire:loading.attr="disabled">ANULAR</x-danger-button>
                                    @else
                                        <x-button wire:click="pay({{ $item->id }})" wire:loading.attr="disabled"
                                            wire:key="pay_{{ $item->id }}">PAGAR</x-button>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('admin.recibo.print', $item->id) }}" target="_blank"
                                        title="Imprimir Recibo"
                                        class="inline-flex items-center justify-center p-1.5 rounded-lg bg-white hover:bg-neutral-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 text-neutral-700 dark:text-white border border-neutral-600 dark:border-neutral-400 transition-colors shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081-.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                        </svg>
                                    </a>
                                    <button type="button" wire:key="deleterecibo_{{ $item->id }}"
                                        onclick="confirmDeleteRecibo({{ $item }})" wire:loading.attr="disabled"
                                        title="Eliminar Recibo"
                                        class="inline-flex items-center justify-center p-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 dark:bg-rose-500/10 dark:hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 border border-rose-200 dark:border-rose-500/30 transition-colors shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>

    <x-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR RECIBO INTERNET</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full">
                    <x-label value="Tipo recibo" />
                    <x-select-input class="w-full block" wire:model.lazy="seriepago_id">
                        <option value="">SELECCIONAR...</option>
                        @if (count($seriepagos) > 0)
                            @foreach ($seriepagos as $item)
                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                            @endforeach
                        @endif
                    </x-select-input>
                    <x-input-error for="seriepago_id" />
                </div>
                <div class="w-full">
                    <x-label value="Serie recibo" />
                    <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                        {{ $seriecompleta }}
                    </p>
                    <x-input-error for="seriecompleta" />
                </div>
                <div class="w-full">
                    <x-label value="Total" />
                    {{-- <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                        {{ $amount }}
                    </p> --}}
                    <x-input class="w-full block" wire:model.defer="amount" type="number" />
                </div>
                <div class="w-full">
                    <x-label value="Mes" />
                    <x-input class="w-full block" wire:model.lazy="month" type="month" />
                    <x-input-error for="month" />
                </div>

                <div class="text-end">
                    {{-- {{ print_r($errors->all()) }} --}}
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openpay" maxWidth="md">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PAGO</h1>
            <button wire:click="$set('openpay', false)"
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
                        <x-select-input class="w-full block" wire:model.defer="formapay_id">
                            <option value="">SELECCIONAR...</option>
                            @if (count($formapays) > 0)
                                @foreach ($formapays as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </x-select-input>
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
