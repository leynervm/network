<div>
    <x-button wire:click="$set('open', true)">
        REGISTRAR CLIENTE INTERNET</x-button>

    <x-dialog-modal wire:model="open" maxWidth="2xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR CLIENTE INTERNET</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="w-full grid grid-cols-1 gap-2" x-data="network">
                <div class="w-full">
                    <x-label value="Documento cliente" />
                    <div class="w-full flex gap-1">
                        <x-input class="w-full block" wire:model.defer="document" maxlength="11" />
                        <x-button class="text-white px-2" wire:click="buscar" wire:loading.attr="disabled"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6 block mx-auto">
                                <path
                                    d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" />
                            </svg>
                        </x-button>
                    </div>
                    <x-input-error for="document" />
                </div>

                <div class="w-full">
                    <x-label value="Nombres cliente" />
                    <x-input class="w-full block" wire:model.defer="name" />
                    <x-input-error for="name" />
                </div>

                <div>
                    <x-label value="Tipo servicio" />
                    <div class="w-full flex flex-wrap gap-2">
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="tv" value="{{ \App\Models\Network::TV }}" @change="type = 0" />
                            <label for="tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="fibra" value="{{ \App\Models\Network::FIBRA }}" @change="type = 0" />
                            <label for="fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="fibra_tv" value="{{ \App\Models\Network::FIBRA_TV }}" @change="type = 0" />
                            <label for="fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="satelital" value="{{ \App\Models\Network::SATELITAL }}" @change="type=1" />
                            <label for="satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="type" />
                </div>

                <div class="w-full grid lg:grid-cols-2 gap-2" x-show="type=='0'" x-transition>
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

                <div class="w-full" x-show="type=='1'" x-transition>
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

                <span x-text="type"></span>

                <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="descripcion" />
                    <x-input-error for="descripcion" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="Precio" />
                        <x-input class="w-full block" wire:model.defer="price" type="number" min="0"
                            step="0.01" />
                        <x-input-error for="price" />
                    </div>

                    {{-- {{ $date }} --}}
                    <div class="w-full">
                        <x-label value="Fecha alta" />
                        <x-input class="w-full block" wire:model.defer="date" type="date"
                            value="{{ $date }}" />
                        <x-input-error for="date" />
                    </div>

                </div>

                <div class="w-full">
                    <x-label value="Dirección de instalación" />
                    <x-input class="w-full block" wire:model.defer="direccion" />
                    <x-input-error for="direccion" />
                </div>

                <label for="addequipo">
                    <x-input type="checkbox" id="addequipo" @click="addequipo = !addequipo" />
                    AGREGAR EQUIPO
                </label>

                <div class="w-full grid lg:grid-cols-2 gap-2" style="display: none;" x-show="addequipo">
                    <div class="lg:col-span-2">
                        <x-label value="Agregar equipo" />
                        <x-input class="w-full block" wire:model.defer="descripcionequipo" />
                        <x-input-error for="descripcionequipo" />
                    </div>

                    <div class="w-full">
                        <x-label value="Tipo entrega" />
                        <select class="w-full block rounded-md border-gray-300 " wire:model.defer="tipoentrega">
                            <option value="">SELECCIONAR...</option>
                            <option value="{{ \App\Models\Network::ALQUILADO }}">
                                {{ \App\Models\Network::EQUIPO_ALQUILADO }}
                            </option>
                            <option value="{{ \App\Models\Network::EQUIPO_VENDIDO }}">
                                {{ \App\Models\Network::EQUIPO_VENDIDO }}</option>
                        </select>
                        <x-input-error for="tipoentrega" />
                    </div>
                    <div class="w-full">
                        <x-label value="Precio" />
                        <x-input class="w-full block" wire:model.defer="priceequipo" type="number" step="0.01"
                            min="0" />
                        <x-input-error for="priceequipo" />
                    </div>
                    <div class="w-full">
                        <x-label value="MAC" />
                        <x-input class="w-full block" wire:model.defer="mac" maxlength="8" />
                        <x-input-error for="mac" />
                    </div>
                    <div class="lg:col-span-2 text-end">
                        <x-button type="button" wire:loading.attr="disabled" wire:click="saveequipament">
                            AGREGAR EQUIPO</x-button>
                    </div>
                </div>

                <div class="w-full" style="display: none;" x-show="addequipo">
                    <x-table>
                        <x-slot name="thead">
                            <tr>
                                <th>DESCRIPCIÓN DEL EQUIPO</th>
                                <th>TIPO ENTREGA</th>
                                <th>PRECIO</th>
                                <th class="sr-only">OPCIONES</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @if (count($equipos) > 0)
                                @foreach ($equipos as $item)
                                    <tr>
                                        <td class="text-center uppercase">
                                            {{ $item['descripcionequipo'] }}
                                            @if ($item['mac'])
                                                <p class="text-[10px]">MAC: {{ $item['mac'] }}</p>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $item['tipoentrega'] }}</td>
                                        <td class="text-center">S/. {{ $item['priceequipo'] }}</td>
                                        <td class="text-center">
                                            <x-danger-button wire:click="delete('{{ $item['id_equipo'] }}')"
                                                wire:loading.attr="disabled"
                                                wire:key="{{ $item['id_equipo'] }}">ELIMINAR</x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </x-slot>
                    </x-table>
                </div>

                <div class="text-end">
                    <x-input-error for="equipos" />
                    {{-- {{ print_r($errors->all()) }} --}}
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('network', () => ({
                type: null,
                addequipo: @entangle('addequipament').defer,
            }))
        })
    </script>
</div>
