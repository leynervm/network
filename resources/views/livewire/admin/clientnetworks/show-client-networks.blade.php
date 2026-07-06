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
            <x-select-input class="w-full" wire:model.lazy="searchtype">
                <option value="">SELECCIONAR...</option>
                <option value="{{ \App\Models\Network::TV }}">{{ \App\Models\Network::TV }}</option>
                <option value="{{ \App\Models\Network::FIBRA }}">{{ \App\Models\Network::FIBRA }}</option>
                <option value="{{ \App\Models\Network::FIBRA_TV }}">{{ \App\Models\Network::FIBRA_TV }}</option>
                <option value="{{ \App\Models\Network::SATELITAL }}">{{ \App\Models\Network::SATELITAL }}</option>
            </x-select-input>
        </div>
    </div>

    <div class="w-full">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>COD. SERVICIO</th>
                    <th>FECHA ALTA</th>
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
                            <td class="text-center">{{ $item->code }}</td>
                            <td class="text-center uppercase w-[100px]">{{ formatDate($item->date) }}</td>
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
                                        class="bg-rose-500 dark:bg-rose-600 inline-block mb-1 text-white text-[9px] font-bold p-1 px-1.5 rounded tracking-wider">
                                        SUSPENDIDO</span>

                                    <x-button wire:click="reconectar({{ $item->id }})"
                                        wire:loading.attr="disabled"
                                        class="!bg-emerald-600 hover:!bg-emerald-700 dark:!bg-emerald-600 dark:hover:!bg-emerald-500 !text-white !px-2 !text-[10px] shadow-sm transition-all">
                                        RECONECTAR
                                    </x-button>
                                @else
                                    <span
                                        class="bg-emerald-500 dark:bg-emerald-600 inline-block mb-1 text-white text-[9px] font-bold p-1 px-1.5 rounded tracking-wider">
                                        ACTIVO</span>

                                    <x-button wire:click="suspender({{ $item->id }})"
                                        wire:loading.attr="disabled"
                                        class="!bg-orange-500 hover:!bg-orange-600 dark:!bg-orange-600 dark:hover:!bg-orange-500 !text-white !px-2 !text-[10px] shadow-sm transition-all">
                                        SUSPENDER
                                    </x-button>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                        wire:key="edit_{{ $item->id }}" title="Editar"
                                        class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>

                                    <button type="button" onclick="confirmDeleteNetwork({{ $item }})"
                                        wire:loading.attr="disabled" wire:key="delete_{{ $item->id }}" title="Eliminar"
                                        class="inline-block p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white duration-150 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="size-4 block mx-auto">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </button>

                                    <a class="inline-block p-1 rounded-md text-neutral-500 hover:bg-neutral-500 hover:text-white duration-150 transition-colors"
                                        title="Ver detalle" href="{{ route('admin.network.show', $item->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
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
                @if ($client_id)
                    <div class="w-full grid lg:grid-cols-2 gap-2" wire:key="client_edit_{{ $client_id }}">
                        <div class="w-full">
                            <x-label value="Documento (DNI/RUC)" />
                            <span
                                class="w-full block p-1.5 bg-gray-100 dark:bg-neutral-900 border border-gray-300 dark:border-neutral-700 rounded-lg text-[10px] text-gray-600 dark:text-gray-400 font-semibold select-all shadow-sm">
                                {{ $client_document }}
                            </span>
                        </div>
                        <div class="w-full">
                            <x-label value="Nombre del cliente / Razón Social" />
                            <x-input class="w-full block text-xs uppercase rounded-lg"
                                wire:model.defer="client_name" />
                            <x-input-error for="client_name" />
                        </div>
                    </div>
                @endif

                <div>
                    <x-label value="Tipo servicio" />
                    <div class="flex flex-wrap items-center gap-2">
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_tv" value="{{ \App\Models\Network::TV }}" />
                            <label for="edit_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_fibra" value="{{ \App\Models\Network::FIBRA }}" />
                            <label for="edit_fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_fibra_tv" value="{{ \App\Models\Network::FIBRA_TV }}" />
                            <label for="edit_fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_satelital" value="{{ \App\Models\Network::SATELITAL }}" />
                            <label for="edit_satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="network.type" />
                </div>

                @if ($network->type && !validarFibra($network->type))
                    <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="network.type, antena_id"
                        class="w-full bg-gray-50 dark:bg-neutral-900/60 p-3 rounded-xl border border-gray-200 dark:border-neutral-700/60 space-y-2 transition-all duration-200">
                        <x-label value="Seleccionar Antena (Inalámbrico / Radio)"
                            class="text-xs font-semibold text-gray-700 dark:text-gray-300" />
                        <x-select-input class="w-full block" wire:model.defer="antena_id">
                            <option value="">SELECCIONAR ANTENA...</option>
                            @if (count($antenas) > 0)
                                @foreach ($antenas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                        {{ $actual_antena_id == $item->id ? '(ACTUAL)' : '' }}</option>
                                @endforeach
                            @endif
                        </x-select-input>
                        <x-input-error for="antena_id" />
                    </div>
                @elseif ($network->type && validarFibra($network->type))
                    <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="network.type, selectOlt, selectSpliter, selectBoxnav, selectPort"
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
                                            @if ($actual_olt_id == $item->id)
                                                <span
                                                    class="text-[9px] px-1.5 py-0.5 rounded font-bold uppercase tracking-wider {{ $olt_id == $item->id ? 'bg-white/20 text-white' : 'bg-amber-100 dark:bg-amber-900/60 text-amber-700 dark:text-amber-300 border border-amber-300 dark:border-amber-700' }}">Actual</span>
                                            @endif
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
                                            @if ($actual_spliter_id == $item->id)
                                                <span
                                                    class="text-[9px] px-1.5 py-0.5 rounded font-bold uppercase tracking-wider {{ $spliter_id == $item->id ? 'bg-white/20 text-white' : 'bg-amber-100 dark:bg-amber-900/60 text-amber-700 dark:text-amber-300 border border-amber-300 dark:border-amber-700' }}">Actual</span>
                                            @endif
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
                                            @if ($actual_boxnav_id == $item->id)
                                                <span
                                                    class="text-[9px] px-1.5 py-0.5 rounded font-bold uppercase tracking-wider {{ $boxnav_id == $item->id ? 'bg-white/20 text-white' : 'bg-amber-100 dark:bg-amber-900/60 text-amber-700 dark:text-amber-300 border border-amber-300 dark:border-amber-700' }}">Actual</span>
                                            @endif
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
                                                class="w-2.5 h-2.5 rounded-full bg-amber-500 inline-block"></span>
                                            Actual</span>
                                        <span class="flex items-center gap-1"><span
                                                class="w-2.5 h-2.5 rounded-full bg-neutral-600 dark:bg-neutral-500 inline-block"></span>
                                            Seleccionado</span>
                                    </div>
                                </div>
                                <div
                                    class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-2 p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-inner">
                                    @foreach ($portboxnavs as $item)
                                        @php
                                            $es_actual = $actual_port_id == $item->id;
                                            $ocupado = $item->network && !$es_actual ? true : false;
                                        @endphp
                                        <button type="button" wire:key="port-{{ $item->id }}"
                                            wire:click="selectPort({{ $item->id }})"
                                            title="{{ $es_actual ? 'Puerto Actual del Cliente: ' . $item->code : ($ocupado ? 'Puerto Ocupado' : 'Puerto Disponible: ' . $item->code) }}"
                                            class="relative py-2 px-1 rounded-lg text-xs font-bold border flex flex-col items-center justify-center gap-0.5 transition-all {{ $portboxnav_id == $item->id ? 'bg-neutral-600 dark:bg-neutral-700 border-neutral-600 dark:border-neutral-700 text-white shadow-md ring-2 ring-neutral-400 dark:ring-neutral-500 scale-105 z-10' : ($es_actual ? 'bg-amber-100 dark:bg-amber-900/40 border-amber-400 dark:border-amber-600 text-amber-800 dark:text-amber-200 hover:bg-amber-200 dark:hover:bg-amber-900/60 hover:scale-105 cursor-pointer shadow-sm' : ($ocupado ? 'bg-rose-50 dark:bg-rose-950/40 border-rose-200 dark:border-rose-800/60 text-rose-500 dark:text-rose-400 opacity-60 cursor-not-allowed' : 'bg-emerald-50 dark:bg-emerald-950/40 border-emerald-300 dark:border-emerald-700/80 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-100 dark:hover:bg-emerald-900/60 hover:scale-105 cursor-pointer shadow-sm')) }}">
                                            <span
                                                class="text-[10px] uppercase font-semibold leading-none">{{ $item->code }}</span>
                                            @if ($es_actual)
                                                <span
                                                    class="text-[8px] px-1 py-0.2 rounded font-extrabold uppercase tracking-tight {{ $portboxnav_id == $item->id ? 'bg-white/20 text-white' : 'bg-amber-500 text-white' }}">Actual</span>
                                            @elseif ($ocupado)
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
