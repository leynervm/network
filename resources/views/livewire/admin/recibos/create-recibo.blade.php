<div>
    <x-button wire:click="$toggle('open')">CREAR RECIBO</x-button>

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">GENERAR RECIBO</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
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
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="todos" value="TODOS" />
                            <label for="todos"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 dark:peer-hover:bg-neutral-600 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                                TODOS
                            </label>
                        </div>

                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="tv" value="{{ \App\Models\Network::TV }}" />
                            <label for="tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 dark:peer-hover:bg-neutral-600 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                                {{ \App\Models\Network::TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="fibra" value="{{ \App\Models\Network::FIBRA }}" />
                            <label for="fibra"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 dark:peer-hover:bg-neutral-600 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                                {{ \App\Models\Network::FIBRA }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="fibra_tv" value="{{ \App\Models\Network::FIBRA_TV }}" />
                            <label for="fibra_tv"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 dark:peer-hover:bg-neutral-600 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                                {{ \App\Models\Network::FIBRA_TV }}
                            </label>
                        </div>
                        <div>
                            <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type"
                                id="satelital" value="{{ \App\Models\Network::SATELITAL }}" />
                            <label for="satelital"
                                class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 dark:peer-hover:bg-neutral-600 peer-hover:text-white peer-focus:bg-neutral-600 peer-active:bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-neutral-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                                {{ \App\Models\Network::SATELITAL }}
                            </label>
                        </div>
                    </div>
                    <x-input-error for="type" />
                </div>

                <div class="w-full">
                    <x-label value="Seleccionar Lugar (Opcional)" />
                    <select class="w-full block rounded-lg border-gray-300 text-xs !p-2" wire:model.defer="location">
                        <option value="">TODOS LOS LUGARES</option>
                        @if (count($locations) > 0)
                            @foreach ($locations as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        @endif
                    </select>
                    <x-input-error for="location" />
                </div>

                <div class="w-full ">
                    <x-label value="Tipo recibo" />
                    <select class="w-full block rounded-lg border-gray-300 text-xs !p-2"
                        wire:model.defer="seriepago_id">
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
