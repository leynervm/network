<div>
    @if ($clientnetworks->hasPages())
        {{ $clientnetworks->links() }}
    @endif

    <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-xs">
            <x-label value="Buscar cliente" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>
        {{-- <div class="w-full max-w-xs">
            <x-label value="Filtrar mes" />
            <x-input class="w-full block" wire:model.lazy="searchmonth" type="month" />
        </div> --}}
        <div class="w-full max-w-xs">
            <x-label value="Tipo servicio" />
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
                    <th>FECHA ALTA</th>
                    <th>COD. SERVICIO</th>
                    <th>CLIENTE</th>
                    <th>PUERTO</th>
                    <th>TIPO SERVICIO</th>
                    <th>CONEXIÓN</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO</th>
                    <th>ESTADO</th>
                    <th>PAGOS</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($clientnetworks) > 0)
                    @foreach ($clientnetworks as $item)
                        <tr>
                            <td class="text-center uppercase w-[100px]">{{ formatDate($item->date) }}</td>
                            <td class="text-center">{{ $item->code }}</td>
                            <td class="text-left w-[400px]">
                                <p>{{ $item->client->name }}</p>
                                <p>{{ $item->client->document }}</p>
                                <p class="text-green-600">TELEFONO : {{ $item->telefono }}</p>
                                <p>
                                    @if ($item->ubigeo)
                                        {{ $item->ubigeo->departamento }}
                                        -
                                    @endif
                                    {{ $item->direccion }}
                                </p>
                                <p>LOCAL: {{ $item->typelocal }}</p>
                            </td>
                            <td class="text-center">{{ $item->portnumber }}</td>
                            {{-- <td class="text-center uppercase">{{ formatDate($item->datepayment) }}</td> --}}
                            <td class="text-center">
                                {{ $item->type }}
                            </td>
                            <td class="text-center">
                                @if ($item->isSatelital())
                                    @if ($item->antena)
                                        {{ $item->antena->name }}
                                    @endif
                                @else
                                    @if ($item->networkable)
                                        <p class="text-[10px] text-neutral-500">
                                            {{ $item->networkable->code }} </p>
                                        <p class="">
                                            {{ $item->networkable->boxnav->name }},
                                            {{ $item->networkable->boxnav->spliter->name }},
                                            {{ $item->networkable->boxnav->spliter->olt->name }}
                                        </p>
                                    @endif
                                @endif
                            </td>
                            <td class="text-left">
                                {{ $item->descripcion }}
                            </td>

                            <td class="text-center">S/.
                                {{ number_format($item->price, 2, '.', ', ') }}
                            </td>
                            <td class="text-center align-middle">
                                @if ($item->isSuspendido())
                                    <span
                                        class="bg-red-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3">
                                        SUSPENDIDO</span>

                                    <x-button wire:click="reconectar({{ $item->id }})"
                                        wire:loading.attr="disabled">RECONECTAR</x-button>
                                @else
                                    <span
                                        class="bg-green-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3">
                                        ACTIVO</span>
                                    <x-button wire:click="suspender({{ $item->id }})"
                                        wire:loading.attr="disabled">SUSPENDER</x-button>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex gap-1">
                                    <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                        wire:key="edit_{{ $item->id }}"
                                        class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-6 h-6 block mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>

                                    <x-danger-button onclick="confirmDeleteNetwork({{ $item }})"
                                        wire:loading.attr="disabled" wire:key="delete_{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-4 h-4">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </x-danger-button>


                                    <a class="inline-block p-1 rounded-md text-neutral-500 hover:bg-neutral-500 hover:text-white duration-150"
                                        href="{{ route('admin.network.show', $item->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-6 h-6 block mx-auto">
                                            <path
                                                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>

    <x-dialog-modal wire:model="open" maxWidth="2xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CLIENTE INTERNET</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" class="w-full grid grid-cols-1 gap-2" x-data="editnetwork">
                <div>
                    <x-label value="Tipo internet" />
                    <label for="typeservice"
                        class="inline-flex items-center px-2.5 py-2 bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] text-white uppercase tracking-widest transition ease-in-out duration-150">
                        {{ $network->type }}
                    </label>
                    <x-input-error for="network.type" />
                </div>

                @if ($network->isSatelital())
                    {{-- @if ($network->antena) --}}
                    <div class="w-full">
                        <x-label value="Antena" />
                        <select class="w-full block rounded-md border-gray-300 " wire:model.defer="antena_id">
                            <option value="">SELECCIONAR...</option>
                            @if (count($antenas) > 0)
                                @foreach ($antenas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="antena_id" />
                    </div>
                    {{-- @endif --}}
                @else
                    {{-- @if ($network->networkable) --}}
                    <div class="w-full grid lg:grid-cols-2 gap-2">
                        <div class="w-full">
                            <x-label value="OLT" />
                            <select class="w-full block rounded-md border-gray-300 " wire:model.lazy="olt_id">
                                <option value="">SELECCIONAR...</option>
                                @if (count($olts) > 0)
                                    @foreach ($olts as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="olt_id" />
                        </div>
                        <div class="w-full">
                            <x-label value="Spliter" />
                            <select class="w-full block rounded-md border-gray-300 " wire:model.lazy="spliter_id">
                                <option value="">SELECCIONAR...</option>
                                @if (count($spliters) > 0)
                                    @foreach ($spliters as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="spliter_id" />
                        </div>
                        <div class="w-full">
                            <x-label value="Caja NAP" />
                            <select class="w-full block rounded-md border-gray-300 " wire:model.lazy="boxnav_id">
                                <option value="">SELECCIONAR...</option>
                                @if (count($boxnavs) > 0)
                                    @foreach ($boxnavs as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="boxnav_id" />
                        </div>
                        <div class="w-full">
                            <x-label value="Puerto caja NAP" />
                            <select class="w-full block rounded-md border-gray-300 " wire:model.lazy="portboxnav_id">
                                <option value="">SELECCIONAR...</option>
                                @if (count($portboxnavs) > 0)
                                    @foreach ($portboxnavs as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="portboxnav_id" />
                        </div>
                    </div>
                    {{-- @endif --}}
                @endif

                <div class="w-full">
                    <x-label value="Teléfono" />
                    <x-input class="w-full block" wire:model.defer="network.telefono" type="number"
                        step="1" />
                    <x-input-error for="network.telefono" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="Precio" />
                        <x-input class="w-full block" wire:model.defer="network.price" type="number" min="0"
                            step="0.01" />
                        <x-input-error for="network.price" />
                    </div>
                    <div class="w-full">
                        <x-label value="Fecha alta" />
                        <x-input class="w-full block" value="{{ formatDate($network->date, 'Y-MM-DD') }}"
                            type="date" />
                        <x-input-error for="network.date" />
                    </div>
                </div>

                <div class="w-full">
                    <x-label value="Dirección de instalación" />
                    <x-input class="w-full block" wire:model.defer="network.direccion" />
                    <x-input-error for="network.direccion" />
                </div>

                <div class="text-end">
                    {{-- {{ print_r($errors->all()) }} --}}
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('editnetwork', () => ({
                type: @entangle('typetoggle').defer,

            }))
        })


        function confirmDeleteNetwork(network) {
            Swal.fire({
                title: 'Eliminar registro del servicio de ' + network.type + ' ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo todos sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                cancelButtonText: 'CANCELAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(network.id);
                }
            })
        }
    </script>

</div>
