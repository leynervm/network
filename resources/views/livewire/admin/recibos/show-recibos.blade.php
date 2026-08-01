<div>
    @if ($recibos->hasPages())
        <div class="w-full mb-2">
            {{ $recibos->links() }}
        </div>
    @endif

    <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-48">
            <x-label value="Buscar serie recibo" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>
        <div class="w-full max-w-40">
            <x-label value="Filtrar mes" />
            <x-input class="w-full block" wire:model.lazy="searchmonth" type="month" />
        </div>
        <div class="w-full max-w-40">
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
                    <th>ACCIONES</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($recibos) > 0)
                    @foreach ($recibos as $item)
                        <tr>
                            <td class="text-center uppercase">
                                {{ formatDate($item->date, 'DD MMM YYYY') }}
                                <p class="text-[10px] text-red-600">
                                    VENCE : {{ formatDate($item->vencimiento, 'DD MMM YYYY') }}
                                </p>
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
                            <td class="text-center align-middle">
                                <div class="flex flex-col gap-1 justify-center items-center">
                                    @if ($item->payment)
                                        <span class="bg-green-500 text-white text-[10px] p-1 rounded leading-3">
                                            PAGADO</span>
                                    @else
                                        <span class="bg-orange-500 text-white text-[10px] p-1 rounded leading-3">
                                            PENDIENTE</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div class="flex items-center justify-center gap-2">
                                    @if ($item->payment)
                                        <x-danger-button wire:key="deletepay_{{ $item->id }}"
                                            onclick="confirmDeletePayment({{ $item }})"
                                            wire:loading.attr="disabled">ANULAR</x-danger-button>
                                    @else
                                        <x-button wire:click="pay({{ $item->id }})"
                                            wire:key="pay{{ $item->id }}">PAGAR</x-button>
                                    @endif

                                    @php
                                        $pdfFileName =
                                            $item->client->document .
                                            '-' .
                                            \Carbon\Carbon::parse($item->month)->format('mY') .
                                            '-' .
                                            $item->seriecompleta .
                                            '.pdf';
                                    @endphp
                                    <button type="button"
                                        onclick="sharePdf('{{ route('admin.recibo.print', $item->id) }}', '{{ $pdfFileName }}', '{{ $item->network->telefono ?? '' }}')"
                                        title="Compartir por WhatsApp"
                                        class="inline-flex items-center justify-center p-1.5 rounded-lg bg-green-50 hover:bg-green-100 dark:bg-green-500/10 dark:hover:bg-green-500/20 text-green-600 dark:text-green-400 border border-green-200 dark:border-green-500/30 transition-colors shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-4"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('admin.recibo.print', $item->id) }}" target="_blank"
                                        title="Imprimir Recibo"
                                        class="inline-flex items-center justify-center p-1.5 rounded-lg bg-white hover:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 text-black dark:text-white border border-black dark:border-white transition-colors shadow-sm">
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

        async function sharePdf(url, filename, phone) {
            Swal.fire({
                title: 'Preparando recibo...',
                text: 'Descargando el PDF para compartir...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Network response was not ok');
                const blob = await response.blob();
                const file = new File([blob], filename, {
                    type: 'application/pdf'
                });

                Swal.close();

                // Intentamos compartir usando la Web Share API nativa si lo soporta y permite compartir archivos
                if (navigator.canShare && navigator.canShare({
                        files: [file]
                    })) {
                    await navigator.share({
                        title: 'Recibo de Pago',
                        text: 'Estimado cliente, adjunto su recibo de pago.',
                        files: [file]
                    });
                } else {
                    // Fallback para PC: Descargar y abrir WhatsApp
                    const downloadUrl = window.URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = downloadUrl;
                    link.download = filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    window.URL.revokeObjectURL(downloadUrl);

                    if (phone) {
                        let waPhone = phone.replace(/\D/g, '');
                        if (waPhone.length === 9) {
                            waPhone = '51' + waPhone;
                        }
                        const waMessage = encodeURIComponent(
                            'Hola! Estimado cliente, le escribimos para adjuntarle su recibo de pago PDF.');
                        window.open(`https://wa.me/${waPhone}?text=${waMessage}`, '_blank');
                    } else {
                        Swal.fire('Atención',
                            'El archivo ha sido descargado. El cliente no tiene teléfono registrado para abrir WhatsApp.',
                            'info');
                    }
                }
            } catch (error) {
                console.error('Error sharing PDF:', error);
                Swal.fire('Error', 'Hubo un problema al generar o compartir el archivo PDF.', 'error');
            }
        }
    </script>
</div>
