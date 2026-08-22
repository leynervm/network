<x-app-layout>
    @php
        $olt->loadMissing('spliters');
        $portsInfo = [];
        for ($p = 1; $p <= $olt->outs; $p++) {
            $splitter = $olt->spliters->values()->get($p - 1);
            $portModel = $olt->ports->firstWhere('port_number', $p);
            $portsInfo[$p] = [
                'alias' => $splitter ? $splitter->name : ($portModel ? $portModel->alias : null),
                'direccion' => $splitter ? $splitter->direccion : ($portModel ? $portModel->direccion : null),
            ];
        }
    @endphp
    {{-- ══ OLT RACK CHASSIS (Theme Adaptive) ══ --}}
    <div class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200 overflow-hidden mb-6"
        x-data="{
            sel: null,
            hoveredPort: null,
            portsInfo: {{ json_encode($portsInfo) }},
            pick(i) {
                this.sel = (this.sel === i) ? null : i;
                this.$dispatch('pon-selected', { pon: this.sel });
            }
        }"
        @olt-ports-updated.window="portsInfo = $event.detail">

        {{-- Faceplate --}}
        <div
            class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
            <div class="flex items-center gap-2">
                <div
                    class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 shrink-0 text-gray-600 dark:text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                </svg>
                <span
                    class="text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300 drop-shadow-[0_0_12px_rgba(255,75,31,0.4)]">
                    {{ $olt->name }}
                </span>
                <span
                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-green-500/10 dark:bg-green-950/50 border border-green-500/30 text-green-600 dark:text-green-400">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    {{ $olt->outs }} PORTS
                </span>
            </div>
            <div class="flex items-center gap-2">
                <span
                    class="text-[7px] text-gray-500 dark:text-neutral-700 tracking-widest hidden sm:block">OLT·RACK·1U</span>
                <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(57,216,115,.8)]"></div>
                <div
                    class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0">
                </div>
            </div>
        </div>

        {{-- Ports Panel --}}
        <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200">
            <div
                class="text-[8px] text-gray-400 dark:text-neutral-600 tracking-widest mb-1 uppercase flex items-center justify-between flex-wrap gap-2">
                <div>
                    // PON INTERFACES ──
                    <span class="text-gray-500 dark:text-neutral-500"
                        x-text="sel!==null?`PUERTO PON ${sel+1} SELECCIONADO`:'SELECCIONA UN PUERTO'"></span>
                    <template x-if="sel !== null && portsInfo[sel+1]">
                        <span class="text-blue-600 dark:text-blue-400 font-bold ml-2">
                            [ <span x-text="portsInfo[sel+1].alias || ''"></span> ]
                            <span class="text-gray-400 dark:text-neutral-500 font-normal ml-1"
                                x-text="portsInfo[sel+1].direccion ? ' - ' + portsInfo[sel+1].direccion : ''"></span>
                        </span>
                    </template>
                </div>
            </div>

            <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
                @for ($p = 1; $p <= $olt->outs; $p++)
                    <div class="pon-card rounded-lg relative group overflow-hidden"
                        :class="{ 
                            'selected': sel === {{ $p - 1 }},
                            'hovered-card-state': hoveredPort === {{ $p }}
                        }"
                        @click="pick({{ $p - 1 }})"
                        @mouseenter="hoveredPort = {{ $p }}"
                        @mousemove="hoveredPort = {{ $p }}"
                        @mouseleave="hoveredPort = null">
                        <span class="port-title-meta truncate w-full block text-center px-1"
                              :title="portsInfo[{{ $p }}] ? portsInfo[{{ $p }}].alias : 'PON-{{ str_pad($p, 2, '0', STR_PAD_LEFT) }}'"
                              x-text="portsInfo[{{ $p }}] && portsInfo[{{ $p }}].alias ? portsInfo[{{ $p }}].alias : 'PON-{{ str_pad($p, 2, '0', STR_PAD_LEFT) }}'">
                        </span>
                        <div class="jack-hardware-plate mt-0.5">
                            <div class="hardware-jack-cavity">
                                <div class="jack-gold-pins"></div>
                            </div>
                            <div class="jack-status-led" :class="{ 'led-blink-active': sel === {{ $p - 1 }} }">
                            </div>
                        </div>
                        <span class="font-mono text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold"
                            x-text="sel === {{ $p - 1 }} ? 'ACT' : 'IDL'"></span>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Bottom rail --}}
        {{-- <div
            class="flex items-center justify-between px-4 py-2 border-t border-gray-200 dark:border-[#2a2e3a]/40 bg-gray-100 dark:bg-neutral-950/40 transition-colors duration-200">
            <span class="text-[7px] font-mono text-gray-500 dark:text-neutral-700 tracking-widest">
                GPON OLT · {{ $olt->outs }}x PON
            </span>
            <div class="flex items-center gap-2">
                <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_4px_rgba(57,216,115,.8)]"></div>
                <span class="text-[7px] font-mono text-gray-400 dark:text-neutral-600">PWR</span>
                <div class="w-1.5 h-1.5 rounded-full bg-orange-500 shadow-[0_0_4px_rgba(255,75,31,.8)]"></div>
                <span class="text-[7px] font-mono text-gray-400 dark:text-neutral-600">SYS</span>
            </div>
        </div> --}}
    </div>

    @if ($olt->outs - count($olt->spliters) > 0)
        <div class="mb-4">
            <livewire:admin.spliters.create-spliter :olt="$olt" />
        </div>
    @endif

    {{-- Section Divider (Tailwind Based) --}}
    <div
        class="flex items-center gap-3 my-5 font-mono text-[8px] font-bold tracking-[.15em] uppercase text-gray-400 dark:text-neutral-500 transition-colors duration-200">
        <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
        <span>SPLITTERS PLC · CAJAS NAP</span>
        <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
    </div>

    <div>
        <livewire:admin.spliters.show-spliters :olt="$olt" />
    </div>

</x-app-layout>
