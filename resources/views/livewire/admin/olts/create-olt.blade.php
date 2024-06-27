<div>
    <x-button wire:click="$set('open', true)">
        REGISTRAR OLT</x-button>

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR OLT</h1>
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
                <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="name" />
                    <x-input-error for="name" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="N° salidas" />
                        <x-input class="w-full block" wire:model.defer="outs" type="number" min="1"
                            step="1" />
                        <x-input-error for="outs" />
                    </div>
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
