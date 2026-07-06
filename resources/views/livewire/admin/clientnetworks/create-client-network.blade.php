<div>
    <x-button wire:click="$set('open', true)">
        REGISTRAR CLIENTE INTERNET</x-button>

    <x-dialog-modal wire:model="open" maxWidth="2xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR CLIENTE INTERNET</h1>
            <button wire:click="$set('open', false)"
                class="rounded-lg text-gray-700 p-2.5 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="w-full grid grid-cols-1 gap-2" x-data="network">
                <div class="w-full">
                    <x-label value="Documento cliente" />
                    <div class="w-full flex gap-1">
                        <x-input class="w-full flex-1 block" wire:model.defer="document" maxlength="11"
                            wire:keydown.enter="buscar" />
                        <x-button class="text-white !px-2 flex-shrink-0 !p-1.5" wire:click="buscar"
                            wire:loading.attr="disabled" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-4 block mx-auto">
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
                    <div class="flex items-center justify-between mb-1">
                        <x-label value="Tipo servicio" class="mb-0" />
                    </div>
                    <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]" wire:target="type"
                        class="w-full flex flex-wrap gap-2 transition-all duration-200">
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="tv"
                                value="{{ \App\Models\Network::TV }}" />
                            <label for="tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="fibra"
                                value="{{ \App\Models\Network::FIBRA }}" />
                            <label for="fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="fibra_tv"
                                value="{{ \App\Models\Network::FIBRA_TV }}" />
                            <label for="fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="satelital"
                                value="{{ \App\Models\Network::SATELITAL }}" />
                            <label for="satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="type" />
                </div>

                @if (validarFibra($type))
                    <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="type, selectOlt, selectSpliter, selectBoxnav, selectPort"
                        class="w-full bg-gray-50 dark:bg-neutral-900/60 p-3 rounded-xl border border-gray-200 dark:border-neutral-700/60 space-y-4 transition-all duration-200">
                        {{-- PASO 1: OLT --}}
                        <div>
                            <x-label value="1. Seleccionar OLT"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                            @if (count($olts) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($olts as $item)
                                        <button type="button" wire:key="olt-{{ $item->id }}"
                                            wire:click="selectOlt({{ $item->id }})"
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium border flex items-center gap-1.5 transition-all shadow-sm {{ $olt_id == $item->id ? 'bg-neutral-600 dark:bg-neutral-700 border-neutral-600 dark:border-neutral-700 text-white shadow-neutral-500/20 shadow-md ring-2 ring-neutral-400 dark:ring-neutral-500' : 'bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700/80' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                            </svg>
                                            <span>{{ $item->name }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-xs text-gray-400">No hay OLTs registradas.</p>
                            @endif
                            <x-input-error for="olt_id" />
                        </div>

                        {{-- PASO 2: SPLITTER (Solo visible si hay OLT seleccionada) --}}
                        @if ($olt_id && count($spliters) > 0)
                            <div class="border-t border-gray-200 dark:border-neutral-700/60 pt-3">
                                <x-label value="2. Seleccionar Splitter"
                                    class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($spliters as $item)
                                        <button type="button" wire:key="spliter-{{ $item->id }}"
                                            wire:click="selectSpliter({{ $item->id }})"
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium border flex items-center gap-1.5 transition-all shadow-sm {{ $spliter_id == $item->id ? 'bg-neutral-600 dark:bg-neutral-700 border-neutral-600 dark:border-neutral-700 text-white shadow-neutral-500/20 shadow-md ring-2 ring-neutral-400 dark:ring-neutral-500' : 'bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700/80' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            <span>{{ $item->name }}</span>
                                        </button>
                                    @endforeach
                                </div>
                                <x-input-error for="spliter_id" />
                            </div>
                        @elseif ($olt_id)
                            <div
                                class="border-t border-gray-200 dark:border-neutral-700/60 pt-3 text-xs text-amber-600 dark:text-amber-400">
                                Esta OLT no tiene Splitters disponibles.
                            </div>
                        @endif

                        {{-- PASO 3: CAJA NAP (Solo visible si hay Splitter seleccionado) --}}
                        @if ($spliter_id && count($boxnavs) > 0)
                            <div class="border-t border-gray-200 dark:border-neutral-700/60 pt-3">
                                <x-label value="3. Seleccionar Caja NAP"
                                    class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($boxnavs as $item)
                                        <button type="button" wire:key="boxnav-{{ $item->id }}"
                                            wire:click="selectBoxnav({{ $item->id }})"
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium border flex items-center gap-1.5 transition-all shadow-sm {{ $boxnav_id == $item->id ? 'bg-neutral-600 dark:bg-neutral-700 border-neutral-600 dark:border-neutral-700 text-white shadow-neutral-500/20 shadow-md ring-2 ring-neutral-400 dark:ring-neutral-500' : 'bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700/80' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                            <span>{{ $item->name }}</span>
                                        </button>
                                    @endforeach
                                </div>
                                <x-input-error for="boxnav_id" />
                            </div>
                        @elseif ($spliter_id)
                            <div
                                class="border-t border-gray-200 dark:border-neutral-700/60 pt-3 text-xs text-amber-600 dark:text-amber-400">
                                Este Splitter no tiene Cajas NAP disponibles.
                            </div>
                        @endif

                        {{-- PASO 4: PUERTOS (Grid Visual de Hardware) --}}
                        @if ($boxnav_id && count($portboxnavs) > 0)
                            <div class="border-t border-gray-200 dark:border-neutral-700/60 pt-3">
                                <div class="flex items-center justify-between mb-2">
                                    <x-label value="4. Seleccionar Puerto"
                                        class="text-xs font-semibold text-gray-700 dark:text-gray-300" />
                                    <div class="flex items-center gap-3 text-[10px]">
                                        <span class="flex items-center gap-1"><span
                                                class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                                            Disponible</span>
                                        <span class="flex items-center gap-1"><span
                                                class="w-2.5 h-2.5 rounded-full bg-rose-500 inline-block"></span>
                                            Ocupado</span>
                                        <span class="flex items-center gap-1"><span
                                                class="w-2.5 h-2.5 rounded-full bg-neutral-600 dark:bg-neutral-500 inline-block"></span>
                                            Seleccionado</span>
                                    </div>
                                </div>
                                <div
                                    class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-2 p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-inner">
                                    @foreach ($portboxnavs as $item)
                                        @php $ocupado = $item->network ? true : false; @endphp
                                        <button type="button" wire:key="port-{{ $item->id }}"
                                            wire:click="selectPort({{ $item->id }})"
                                            title="{{ $ocupado ? 'Puerto Ocupado' : 'Puerto Disponible: ' . $item->code }}"
                                            class="relative py-2 px-1 rounded-lg text-xs font-bold border flex flex-col items-center justify-center gap-0.5 transition-all {{ $portboxnav_id == $item->id ? 'bg-neutral-600 dark:bg-neutral-700 border-neutral-600 dark:border-neutral-700 text-white shadow-md ring-2 ring-neutral-400 dark:ring-neutral-500 scale-105 z-10' : ($ocupado ? 'bg-rose-50 dark:bg-rose-950/40 border-rose-200 dark:border-rose-800/60 text-rose-500 dark:text-rose-400 opacity-60 cursor-not-allowed' : 'bg-emerald-50 dark:bg-emerald-950/40 border-emerald-300 dark:border-emerald-700/80 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-100 dark:hover:bg-emerald-900/60 hover:scale-105 cursor-pointer shadow-sm') }}">
                                            <span
                                                class="text-[10px] uppercase font-semibold leading-none">{{ $item->code }}</span>
                                            @if ($ocupado)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3.5 h-3.5 text-rose-500 dark:text-rose-400 mt-0.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            @elseif ($portboxnav_id == $item->id)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3.5 h-3.5 text-white mt-0.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            @else
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-1 inline-block"></span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>
                                <x-input-error for="portboxnav_id" />
                            </div>
                        @elseif ($boxnav_id)
                            <div
                                class="border-t border-gray-200 dark:border-neutral-700/60 pt-3 text-xs text-amber-600 dark:text-amber-400">
                                Esta Caja NAP no tiene puertos registrados.
                            </div>
                        @endif
                    </div>
                @elseif ($type && !validarFibra($type))
                    <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="type, antena_id"
                        class="w-full bg-gray-50 dark:bg-neutral-900/60 p-3 rounded-xl border border-gray-200 dark:border-neutral-700/60 space-y-2 transition-all duration-200">
                        <x-label value="Seleccionar Antena (Inalámbrico / Radio)"
                            class="text-xs font-semibold text-gray-700 dark:text-gray-300" />
                        <x-select-input class="w-full block" wire:model.defer="antena_id">
                            <option value="">SELECCIONAR ANTENA...</option>
                            @if (count($antenas) > 0)
                                @foreach ($antenas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </x-select-input>
                        <x-input-error for="antena_id" />
                    </div>
                @endif



                {{-- <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="descripcion" />
                    <x-input-error for="descripcion" />
                </div> --}}

                <div class="w-full">
                    <x-label value="Teléfono" />
                    <x-input class="w-full block" wire:model.defer="telefono" type="number" step="1" />
                    <x-input-error for="telefono" />
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
                        <x-select-input class="w-full block" wire:model.defer="tipoentrega">
                            <option value="">SELECCIONAR...</option>
                            <option value="{{ \App\Models\Network::ALQUILADO }}">
                                {{ \App\Models\Network::EQUIPO_ALQUILADO }}
                            </option>
                            <option value="{{ \App\Models\Network::EQUIPO_VENDIDO }}">
                                {{ \App\Models\Network::EQUIPO_VENDIDO }}</option>
                        </x-select-input>
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
