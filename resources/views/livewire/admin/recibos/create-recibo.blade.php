<div>
    <x-button wire:click="$toggle('open')">CREAR RECIBO</x-button>

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">GENERAR RECIBO</h1>
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
                <div class="">
                    <x-label value="Tipo servicio" />
                    <div class="w-full flex flex-wrap gap-2">
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="todos"
                                value="TODOS" />
                            <label for="todos"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                TODOS
                            </label>
                        </div>

                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="tv"
                                value="{{ \App\Models\Network::TV }}" />
                            <label for="tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="fibra"
                                value="{{ \App\Models\Network::FIBRA }}" />
                            <label for="fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="fibra_tv"
                                value="{{ \App\Models\Network::FIBRA_TV }}" />
                            <label for="fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model="type" id="satelital"
                                value="{{ \App\Models\Network::SATELITAL }}" />
                            <label for="satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="type" />
                </div>

                @if ($type && $type != 'TODOS')
                    @if (validarFibra($type))
                        <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]" wire:target="type"
                            class="w-full bg-gray-50 dark:bg-neutral-900/60 p-3 rounded-xl border border-gray-200 dark:border-neutral-700/60 transition-all duration-200">
                            <x-label value="Seleccionar OLT (Opcional)"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300" />
                            <select class="w-full block rounded-lg border-gray-300 text-xs !p-2"
                                wire:model.defer="olt_id">
                                <option value="">TODAS LAS OLT</option>
                                @if (count($olts) > 0)
                                    @foreach ($olts as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="olt_id" />
                        </div>
                    @else
                        <div wire:loading.class="opacity-60 pointer-events-none filter blur-[1.5px]" wire:target="type"
                            class="w-full bg-gray-50 dark:bg-neutral-900/60 p-3 rounded-xl border border-gray-200 dark:border-neutral-700/60 transition-all duration-200">
                            <x-label value="Seleccionar Antena (Opcional)"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300" />
                            <select class="w-full block rounded-lg border-gray-300 text-xs !p-2"
                                wire:model.defer="antena_id">
                                <option value="">TODAS LAS ANTENAS</option>
                                @if (count($antenas) > 0)
                                    @foreach ($antenas as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="antena_id" />
                        </div>
                    @endif
                @endif

                <div class="w-full ">
                    <x-label value="Tipo recibo" />
                    <select class="w-full block rounded-lg border-gray-300 text-xs !p-2" wire:model.defer="seriepago_id">
                        <option value="">SELECCIONAR...</option>
                        @if (count($seriepagos) > 0)
                            @foreach ($seriepagos as $item)
                                <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                            @endforeach
                        @endif
                    </select>
                    <x-input-error for="seriepago_id" />
                </div>

                <div class="w-full">
                    <x-label value="Mes" />
                    <x-input class="w-full block rounded-lg text-xs !p-2" wire:model.lazy="month" type="month" />
                    <x-input-error for="month" />
                </div>

                {{-- <div class="w-full">
                    <x-label value="Fecha vencimiento" />
                    <x-input class="w-full block" wire:model.lazy="vencimiento" type="date" />
                    <x-input-error for="vencimiento" />
                </div> --}}

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
