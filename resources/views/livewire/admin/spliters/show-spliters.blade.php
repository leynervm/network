<div>
    @if (count($olt->spliters) > 0)
        <div class="w-full grid grid-cols-1 gap-4">
            @foreach ($olt->spliters as $item)
                <div class="w-full bg-white dark:bg-neutral-900 border border-gray-200 dark:border-neutral-800 rounded-xl shadow-md transition-all"
                    wire:key="spliter_{{ $item->id }}" x-data="{ openSpliter: true }" @toggle-all-spliters.window="openSpliter = $event.detail">
                    {{-- Rack Header Bar (Compact & Collapsible, Theme-Adaptive) --}}
                    <div
                        class="bg-gray-100 dark:bg-neutral-950 text-gray-800 dark:text-white py-2 px-3 border-b border-gray-200 dark:border-neutral-800 flex flex-wrap items-center justify-between gap-2 rounded-t-xl">
                        <div class="flex items-center gap-2.5">
                            <div
                                class="w-7 h-7 rounded-lg bg-indigo-500/20 border border-indigo-400/30 flex items-center justify-center text-indigo-500 dark:text-indigo-400 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h1 class="text-xs font-bold tracking-wider uppercase font-mono text-gray-800 dark:text-white">
                                        {{ $item->name }}</h1>
                                    <span class="text-[10px] text-gray-500 dark:text-gray-400 font-mono">|<span
                                            class="text-emerald-600 dark:text-emerald-400 font-bold ml-1">{{ $item->outs }} SALIDAS</span></span>
                                </div>
                            </div>
                        </div>

                        {{-- Splitter Action Controls & Accordion Toggle --}}
                        <div class="flex items-center gap-1.5">
                            @if (count($item->boxnavs) > 0)
                                <button @click="openSpliter = !openSpliter" type="button"
                                    class="flex items-center gap-1 px-2 py-1 rounded bg-white dark:bg-neutral-800 hover:bg-gray-200 dark:hover:bg-neutral-700 text-gray-700 dark:text-gray-300 text-[9px] font-mono transition-colors border border-gray-300 dark:border-gray-700 shadow-sm">
                                    <span x-text="openSpliter ? 'OCULTAR CAJAS' : 'MOSTRAR CAJAS'"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-3 transition-transform duration-200" :class="openSpliter ? 'rotate-180' : ''">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif

                            @if (count($item->boxnavs) < $item->outs)
                                <x-button wire:click="addbooxnav({{ $item->id }})"
                                    wire:key="addbooxnav{{ $item->id }}" wire:loading.attr="disabled"
                                    class="!bg-indigo-600 hover:!bg-indigo-700 !text-white !py-1 !px-2 !text-[9px] shadow-sm">
                                    + CAJA NAP
                                </x-button>
                            @endif
                            <button wire:click="editspliter({{ $item->id }})"
                                wire:key="editspliter{{ $item->id }}" wire:loading.attr="disabled"
                                title="Editar Splitter"
                                class="p-1 rounded bg-white dark:bg-neutral-800 hover:bg-gray-200 dark:hover:bg-neutral-700 text-orange-600 dark:text-orange-400 border border-gray-300 dark:border-gray-700 transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <form action="{{ route('admin.spliters.delete', $item->id) }}" method="post"
                                class="inline">
                                @method('put')
                                @csrf
                                <button type="submit" wire:loading.attr="disabled" title="Eliminar Splitter"
                                    class="p-1 rounded bg-white dark:bg-neutral-800 hover:bg-red-600 dark:hover:bg-red-600 text-red-600 dark:text-red-400 hover:text-white border border-gray-300 dark:border-gray-700 transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-3">
                                        <path d="M10 12V17" />
                                        <path d="M14 12V17" />
                                        <path d="M4 7H20" />
                                        <path
                                            d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Box NAPs Container (Collapsible & 2-Column Grid on Desktop, Reduced Paddings) --}}
                    <div class="p-1.5 sm:p-2" x-show="openSpliter" x-transition>
                        @if (count($item->boxnavs) > 0)
                            <div class="w-full grid grid-cols-1 xl:grid-cols-2 gap-2">
                                @foreach ($item->boxnavs as $itemboxnav)
                                    <div
                                        class="w-full rounded-lg bg-white dark:bg-neutral-900 border border-gray-200 dark:border-neutral-800 shadow-sm p-1.5 sm:p-2 relative transition-colors hover:z-30">
                                        {{-- Switch Bezel Header (Distributed in Single Line, Reduced Margin) --}}
                                        <div
                                            class="flex items-center justify-between gap-2 pb-1.5 mb-1.5 border-b border-gray-100 dark:border-neutral-800 px-0.5">
                                            <div class="flex items-center gap-1.5 min-w-0">
                                                <span
                                                    class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_6px_rgba(16,185,129,0.8)] animate-pulse shrink-0"></span>
                                                <h2 class="text-xs font-bold font-mono tracking-wide text-gray-800 dark:text-slate-100 uppercase truncate"
                                                    title="{{ $itemboxnav->name }}">{{ $itemboxnav->name }}</h2>
                                                <span
                                                    class="text-[8px] font-mono px-1.5 py-0.5 rounded bg-indigo-50 dark:bg-indigo-950/50 border border-indigo-200 dark:border-indigo-800/60 text-indigo-600 dark:text-indigo-300 font-bold shrink-0">{{ $itemboxnav->outs }} PUERTOS</span>
                                            </div>

                                            {{-- Switch Hardware Buttons --}}
                                            <div class="flex items-center gap-1 shrink-0">
                                                @if (count($itemboxnav->portboxnavs) < $itemboxnav->outs)
                                                    <button wire:click="openmodalport({{ $itemboxnav->id }})"
                                                        wire:key="createportbox_{{ $item->id }}_{{ $itemboxnav->id }}"
                                                        wire:loading.attr="disabled"
                                                        class="px-1.5 py-0.5 rounded bg-emerald-100 hover:bg-emerald-200 text-emerald-700 dark:bg-emerald-500/20 dark:hover:bg-emerald-500/30 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-500/40 text-[8.5px] font-mono font-bold transition-all">
                                                        + PUERTO
                                                    </button>
                                                @endif
                                                <button wire:click="editbox({{ $itemboxnav->id }})"
                                                    wire:key="editbox_{{ $item->id }}_{{ $itemboxnav->id }}"
                                                    wire:loading.attr="disabled" title="Editar Caja NAP"
                                                    class="p-1 rounded bg-gray-100 hover:bg-gray-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 text-orange-600 dark:text-orange-400 border border-gray-200 dark:border-neutral-700 text-[8.5px] font-mono transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </button>
                                                <button onclick="confirmDeleteBox({{ $itemboxnav->id }})"
                                                    wire:key="deletebox_{{ $item->id }}_{{ $itemboxnav->id }}"
                                                    wire:loading.attr="disabled" title="Eliminar Caja NAP"
                                                    class="p-1 rounded bg-gray-100 hover:bg-red-600 dark:bg-neutral-800 dark:hover:bg-red-600 text-red-600 dark:text-red-400 hover:text-white border border-gray-200 dark:border-neutral-700 text-[8.5px] font-mono transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-2.5">
                                                        <path d="M10 12V17" />
                                                        <path d="M14 12V17" />
                                                        <path d="M4 7H20" />
                                                        <path
                                                            d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                                        <path
                                                            d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Switch Port Grid (Untouched: 44px Ports, gap-1.5 p-1.5, 4 or 8 ports per row) --}}
                                        <div
                                            class="w-full grid grid-cols-4 sm:grid-cols-8 xl:grid-cols-8 gap-1.5 p-1.5 bg-gray-50 dark:bg-black/40 rounded border border-gray-200 dark:border-neutral-800/80 shadow-inner">
                                            @if (count($itemboxnav->portboxnavs) > 0)
                                                @foreach ($itemboxnav->portboxnavs as $portboxnav)
                                                    <div class="relative group hover:z-50"
                                                        wire:key="portbox_{{ $item->id }}_{{ $itemboxnav->id }}_{{ $portboxnav->id }}">
                                                        {{-- RJ45 Socket Cavity (Untouched: min-h-[44px]) --}}
                                                        <div
                                                            class="w-full rounded p-1 flex flex-col justify-between items-center transition-all duration-150 shadow-sm border {{ $portboxnav->network ? 'bg-emerald-50/90 dark:bg-gradient-to-b dark:from-slate-900 dark:via-emerald-950/40 dark:to-slate-900 border-emerald-400 dark:border-emerald-500/60 shadow-[0_0_6px_rgba(16,185,129,0.15)]' : 'bg-white dark:bg-neutral-900/80 border-gray-200 dark:border-neutral-800 hover:border-gray-400 dark:hover:border-neutral-600' }} min-h-[44px]">

                                                            {{-- Top row: Link LED, Data LED, and tiny Delete/Disconnect icon --}}
                                                            <div
                                                                class="w-full flex justify-between items-center px-0.5">
                                                                <div class="flex items-center gap-1">
                                                                    {{-- Link LED --}}
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full {{ $portboxnav->network ? 'bg-emerald-500 dark:bg-emerald-400 shadow-[0_0_6px_rgba(16,185,129,0.9)]' : 'bg-gray-300 dark:bg-neutral-700' }}"
                                                                        title="Link Status"></span>
                                                                    {{-- Data LED (Blinking/Pulsing when active) --}}
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full {{ $portboxnav->network ? 'bg-amber-500 dark:bg-amber-400 animate-pulse shadow-[0_0_6px_rgba(251,191,36,0.8)]' : 'bg-gray-300 dark:bg-neutral-700' }}"
                                                                        title="Data Activity"></span>
                                                                </div>
                                                                <button type="button"
                                                                    class="text-[8px] rounded px-0.5 {{ $portboxnav->network ? 'text-rose-500 hover:bg-rose-500 hover:text-white' : 'text-gray-400 hover:text-rose-500 hover:bg-gray-100 dark:hover:bg-neutral-800' }} transition-colors"
                                                                    wire:key="deleteportbox_{{ $item->id }}_{{ $itemboxnav->id }}_{{ $portboxnav->id }}"
                                                                    wire:click="deleteportbox({{ $portboxnav->id }})"
                                                                    wire:loading.attr="disabled"
                                                                    title="Desconectar / Eliminar Puerto">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="size-2">
                                                                        <path d="M18 6 6 18" />
                                                                        <path d="m6 6 12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            {{-- Bottom row: Port Code & Status --}}
                                                            <div class="text-center leading-none my-0.5">
                                                                <span
                                                                    class="block text-[8.5px] font-mono tracking-tight uppercase {{ $portboxnav->network ? 'text-emerald-700 dark:text-emerald-400 font-bold' : 'text-gray-700 dark:text-slate-400 font-semibold' }}">
                                                                    {{ $portboxnav->code }}
                                                                </span>
                                                                <span
                                                                    class="text-[6.5px] font-mono leading-none {{ $portboxnav->network ? 'text-emerald-600 dark:text-emerald-500/80' : 'text-gray-400 dark:text-slate-600' }}">
                                                                    {{ $portboxnav->network ? 'ONLINE' : 'FREE' }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                        {{-- Client Hover Tooltip (Only if occupied, Theme-Adaptive & Unclipped) --}}
                                                        @if ($portboxnav->network && $portboxnav->network->client)
                                                            <div
                                                                class="absolute bottom-full mb-1 w-56 p-2 bg-white/95 dark:bg-black/95 text-gray-800 dark:text-white text-xs rounded-lg shadow-2xl border border-emerald-500/50 dark:border-emerald-500/50 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 z-50 backdrop-blur-md {{ $loop->iteration % 8 == 1 || $loop->iteration % 8 == 2 ? 'left-0' : ($loop->iteration % 8 == 7 || $loop->iteration % 8 == 0 ? 'right-0' : 'left-1/2 -translate-x-1/2') }}">
                                                                <div
                                                                    class="flex items-center gap-1.5 border-b border-gray-200 dark:border-gray-800 pb-1 mb-1">
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full bg-emerald-500 dark:bg-emerald-400 animate-ping"></span>
                                                                    <span
                                                                        class="font-mono text-[8.5px] text-emerald-600 dark:text-emerald-400 font-bold uppercase tracking-wider">CLIENTE
                                                                        CONECTADO</span>
                                                                </div>
                                                                <p class="font-bold text-xs text-gray-900 dark:text-slate-100 truncate">
                                                                    {{ $portboxnav->network->client->name }}</p>
                                                                <p class="text-gray-500 dark:text-slate-400 font-mono text-[9.5px] mt-0.5">
                                                                    DOC: <span
                                                                        class="text-gray-800 dark:text-slate-200 font-bold">{{ $portboxnav->network->client->document }}</span>
                                                                </p>
                                                                @if ($portboxnav->network->telefono)
                                                                    <p class="text-gray-500 dark:text-slate-400 font-mono text-[9.5px]">
                                                                        TEL: <span
                                                                            class="text-gray-800 dark:text-slate-200 font-bold">{{ $portboxnav->network->telefono }}</span>
                                                                    </p>
                                                                @endif
                                                                <p
                                                                    class="text-gray-600 dark:text-slate-400 text-[9px] mt-1 border-t border-gray-200 dark:border-gray-800/80 pt-1 truncate">
                                                                    DIR:
                                                                    {{ $portboxnav->network->direccion ?? 'Sin dirección' }}
                                                                </p>
                                                                {{-- Tooltip arrow --}}
                                                                <div
                                                                    class="absolute top-full -mt-1 border-solid border-t-white/95 dark:border-t-black/95 border-t-6 border-x-transparent border-x-6 border-b-0 {{ $loop->iteration % 8 == 1 || $loop->iteration % 8 == 2 ? 'left-4' : ($loop->iteration % 8 == 7 || $loop->iteration % 8 == 0 ? 'right-4' : 'left-1/2 -translate-x-1/2') }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div
                                                    class="col-span-full py-3 text-center text-gray-400 dark:text-slate-600 font-mono text-[9.5px]">
                                                    [ SIN PUERTOS NAP CONFIGURADOS EN ESTE CHASSIS ]
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div
                                class="py-4 px-4 text-center text-gray-400 dark:text-slate-500 font-mono text-[9.5px] border border-dashed border-gray-300 dark:border-neutral-800 rounded-lg">

                                [ NO HAY CAJAS NAP REGISTRADAS EN ESTE SPLITTER ]
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif



    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR CAJA NAP</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="saveboxnav" class="w-full grid grid-cols-1 gap-2" x-data="mufaboxnav">
                <div class="w-full" x-show="!allports">
                    <x-label value="Código" />
                    <x-input class="w-full block" x-model="code" maxlength="12" />
                    <x-input-error for="code" />
                </div>

                <div class="w-full" x-show="!allports">
                    <x-label value="Nombre / Dirección de CAJA NAP" />
                    {{-- <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                        <span>CAJA NAV </span>
                        <span x-text="code"></span>
                    </p> --}}
                    <x-input class="w-full block" wire:model.defer="name" />
                    <x-input-error for="name" />
                </div>

                <div class="w-full">
                    <x-label value="Puertos" />
                    <x-input class="w-full block" wire:model.defer="outs" type="number" min="1"
                        step="1" />
                    <x-input-error for="outs" />
                </div>
                <div>
                    <label class="inline-flex items-center gap-1" for="allports">
                        <x-input type="checkbox" x-model="allports" wire:loading.attr="disabled" id="allports" />
                        USAR DATOS PARA TODAS LAS CAJAS NAV
                    </label>
                    <span x-text="allports"></span>
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openspliter" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR SPLITER</h1>
            <button wire:click="$set('openspliter', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updatespliter" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="spliter.name" />
                    <x-input-error for="spliter.name" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="N° salidas" />
                        <x-input class="w-full block" wire:model.defer="spliter.outs" type="number" min="1"
                            step="1" />
                        <x-input-error for="spliter.outs" />
                    </div>
                </div>

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openedit" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CAJA NAP</h1>
            <button wire:click="$set('openedit', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateboxnav" class="w-full grid grid-cols-1 gap-2" x-data="mufaboxnav">
                <div class="w-full">
                    <x-label value="Nombre / Dirección de CAJA NAP" />
                    <x-input class="w-full block" wire:model.defer="editname" />
                    <x-input-error for="editname" />
                </div>

                <div class="w-full">
                    <x-label value="Código" />
                    <x-input class="w-full block" wire:model.defer="editcode" maxlength="12" />
                    <x-input-error for="editcode" />
                </div>

                <div class="w-full">
                    <x-label value="Puertos" />
                    <x-input class="w-full block" wire:model.defer="editouts" type="number" min="1"
                        step="1" />
                    <x-input-error for="editouts" />
                </div>
                <div class="text-end">
                    {{-- {{ print_r($errors->all()) }} --}}
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>


    <x-dialog-modal wire:model="openport" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PUERTO NAP</h1>
            <button wire:click="$set('openport', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="saveport" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full">
                    <x-label value="Código Puerto" />
                    <x-input class="w-full block" wire:model.defer="codeport" maxlength="12" />
                    <x-input-error for="codeport" />
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mufaboxnav', () => ({
                allports: @entangle('allports').defer,
                code: @entangle('code').defer,
            }))
        })

        function confirmDeleteSpliter(spliter_id) {
            Swal.fire({
                title: 'Desea eliminar spliter seleccionado ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(spliter_id);
                }
            })
        }

        function confirmDeleteBox(boxnav_id) {
            Swal.fire({
                title: 'Desea eliminar caja nap seleccionado ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteboxnav(boxnav_id);
                }
            })
        }
    </script>

</div>
