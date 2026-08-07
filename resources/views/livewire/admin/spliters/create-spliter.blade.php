<div>
    <x-button wire:click="$set('open', true)" wire:key="createspliter">
        REGISTRAR SPLITER</x-button>

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR SPLITER</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="w-full grid grid-cols-1 gap-2" x-data="spliter">
                <div class="w-full" x-show="!allspliters" style ="display: none;">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="name" />
                    <x-input-error for="name" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full" x-show="!allspliters" style ="display: none;">
                        <x-label value="Código" />
                        <x-input class="w-full block" wire:model.defer="code" />
                        <x-input-error for="code" />
                    </div>
                    <div class="w-full">
                        <x-label value="N° salidas" />
                        <x-input class="w-full block" wire:model.defer="outs" type="number" min="1"
                            step="1" />
                        <x-input-error for="outs" />
                    </div>
                </div>

                <div>
                    <label class="inline-flex items-center gap-1" for="allspliters">
                        <x-input type="checkbox" x-model="allspliters" wire:loading.attr="disabled" id="allspliters" />
                        USAR DATOS PARA TODAS LAS SALIDAS
                    </label>
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
            Alpine.data('spliter', () => ({
                allspliters: @entangle('allspliters').defer,
            }))
        })
    </script>
</div>
