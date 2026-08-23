<div>
    <!-- Full viewport elegant loading overlay -->
    <x-loading-overlay />


    <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-xs">
            <x-label value="Buscar cliente" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>
        {{-- <div class="w-full max-w-xs">
            <x-label value="Filtrar mes" />
            <x-input class="w-full block" wire:model.lazy="searchmonth" type="month" />
        </div> --}}
        <div class="w-full max-w-48">
            <x-label value="Tipo servicio" />
            <x-select-input class="w-full" wire:model.lazy="searchtype">
                <option value="">TODOS</option>
                <option value="{{ \App\Models\Network::TV }}">{{ \App\Models\Network::TV }}</option>
                <option value="{{ \App\Models\Network::FIBRA }}">{{ \App\Models\Network::FIBRA }}</option>
                <option value="{{ \App\Models\Network::FIBRA_TV }}">{{ \App\Models\Network::FIBRA_TV }}</option>
                <option value="{{ \App\Models\Network::SATELITAL }}">{{ \App\Models\Network::SATELITAL }}</option>
            </x-select-input>
        </div>
        <div class="w-full max-w-48">
            <x-label value="Estado" />
            <x-select-input class="w-full" wire:model.lazy="searchstatus">
                <option value="">TODOS</option>
                <option value="{{ \App\Models\Network::ACTIVO }}">ACTIVO</option>
                <option value="{{ \App\Models\Network::SUSPENDIDO }}">SUSPENDIDO</option>
            </x-select-input>
        </div>
        <div class="w-full max-w-48">
            <x-label value="Seleccionar Lugar" />
            <x-select-input class="w-full" wire:model.lazy="searchlocation">
                <option value="">TODOS LOS LUGARES</option>
                @foreach ($locations as $id => $district)
                    <option value="{{ $id }}">{{ $district }}</option>
                @endforeach
            </x-select-input>
        </div>
        <div class="flex items-end gap-2 ml-auto">
            <button type="button" wire:click="exportExcel" wire:loading.attr="disabled"
                class="inline-flex items-center justify-center p-2 bg-emerald-600 dark:bg-emerald-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors gap-1 shadow-sm h-[38px] min-h-[38px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                EXCEL
            </button>
            <x-danger-button wire:click="exportPdf" wire:loading.attr="disabled"
                class="inline-flex items-center justify-center h-[38px] min-h-[38px] gap-1 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                PDF
            </x-danger-button>
        </div>
    </div>

    <div class="w-full">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>COD. SERVICIO</th>
                    <th style="min-width: 100px;">FECHA ALTA</th>
                    <th style="min-width: 240px;" class="text-left">CLIENTE</th>
                    <th style="min-width: 150px;">TIPO SERVICIO</th>
                    <th style="min-width: 150px;">CONEXIÓN</th>
                    {{-- <th>DESCRIPCIÓN</th> --}}
                    <th style="min-width: 100px;">PRECIO</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($clientnetworks) > 0)
                    @foreach ($clientnetworks as $item)
                        <tr>
                            <td class="text-center">
                                <a class="text-xs inline-flex gap-1 items-center justify-center text-blue-500 hover:text-blue-800 duration-150 transition-colors"
                                    title="Ver detalle" href="{{ route('admin.network.show', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-4">
                                        <path
                                            d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                    </svg>
                                    <span class="flex-1 flex flex-col gap-1 items-center justify-center">
                                        @if ($item->codigo_slp)
                                            <span
                                                class="text-[9px] border bg-blue-50 border-blue-300 dark:bg-blue-900/50 dark:border-blue-500 dark:text-blue-100 rounded-lg p-0.5 whitespace-nowrap">
                                                {{ $item->codigo_slp }}
                                            </span>
                                        @endif
                                        {{ $item->code }}
                                    </span>
                                </a>
                            </td>
                            <td class="text-center uppercase w-[100px]">
                                {{ formatDate($item->date, 'DD MMM YYYY') }}
                            </td>
                            <td class="text-left">
                                <p>
                                    <span class="font-bold text-neutral-600 dark:text-neutral-300">
                                        [{{ $item->client->document }}]
                                    </span>
                                    {{ $item->client->name }}
                                </p>
                                <p class="text-green-600 dark:text-green-500 flex items-center gap-1 font-medium mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3">
                                        <path fill-rule="evenodd"
                                            d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $item->telefono ? implode(' ', str_split($item->telefono, 3)) : '' }}
                                </p>

                                <p class="text-[10px] text-neutral-600 dark:text-neutral-400">
                                    @if ($item->direccion)
                                        {{ $item->direccion }}
                                    @endif

                                    @if ($item->ubigeo)
                                        - {{ $item->ubigeo->distrito }} -
                                        {{ $item->ubigeo->provincia }}
                                    @endif
                                </p>                                
                            </td>
                            {{-- <td class="text-center">{{ $item->portnumber }}</td> --}}
                            {{-- <td class="text-center uppercase">{{ formatDate($item->datepayment) }}</td> --}}
                            <td class="text-center">
                                {{ $item->type }}
                            </td>
                            <td class="text-center">
                                @if ($item->networkable)
                                    @if ($item->isSatelital())
                                        <p class="text-[10px] text-neutral-500">
                                            {{ $item->networkable->name }}
                                        </p>
                                        <p>{{ $item->networkable->direccion }}</p>
                                    @else
                                        <p class="text-[10px] text-neutral-500">
                                            {{ $item->networkable->boxnav?->spliter?->olt?->name }} »
                                            {{ $item->networkable->boxnav?->spliter?->name }} »
                                            {{ $item->networkable->boxnav?->name }}
                                        </p>
                                        <p class="font-medium text-xs">
                                            {{ $item->networkable->alias ?: $item->networkable->code }}
                                        </p>
                                    @endif
                                @endif
                            </td>
                            {{-- <td class="text-left">
                                {{ $item->descripcion }}
                            </td> --}}
                            <td class="text-center">S/.
                                {{ number_format($item->price, 2, '.', ', ') }}
                            </td>
                            <td class="text-center align-middle">
                                @if ($item->isSuspendido())
                                    <span
                                        class="bg-rose-500 dark:bg-rose-600 inline-block mb-1 text-white text-[9px] font-bold p-1 px-1.5 rounded tracking-wider">
                                        SUSPENDIDO</span>
                                @else
                                    <span
                                        class="bg-emerald-500 dark:bg-emerald-600 inline-block mb-1 text-white text-[9px] font-bold p-1 px-1.5 rounded tracking-wider">
                                        ACTIVO</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-1">
                                    @if ($item->isSuspendido())
                                        <x-button wire:click="reconectar({{ $item->id }})"
                                            wire:loading.attr="disabled"
                                            class="!bg-emerald-600 hover:!bg-emerald-700 dark:!bg-emerald-600 dark:hover:!bg-emerald-500 !text-white !py-1.5 !text-[10px] shadow-sm transition-all">
                                            RECONECTAR
                                        </x-button>
                                    @else
                                        <x-button wire:click="suspender({{ $item->id }})"
                                            wire:loading.attr="disabled"
                                            class="!bg-orange-500 hover:!bg-orange-600 dark:!bg-orange-600 dark:hover:!bg-orange-500 !text-white !py-1.5 !text-[10px] shadow-sm transition-all">
                                            SUSPENDER
                                        </x-button>
                                    @endif

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
                                        wire:loading.attr="disabled" wire:key="delete_{{ $item->id }}"
                                        title="Eliminar"
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
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>

    @if ($clientnetworks->hasPages())
        <div class="sticky bottom-2 z-10 w-full mt-4">
            {{ $clientnetworks->links() }}
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="4xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CLIENTE INTERNET</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" class="w-full grid grid-cols-1 gap-2" x-data="editnetwork">
                @if ($client_id)
                    <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-3"
                        wire:key="client_edit_{{ $client_id }}">
                        <div class="w-full">
                            <x-label value="Documento (DNI/RUC)" />
                            <span
                                class="w-full block p-1.5 bg-gray-100 dark:bg-neutral-900 border border-gray-300 dark:border-neutral-700 rounded-lg text-[10px] text-gray-600 dark:text-gray-400 font-semibold select-all shadow-sm">
                                {{ $client_document }}
                            </span>
                        </div>
                        <div class="w-full md:col-span-2">
                            <x-label value="Nombre del cliente / Razón Social" />
                            <x-input class="w-full block text-xs uppercase rounded-lg !p-1.5"
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
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_fibra" value="{{ \App\Models\Network::FIBRA }}" />
                            <label for="edit_fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_fibra_tv" value="{{ \App\Models\Network::FIBRA_TV }}" />
                            <label for="edit_fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="edittype" wire:model="network.type"
                                id="edit_satelital" value="{{ \App\Models\Network::SATELITAL }}" />
                            <label for="edit_satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="network.type" />
                </div>

                @if ($network->type && !validarFibra($network->type))
                    @php
                        $editAntenas = collect($antenas)->map(function ($item) use ($actual_antena_id) {
                            return [
                                'id' => $item->id,
                                'label' => $item->name . ($actual_antena_id == $item->id ? ' (ACTUAL)' : ''),
                            ];
                        });
                    @endphp
                    <div wire:key="edit-antena-loading-container"
                        wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="network.type, antena_id" class="w-full transition-all duration-200">
                        <x-label value="Seleccionar Antena (Inalámbrico / Radio)" />
                        <x-ubigeo-select wire:model.defer="antena_id" wire:key="edit-select-antena" :options="$editAntenas"
                            :searchable="false" placeholder="SELECCIONAR ANTENA..." class="w-full block mt-1.5" />
                        <x-input-error for="antena_id" />
                    </div>
                @elseif ($network->type && validarFibra($network->type))
                    @php
                        $editOlts = collect($olts)->map(function ($item) use ($actual_olt_id) {
                            return [
                                'id' => $item->id,
                                'label' => $item->name . ($actual_olt_id == $item->id ? ' (Actual)' : ''),
                            ];
                        });
                        $editSpliters = collect($spliters)->map(function ($item) use ($actual_spliter_id) {
                            return [
                                'id' => $item->id,
                                'label' => $item->name . ($actual_spliter_id == $item->id ? ' (Actual)' : ''),
                            ];
                        });
                        $editBoxnavs = collect($boxnavs)->map(function ($item) use ($actual_boxnav_id) {
                            return [
                                'id' => $item->id,
                                'label' => $item->name . ($actual_boxnav_id == $item->id ? ' (Actual)' : ''),
                            ];
                        });
                        $editPortboxnavs = collect($portboxnavs)->map(function ($item) use ($actual_port_id) {
                            $label = $item->code;
                            if ($item->alias) {
                                $label .= ' - ' . $item->alias;
                            }
                            if ($actual_port_id == $item->id) {
                                $label .= ' (Actual)';
                            } elseif ($item->network) {
                                $label .= ' (Ocupado)';
                            }
                            return [
                                'id' => $item->id,
                                'label' => $label,
                            ];
                        });
                    @endphp
                    <div wire:key="edit-fiber-loading-container"
                        wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]"
                        wire:target="network.type, olt_id, spliter_id, boxnav_id, portboxnav_id"
                        class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 transition-all duration-200">
                        {{-- PASO 1: OLT --}}
                        <div>
                            <x-label value="1. Seleccionar OLT"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                            @if (count($olts) > 0)
                                <x-ubigeo-select wire:model="olt_id" wire:key="edit-select-olt" :options="$editOlts"
                                    :searchable="false" placeholder="SELECCIONAR OLT..." class="w-full" />
                            @else
                                <p class="text-xs text-gray-400">No hay OLTs registradas.</p>
                            @endif
                            <x-input-error for="olt_id" />
                        </div>

                        {{-- PASO 2: SPLITTER --}}
                        <div>
                            <x-label value="2. Seleccionar Splitter"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                            <x-ubigeo-select wire:model="spliter_id" wire:key="edit-select-splitter" :options="$editSpliters"
                                :searchable="true" placeholder="SELECCIONAR SPLITTER..." class="w-full" />
                            <x-input-error for="spliter_id" />
                        </div>

                        {{-- PASO 3: CAJA NAP --}}
                        <div>
                            <x-label value="3. Seleccionar Caja NAP"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                            <x-ubigeo-select wire:model="boxnav_id" wire:key="edit-select-boxnav" :options="$editBoxnavs"
                                :searchable="false" placeholder="SELECCIONAR CAJA NAP..." class="w-full" />
                            <x-input-error for="boxnav_id" />
                        </div>

                        {{-- PASO 4: PUERTOS --}}
                        <div>
                            <x-label value="4. Seleccionar Puerto"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
                            <x-ubigeo-select wire:model="portboxnav_id" wire:key="edit-select-portboxnav"
                                :options="$editPortboxnavs" :searchable="false" placeholder="SELECCIONAR PUERTO..."
                                class="w-full" />
                            <x-input-error for="portboxnav_id" />
                        </div>
                    </div>
                @endif

                <div class="w-full grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4">
                    <div class="w-full">
                        <x-label value="CÓDIGO SLP" />
                        <x-input class="w-full block" wire:model.defer="network.codigo_slp" />
                        <x-input-error for="network.codigo_slp" />
                    </div>
                    <div class="w-full">
                        <x-label value="Teléfono" />
                        <x-input class="w-full block" wire:model.defer="network.telefono" type="number"
                            step="1" />
                        <x-input-error for="network.telefono" />
                    </div>
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

                <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-2">
                    <div class="w-full">
                        <x-label value="Lugar / Ubigeo" />
                        <x-ubigeo-select wire:model.defer="network.ubigeo_id" :options="$ubigeos" />
                        <x-input-error for="network.ubigeo_id" />
                    </div>
                    <div class="w-full">
                        <x-label value="Dirección de instalación" />
                        <x-input class="w-full block" wire:model.defer="network.direccion" />
                        <x-input-error for="network.direccion" />
                    </div>
                </div>

                <div class="w-full">
                    <x-label value="Ubicación en el Mapa" />
                    <div x-data="leafletMapEdit()">
                        <div wire:ignore
                            class="w-full relative rounded-lg overflow-hidden border border-gray-300 dark:border-neutral-700 z-0">
                            <div class="absolute top-2 left-[50px] z-[400] w-[200px] sm:w-[250px]">
                                <div
                                    class="relative bg-white/95 dark:bg-neutral-800/95 backdrop-blur-sm rounded-lg shadow-md border border-gray-200 dark:border-neutral-600 flex items-center">
                                    <input type="text" x-model="searchQuery" @keydown.enter.prevent="searchPlace"
                                        class="w-full bg-transparent border-none focus:ring-0 text-[11px] px-3 py-1.5 text-gray-700 dark:text-gray-200 placeholder-gray-400 rounded-l-lg"
                                        placeholder="Buscar lugar..." />
                                    <button type="button" @click="searchPlace"
                                        class="p-1.5 mr-0.5 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                        <svg x-show="!isSearching" xmlns="http://www.w3.org/2000/svg"
                                            class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <svg x-show="isSearching" style="display: none;"
                                            class="animate-spin h-3.5 w-3.5 text-blue-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <style>
                                .leaflet-control-layers {
                                    border-radius: 0.5rem !important;
                                    border: 1px solid #e5e7eb !important;
                                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
                                    background-color: rgba(255, 255, 255, 0.95) !important;
                                    backdrop-filter: blur(4px) !important;
                                }

                                .leaflet-control-layers-expanded {
                                    padding: 8px 12px !important;
                                }

                                .leaflet-control-layers label {
                                    display: flex !important;
                                    align-items: center !important;
                                    gap: 6px !important;
                                    font-size: 0.75rem !important;
                                    font-family: inherit !important;
                                    font-weight: 600 !important;
                                    color: #374151 !important;
                                    cursor: pointer !important;
                                    margin-bottom: 6px !important;
                                    transition: color 0.15s ease-in-out;
                                }

                                .leaflet-control-layers label:hover {
                                    color: #111827 !important;
                                }

                                .leaflet-control-layers-selector {
                                    margin: 0 !important;
                                    cursor: pointer !important;
                                    accent-color: #3b82f6 !important;
                                    width: 14px;
                                    height: 14px;
                                }

                                .dark .leaflet-control-layers {
                                    border-color: #404040 !important;
                                    background-color: rgba(38, 38, 38, 0.95) !important;
                                }

                                .dark .leaflet-control-layers label {
                                    color: #d4d4d8 !important;
                                }

                                .dark .leaflet-control-layers label:hover {
                                    color: #ffffff !important;
                                }
                            </style>
                            <div id="map-edit" class="w-full h-[250px] z-0"></div>
                            <div class="absolute bottom-2 right-2 z-[400] flex flex-col gap-1">
                                <button type="button" @click="locateMe"
                                    class="bg-white/85 dark:bg-neutral-800 text-gray-800 dark:text-gray-200 p-2 rounded-lg shadow-md hover:bg-gray-50 dark:hover:bg-neutral-700 text-[10px] font-bold flex items-center gap-1 border border-gray-200 dark:border-neutral-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-red-600 dark:text-red-400" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{-- UBICARME --}}
                                </button>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                            <div class="w-full">
                                <x-label value="Latitud" />
                                <x-input class="w-full block text-sm" x-model="lat" @input="updateFromInput" />
                                <x-input-error for="network.latitude" />
                            </div>
                            <div class="w-full">
                                <x-label value="Longitud" />
                                <x-input class="w-full block text-sm" x-model="lng" @input="updateFromInput" />
                                <x-input-error for="network.longitude" />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="text-end sticky -bottom-4 bg-white dark:bg-neutral-800 pb-4 pt-4 border-t border-gray-200 dark:border-neutral-700/60 z-10">
                    {{-- {{ print_r($errors->all()) }} --}}
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('editnetwork', () => ({
                type: @entangle('typetoggle').defer,

            }))

            Alpine.data('leafletMapEdit', () => ({
                openModal: @entangle('open'),
                lat: @entangle('network.latitude').defer,
                lng: @entangle('network.longitude').defer,
                zoom: @entangle('network.zoom').defer,
                searchQuery: '',
                isSearching: false,
                mapInitialized: false,
                init() {
                    if (this.openModal) {
                        setTimeout(() => this.initializeMapNow(), 300);
                    }
                    this.$watch('lat', () => {
                        if (this.mapInitialized && this.map) {
                            this.updateMapView();
                        }
                    });
                    this.$watch('lng', () => {
                        if (this.mapInitialized && this.map) {
                            this.updateMapView();
                        }
                    });
                    this.$watch('openModal', (isOpen) => {
                        if (isOpen) {
                            setTimeout(() => {
                                this.initializeMapNow();
                            }, 350);
                        } else {
                            this.destroyMap();
                        }
                    });
                },
                destroyMap() {
                    if (this.map) {
                        this.map.off();
                        this.map.remove();
                        this.map = null;
                    }
                    this.marker = null;
                    this.mapInitialized = false;

                    let container = document.getElementById('map-edit');
                    if (container) {
                        container._leaflet_map = null;
                        container._leaflet_marker = null;
                    }
                },
                initializeMapNow() {
                    let container = document.getElementById('map-edit');
                    if (!container) return;

                    if (this.map) {
                        this.map.off();
                        this.map.remove();
                        this.map = null;
                    }
                    if (container) {
                        container.innerHTML = '';
                        container._leaflet_id = null;
                    }

                    this.initMap();
                    this.mapInitialized = true;
                    setTimeout(() => {
                        if (this.map) {
                            this.map.invalidateSize();
                            this.updateMapView();
                        }
                    }, 50);
                },
                initMap() {
                    this.redIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });

                    let defaultLat = this.lat ? parseFloat(this.lat) : -12.046374;
                    let defaultLng = this.lng ? parseFloat(this.lng) : -77.042793;
                    let initialZoom = this.zoom ? parseInt(this.zoom) : 14;

                    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    });
                    let satellite = L.tileLayer(
                        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 19,
                            attribution: '© Esri'
                        });
                    let topo = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                        maxZoom: 17,
                        attribution: '© OpenTopoMap'
                    });

                    this.map = L.map('map-edit', {
                        center: [defaultLat, defaultLng],
                        zoom: initialZoom,
                        layers: [osm],
                        attributionControl: false
                    });

                    let container = document.getElementById('map-edit');
                    if (container) {
                        container._leaflet_map = this.map;
                    }

                    L.control.layers({
                        "Calles": osm,
                        "Satélite": satellite,
                        "Relieve": topo
                    }).addTo(this.map);

                    this.map.on('click', (e) => {
                        this.updateMarker(e.latlng.lat, e.latlng.lng);
                    });

                    this.map.on('zoomend', () => {
                        this.zoom = this.map.getZoom();
                        if (this.$wire) {
                            this.$wire.set('network.zoom', this.zoom, true);
                        }
                    });
                },
                updateMapView() {
                    let viewLat = this.lat ? parseFloat(this.lat) : -12.046374;
                    let viewLng = this.lng ? parseFloat(this.lng) : -77.042793;
                    let viewZoom = this.zoom ? parseInt(this.zoom) : 14;

                    let freshIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });

                    if (!this.marker) {
                        this.marker = L.marker([viewLat, viewLng], {
                            icon: freshIcon,
                            draggable: true
                        }).addTo(this.map);

                        if (document.getElementById('map-edit')) {
                            document.getElementById('map-edit')._leaflet_marker = this.marker;
                        }

                        this.marker.on('dragend', (e) => {
                            let position = this.marker.getLatLng();
                            this.updateMarker(position.lat, position.lng);
                        });

                        if (!this.lat || !this.lng) {
                            this.locateMe();
                        }
                    } else {
                        this.marker.setIcon(freshIcon);
                        this.marker.setLatLng([viewLat, viewLng]);
                    }

                    setTimeout(() => {
                        if (this.map) {
                            this.map.invalidateSize();
                            this.map.setView([viewLat, viewLng], viewZoom);
                        }
                    }, 50);
                },
                updateMarker(lat, lng) {
                    let container = document.getElementById('map-edit');
                    if (!this.marker) {
                        this.marker = L.marker([lat, lng], {
                            icon: this.redIcon,
                            draggable: true
                        }).addTo(this.map);
                        if (container) container._leaflet_marker = this.marker;
                        this.marker.on('dragend', (e) => {
                            let position = this.marker.getLatLng();
                            this.updateMarker(position.lat, position.lng);
                        });
                    } else {
                        this.marker.setLatLng([lat, lng]);
                    }
                    let strLat = lat.toString();
                    let strLng = lng.toString();
                    this.lat = strLat;
                    this.lng = strLng;
                    if (this.$wire) {
                        this.$wire.set('network.latitude', strLat, true);
                        this.$wire.set('network.longitude', strLng, true);
                    }
                },
                searchPlace() {
                    if (!this.searchQuery.trim()) return;
                    this.isSearching = true;
                    fetch(
                            `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.searchQuery)}&countrycodes=pe&limit=1`
                        )
                        .then(response => response.json())
                        .then(data => {
                            this.isSearching = false;
                            if (data && data.length > 0) {
                                const lat = parseFloat(data[0].lat);
                                const lon = parseFloat(data[0].lon);
                                this.updateMarker(lat, lon);
                                this.map.setView([lat, lon], 17);
                            } else {
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: {
                                        title: 'Ubicación no encontrada',
                                        text: 'No se encontraron resultados para la búsqueda.',
                                        icon: 'warning'
                                    }
                                }));
                            }
                        })
                        .catch(err => {
                            this.isSearching = false;
                            console.error(err);
                            window.dispatchEvent(new CustomEvent('alert', {
                                detail: {
                                    title: 'Error de red',
                                    text: 'Hubo un problema al buscar la ubicación.',
                                    icon: 'error'
                                }
                            }));
                        });
                },
                updateFromInput() {
                    let newLat = parseFloat(this.lat);
                    let newLng = parseFloat(this.lng);
                    if (!isNaN(newLat) && !isNaN(newLng)) {
                        if (!this.marker) {
                            this.marker = L.marker([newLat, newLng], {
                                icon: this.redIcon,
                                draggable: true
                            }).addTo(this.map);
                            this.marker.on('dragend', (e) => {
                                let position = this.marker.getLatLng();
                                this.updateMarker(position.lat, position.lng);
                            });
                        } else {
                            this.marker.setLatLng([newLat, newLng]);
                        }
                        this.map.setView([newLat, newLng], this.map.getZoom());
                        if (this.$wire) {
                            this.$wire.set('network.latitude', this.lat, true);
                            this.$wire.set('network.longitude', this.lng, true);
                        }
                    }
                },
                locateMe() {
                    if ("geolocation" in navigator) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                this.updateMarker(position.coords.latitude, position.coords
                                    .longitude);
                                let zoomLevel = this.zoom ? parseInt(this.zoom) : 17;
                                this.map.setView([position.coords.latitude, position.coords
                                    .longitude
                                ], zoomLevel);
                            },
                            (error) => {
                                let msg = "Error al obtener ubicación.";
                                if (error.code === error.PERMISSION_DENIED) {
                                    msg =
                                        "Permiso de ubicación denegado. En entornos de desarrollo locales (como Laragon sin SSL), los navegadores bloquean la ubicación. Usa 'localhost' en lugar de tu dominio virtual, o configura SSL.";
                                } else if (error.code === error.POSITION_UNAVAILABLE) {
                                    msg = "La información de la ubicación no está disponible.";
                                } else if (error.code === error.TIMEOUT) {
                                    msg = "El tiempo para obtener la ubicación se ha agotado.";
                                }
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: {
                                        title: 'Ubicación fallida',
                                        text: msg,
                                        icon: 'warning'
                                    }
                                }));
                            }, {
                                enableHighAccuracy: true,
                                timeout: 5000,
                                maximumAge: 0
                            }
                        );
                    } else {
                        window.dispatchEvent(new CustomEvent('alert', {
                            detail: {
                                title: 'Geolocalización restringida',
                                text: 'Tu navegador no soporta la geolocalización o está bloqueada por falta de HTTPS (SSL).',
                                icon: 'error'
                            }
                        }));
                    }
                }
            }));
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
