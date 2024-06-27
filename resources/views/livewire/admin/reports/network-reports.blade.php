<div>
    <form wire:submit.prevent="export"
        class="w-full bg-white border shadow rounded mt-5 p-5 md:max-w-md mx-auto grid grid-cols-1 gap-2">
        <div>
            <x-label value="Tipo internet" />
            <div class="w-full flex flex-wrap gap-2">
                <div>
                    <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type" id="fibra"
                        value="{{ \App\Models\Network::FIBRA }}" />
                    <label for="fibra"
                        class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ \App\Models\Network::FIBRA }}
                    </label>
                </div>
                <div>
                    <x-input class="hidden peer" type="radio" name="type" wire:model.defer="type" id="satelital"
                        value="{{ \App\Models\Network::SATELITAL }}" />
                    <label for="satelital"
                        class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ \App\Models\Network::SATELITAL }}
                    </label>
                </div>
            </div>
            <x-input-error for="type" />
        </div>
        <div class="w-full">
            <x-label value="Tipo local" />
            <select class="w-full block rounded-md border-gray-300 " wire:model.defer="typelocal">
                <option value="">SELECCIONAR...</option>
                <option value="{{ \App\Models\Network::ALQUILADO }}">
                    {{ \App\Models\Network::ALQUILADO }}
                </option>
                <option value="{{ \App\Models\Network::PROPIO }}">
                    {{ \App\Models\Network::PROPIO }}</option>
            </select>
            <x-input-error for="typelocal" />
        </div>

        <div class="w-full">
            <x-label value="Filtrar cliente" />
            <select class="w-full block rounded-md border-gray-300 " wire:model.defer="formapay_id">
                <option value="">SELECCIONAR...</option>
                @if (count($clients) > 0)
                    @foreach ($clients as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif

            </select>
            <x-input-error for="formapay_id" />
        </div>

        <div class="text-end">
            {{ print_r($errors->all()) }}
            <x-button type="submit" wire:loading.attr="disabled">
                EXPORTAR EXCEL</x-button>
        </div>
    </form>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('reportnetwork', () => ({
                // type: '0',
            }))
        })
    </script>
</div>
