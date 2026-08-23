<div x-data="{ ponIdx: @entangle('ponIdx'), fiberIdx: @entangle('fiberIdx') }" @pon-selected.window="ponIdx = $event.detail.pon; fiberIdx = null">
    <x-loading-overlay />

    {{-- ═══ SPLITTER SECTION ═══ --}}
    <div x-show="ponIdx === null"
        class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-300 dark:border-[#2a2e3a] rounded-xl p-7 text-center  text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200">
        [ SELECCIONA UN PUERTO PON PARA VER SU SPLITTER ]
    </div>

    @foreach ($olt->spliters as $si => $item)
        <div x-show="ponIdx === {{ $si }}" x-cloak wire:key="spliter_{{ $item->id }}">
            @if ($ponIdx === $si)

            {{-- Splitter Chassis (Theme Adaptive) --}}
            <div
                class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200 overflow-hidden mb-4">

                {{-- Faceplate --}}
                <div
                    class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
                    @php
                        $oltPort = $olt->ports->firstWhere('port_number', $si + 1);
                        $splitterName = ($oltPort && $oltPort->alias) ? $oltPort->alias : $item->name;
                        $splitterDireccion = ($oltPort && $oltPort->direccion) ? $oltPort->direccion : $item->direccion;
                    @endphp
                    <div class="flex items-center gap-2 flex-wrap">
                        <div
                            class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                        </div>
                        <span class="text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300">
                            {{ $splitterName }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full  text-[9px] font-bold tracking-[.08em] uppercase bg-green-50 dark:bg-[#f0c94a]/10 border border-green-200 dark:border-[#f0c94a]/30 text-green-600 dark:text-green-400 transition-colors duration-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            PLC 1:{{ $item->outs }}
                        </span>
                        @if($splitterDireccion)
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-blue-50 dark:bg-blue-950/40 border border-blue-200 dark:border-blue-800/40 text-blue-600 dark:text-blue-400 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                {{ $splitterDireccion }}
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center gap-1.5 flex-wrap">
                        @if (count($item->boxnavs) < $item->outs)
                            <button @click="$wire.addbooxnav({{ $item->id }}, fiberIdx)"
                                wire:key="addbn{{ $item->id }}" wire:loading.attr="disabled"
                                class="px-2 py-1 rounded text-[9px]  font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors">
                                + NAP
                            </button>
                        @endif
                        <button wire:click="editspliter({{ $item->id }})" wire:key="eds{{ $item->id }}"
                            wire:loading.attr="disabled"
                            class="p-1.5 rounded bg-white dark:bg-neutral-800/80 border border-gray-300 dark:border-neutral-700 text-[#f0a54a] hover:bg-gray-100 dark:hover:bg-neutral-750 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <form action="{{ route('admin.spliters.delete', $item->id) }}" method="post" class="inline">
                            @method('put') @csrf
                            <button type="submit" wire:loading.attr="disabled"
                                class="p-1.5 rounded bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-900/50 text-[#e63946] hover:bg-red-100 dark:hover:bg-red-950/50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="size-3">
                                    <path d="M10 12V17" />
                                    <path d="M14 12V17" />
                                    <path d="M4 7H20" />
                                    <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                                </svg>
                            </button>
                        </form>
                        <div
                            class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                        </div>
                    </div>
                </div>

                {{-- Rail --}}
                <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200" x-data="{
                    spliterPorts: {{ json_encode($item->ports->keyBy('port_number')->map(fn($p) => ['alias' => $p->alias, 'direccion' => $p->direccion])) }}
                }">
                    <div
                        class="text-[8px] text-gray-400 dark:text-neutral-600 tracking-widest mb-3 uppercase flex items-center justify-between flex-wrap gap-2">
                        <div>
                            // HILOS DE FIBRA ──
                            <span class="text-gray-500 dark:text-neutral-500"
                                x-text="fiberIdx !== null ? `HILO ${fiberIdx+1} SELECCIONADO` : 'SELECCIONA UN HILO'"></span>
                            <template x-if="fiberIdx !== null && spliterPorts[fiberIdx+1]">
                                <span class="text-blue-600 dark:text-blue-400 font-bold ml-2">
                                    [ <span x-text="spliterPorts[fiberIdx+1].alias || ''"></span> ]
                                    <span class="text-gray-400 dark:text-neutral-500 font-normal ml-1"
                                        x-text="spliterPorts[fiberIdx+1].direccion ? ' - ' + spliterPorts[fiberIdx+1].direccion : ''"></span>
                                </span>
                            </template>
                        </div>
                    </div>

                    <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
                        @for ($f = 1; $f <= $item->outs; $f++)
                            @php
                                $hasNap = $item->boxnavs->firstWhere('splitter_port', $f);
                                $sPortInfo = $item->ports->firstWhere('port_number', $f);
                            @endphp
                            <div class="splitter-port rounded-lg relative group overflow-hidden"
                                x-data="{ hovered: false }"
                                @mouseenter="hovered = true"
                                @mousemove="hovered = true"
                                @mouseleave="hovered = false"
                                :class="{ 
                                    'selected': fiberIdx === {{ $f - 1 }},
                                    'hovered-card-state': hovered
                                }"
                                @click="fiberIdx = (fiberIdx === {{ $f - 1 }}) ? null : {{ $f - 1 }}">
                                @php
                                    $portDisplayName = $hasNap ? $hasNap->name : (($sPortInfo && $sPortInfo->alias) ? $sPortInfo->alias : 'H-' . str_pad($f, 2, '0', STR_PAD_LEFT));
                                @endphp
                                <span class="port-title-meta truncate w-full block text-center px-1"
                                    title="{{ $portDisplayName }}">{{ $portDisplayName }}</span>
                                <div class="jack-hardware-plate mt-0.5">
                                    <div class="hardware-jack-cavity">
                                        <div class="jack-gold-pins"></div>
                                    </div>
                                    <div class="jack-status-led"
                                        :class="{
                                            'led-blink-active': fiberIdx === {{ $f - 1 }} ||
                                                {{ $hasNap ? 'true' : 'false' }}
                                        }">
                                    </div>
                                </div>
                                <span class=" text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold">
                                    {{ $hasNap ? 'NAP' : 'LIB' }}
                                </span>
                            </div>
                        @endfor
                    </div>
                </div>

                <div
                    class="flex items-center px-4 py-2 border-t border-gray-200 dark:border-[#2a2e3a]/40 bg-gray-100 dark:bg-neutral-950/40 transition-colors duration-200">
                    <span class="text-[7px]  text-gray-500 dark:text-neutral-700 tracking-widest uppercase">
                        SPLITTER PLC 1:{{ $item->outs }} · {{ count($item->boxnavs) }} NAP REGISTRADAS
                    </span>
                </div>
            </div>

            {{-- ═══ NAP BOX SECTION ═══ --}}
            <div x-show="fiberIdx !== null" x-cloak>

                {{-- Section Divider (Tailwind Based) --}}
                <div
                    class="flex items-center gap-3 my-4  text-[8px] font-bold tracking-[.15em] uppercase text-gray-400 dark:text-neutral-500 transition-colors duration-200">
                    <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
                    <span>CAJA NAP</span>
                    <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
                </div>

                @foreach ($item->boxnavs as $ni => $itemboxnav)
                    <div x-show="fiberIdx === {{ $itemboxnav->splitter_port - 1 }}" x-cloak
                        wire:key="boxnav_{{ $itemboxnav->id }}">
                        @if ($fiberIdx === $itemboxnav->splitter_port - 1)

                        {{-- NAP Box Chassis (Theme Adaptive) --}}
                        <div
                            class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200">

                            {{-- Faceplate --}}
                            <div
                                class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] rounded-t-[12px] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
                                @php
                                    $napName = $itemboxnav->name;
                                @endphp

                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                                    </div>
                                    <span
                                        class=" text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300 ">
                                        {{ $napName }}
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full  text-[9px] font-bold tracking-[.08em] uppercase bg-emerald-50 dark:bg-[#39d873]/10 border border-emerald-200 dark:border-[#39d873]/30 text-emerald-600 dark:text-[#39d873] transition-colors duration-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#39d873] animate-pulse"></span>
                                        {{ $itemboxnav->outs }} PUERTOS
                                    </span>
                                </div>

                                <div class="flex items-center gap-1.5 flex-wrap">
                                    @if (count($itemboxnav->portboxnavs) < $itemboxnav->outs)
                                        <button wire:click="openmodalport({{ $itemboxnav->id }})"
                                            wire:key="crport_{{ $ni }}_{{ $itemboxnav->id }}"
                                            wire:loading.attr="disabled"
                                            class="px-2 py-1 rounded text-[9px]  font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors">
                                            + PUERTO
                                        </button>
                                    @endif
                                    <button wire:click="editbox({{ $itemboxnav->id }})"
                                        wire:key="editbx_{{ $ni }}_{{ $itemboxnav->id }}"
                                        wire:loading.attr="disabled"
                                        class="p-1.5 rounded bg-white dark:bg-neutral-800/80 border border-gray-300 dark:border-neutral-700 text-[#f0a54a] hover:bg-gray-100 dark:hover:bg-neutral-750 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <button onclick="confirmDeleteBox({{ $itemboxnav->id }})"
                                        wire:key="delbx_{{ $ni }}_{{ $itemboxnav->id }}"
                                        wire:loading.attr="disabled"
                                        class="p-1.5 rounded bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-900/50 text-[#e63946] hover:bg-red-100 dark:hover:bg-red-950/50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-3">
                                            <path d="M10 12V17" />
                                            <path d="M14 12V17" />
                                            <path d="M4 7H20" />
                                            <path
                                                d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                            <path
                                                d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                                    </div>
                                </div>
                            </div>

                            {{-- Rail --}}
                            <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200">
                                <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
                                    @if (count($itemboxnav->portboxnavs) > 0)
                                        @foreach ($itemboxnav->portboxnavs as $portboxnav)
                                            <div class="relative group"
                                                wire:key="port_{{ $ni }}_{{ $itemboxnav->id }}_{{ $portboxnav->id }}">
                                                <div
                                                    class="rj45-jack rounded-lg relative group overflow-hidden {{ $portboxnav->network ? 'connected' : '' }}"
                                                    x-data="{ hovered: false }"
                                                    @mouseenter="hovered = true"
                                                    @mousemove="hovered = true"
                                                    @mouseleave="hovered = false"
                                                    :class="{ 'hovered-card-state': hovered }">
                                                    @if ($portboxnav->alias)
                                                        <span
                                                            class="port-title-meta truncate w-full block text-center px-1"
                                                            title="{{ $portboxnav->alias }}">{{ $portboxnav->alias }}</span>
                                                    @else
                                                        <span
                                                            class="port-title-meta truncate w-full block text-center px-1">{{ $portboxnav->code }}</span>
                                                    @endif
                                                    <div class="jack-hardware-plate mt-0.5">
                                                        <div class="hardware-jack-cavity">
                                                            <div class="jack-gold-pins"></div>
                                                        </div>
                                                        <div class="jack-status-led"></div>
                                                    </div>
                                                    <span
                                                        class=" text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold">
                                                        {{ $portboxnav->network ? 'ACT' : 'LIB' }}
                                                    </span>

                                                    {{-- Slide-up Edit Button --}}
                                                    <button type="button"
                                                        @click.stop="hovered = false; $wire.editPortboxnav({{ $portboxnav->id }})"
                                                        :class="hovered ? 'opacity-100 translate-y-[-4px]' : 'opacity-0 translate-y-2 pointer-events-none'"
                                                        :inert="!hovered"
                                                        class="absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-200 ease-out w-[90%] py-1 rounded-md bg-white dark:bg-neutral-900 border border-orange-500/40 dark:border-orange-500/30 shadow-sm text-center flex items-center justify-center text-orange-600 dark:text-orange-400 hover:scale-105 active:scale-95 cursor-pointer z-20">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" class="size-3.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                {{-- Disconnect Button --}}
                                                <button type="button"
                                                    wire:click="deleteportbox({{ $portboxnav->id }})"
                                                    wire:key="delprt_{{ $portboxnav->id }}"
                                                    wire:loading.attr="disabled"
                                                    class="absolute top-0 right-0 w-4 h-4 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-[#e63946] text-white text-[8px] font-bold shadow-md hover:bg-red-600 z-10">✕</button>

                                                {{-- Client Tooltip --}}
                                                @if ($portboxnav->network && $portboxnav->network->client)
                                                    <div class="absolute bottom-full mb-2 w-52 p-2 rounded-lg shadow-2xl opacity-0 pointer-events-none group-hover:opacity-100 transition-all z-50 backdrop-blur-md bg-white/95 dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 text-left"
                                                        style="{{ $loop->iteration % 8 <= 2 ? 'left:0' : ($loop->iteration % 8 >= 7 ? 'right:0' : 'left:50%;transform:translateX(-50%)') }}">
                                                        <div
                                                            class="flex items-center gap-1.5 pb-1 mb-1 border-b border-green-600 dark:border-neutral-600">
                                                            <span
                                                                class="w-1.5 h-1.5 rounded-full bg-green-600 animate-ping"></span>
                                                            <span
                                                                class=" text-[8px] font-bold tracking-wider text-green-600">
                                                                CLIENTE CONECTADO
                                                            </span>
                                                        </div>
                                                        <p
                                                            class="font-bold text-xs text-gray-900 dark:text-white truncate">
                                                            {{ $portboxnav->network->client->name }}</p>
                                                        <p class=" text-[9px] mt-0.5 text-gray-500 dark:text-gray-400">
                                                            DOC: <span
                                                                class="text-gray-900 dark:text-white font-bold">{{ $portboxnav->network->client->document }}</span>
                                                        </p>
                                                        @if ($portboxnav->network->telefono)
                                                            <p class=" text-[9px] text-gray-500 dark:text-gray-400">
                                                                TEL: <span
                                                                    class="text-gray-900 dark:text-white font-bold">{{ $portboxnav->network->telefono }}</span>
                                                            </p>
                                                        @endif
                                                        @if ($portboxnav->alias)
                                                            <p class="text-[9px] text-gray-505 dark:text-gray-400">
                                                                ALIAS: <span
                                                                    class="text-gray-900 dark:text-white font-bold">{{ $portboxnav->alias }}</span>
                                                            </p>
                                                        @endif
                                                        @if ($portboxnav->direccion)
                                                            <p class="text-[9px] text-gray-505 dark:text-gray-400">
                                                                DIR: <span
                                                                    class="text-gray-900 dark:text-white font-bold">{{ $portboxnav->direccion }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div
                                            class="col-span-full py-4 text-center  text-[9px] text-gray-400 dark:text-neutral-600 tracking-widest uppercase">
                                            [ SIN PUERTOS NAP CONFIGURADOS ]
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Bottom Rail --}}
                            <div
                                class="flex items-center px-4 py-2 border-t border-gray-200 dark:border-[#2a2e3a]/40 bg-gray-100 dark:bg-neutral-950/40 rounded-b-[12px] transition-colors duration-200">
                                <span
                                    class="text-[7px]  text-gray-500 dark:text-neutral-700 tracking-widest uppercase">
                                    CAJA NAP · {{ count($itemboxnav->portboxnavs) }}/{{ $itemboxnav->outs }} PUERTOS
                                    OCUPADOS
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach

                <div x-show="!{{ json_encode($item->boxnavs->pluck('splitter_port')->map(fn($p) => $p - 1)->filter(fn($p) => $p >= 0)->toArray()) }}.includes(fiberIdx)"
                    class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-350 dark:border-[#2a2e3a] rounded-xl p-7 text-center text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200 flex flex-col items-center justify-center gap-3">
                    <span>[ NO HAY CAJA NAP EN ESTE HILO ]</span>
                    @if (count($item->boxnavs) < $item->outs)
                        <button @click="$wire.addbooxnav({{ $item->id }}, fiberIdx)"
                            class="px-2.5 py-1 rounded text-[9px] font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors">
                            + REGISTRAR CAJA NAP EN ESTE HILO
                        </button>
                    @endif
                </div>
            </div>

            @endif
        </div>
    @endforeach

    {{-- If OLT has no spliters yet --}}
    @if (count($olt->spliters) === 0)
        <div
            class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-350 dark:border-[#2a2e3a] rounded-xl p-7 text-center  text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200">
            [ SIN SPLITTERS REGISTRADOS EN ESTE OLT ]
        </div>
    @endif


    {{-- ═══════════════════════════════════
         CRUD MODALS — NO MODIFICAR
         ═══════════════════════════════════ --}}
    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR CAJA NAP</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
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
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openspliter" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR SPLITER</h1>
            <button wire:click="$set('openspliter', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
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
                <div class="w-full">
                    <x-label value="Dirección / Ubicación Específica" />
                    <textarea
                        class="border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm w-full block text-xs"
                        wire:model.defer="spliter.direccion" placeholder="Ej. POSTE 4, ESQUINA AV. BRASIL" rows="3"></textarea>
                    <x-input-error for="spliter.direccion" />
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
                    <x-button type="submit" wire:loading.attr="disabled">ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openedit" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CAJA NAP</h1>
            <button wire:click="$set('openedit', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
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
                    <x-button type="submit" wire:loading.attr="disabled">ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openport" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PUERTO NAP</h1>
            <button wire:click="$set('openport', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
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
                    <x-button type="submit" wire:loading.attr="disabled">REGISTRAR</x-button>
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

    {{-- Unified Edit Port Modal --}}
    <x-dialog-modal wire:model="openEditPortModal" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px] uppercase">
                EDITAR DETALLES DE PUERTO / HILO
                <span class="text-blue-500">
                    {{ $portType === 'olt' ? 'OLT' : ($portType === 'spliter' ? 'SPLITTER' : 'CAJA NAP') }}
                </span>
            </h1>
            <button wire:click="$set('openEditPortModal', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="savePortDetails" class="w-full grid grid-cols-1 gap-3">
                <div class="w-full">
                    <x-label value="Alias / Nombre" />
                    <x-input class="w-full block" wire:model.defer="editingAlias"
                        placeholder="Ej. TRONCAL PRINCIPAL A" />
                    <x-input-error for="editingAlias" />
                </div>
                <div class="w-full">
                    <x-label value="Dirección / Ubicación Específica" />
                    <textarea
                        class="border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm w-full block text-xs"
                        wire:model.defer="editingDireccion" placeholder="Ej. POSTE 4, ESQUINA AV. BRASIL" rows="3"></textarea>
                    <x-input-error for="editingDireccion" />
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">GUARDAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

</div>
