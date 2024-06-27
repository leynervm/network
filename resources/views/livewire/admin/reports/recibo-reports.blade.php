<div>
    <form wire:submit.prevent="export"
        class="w-full bg-white border shadow rounded mt-5 p-5 md:max-w-md mx-auto grid grid-cols-1 gap-2">
        <div>
            <x-label value="Filtrar serie recibo" />
            <x-input class="w-full block" wire:model.defer="search" />
            <x-input-error for="type" />
        </div>
        <div class="w-full">
            <x-label value="Filtrar mes" />
            <x-input class="w-full block" wire:model.defer="month" type="month" />
            <x-input-error for="typelocal" />
        </div>
        <div class="w-full">
            <x-label value="Filtrar forma pago" />
            <select class="w-full block rounded-md border-gray-300 " wire:model.defer="formapay_id">
                <option value="">SELECCIONAR...</option>
                {{-- @if (count($clients) > 0)
                    @foreach ($clients as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif --}}

            </select>
            <x-input-error for="formapay_id" />
        </div>

        <div class="text-end">
            {{ print_r($errors->all()) }}
            <x-button type="submit" wire:loading.attr="disabled">
                EXPORTAR EXCEL</x-button>
        </div>
    </form>
</div>
