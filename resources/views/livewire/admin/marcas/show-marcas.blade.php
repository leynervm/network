<div>
    @if ($marcas->hasPages())
        <div class="w-full">
            {{ $marcas->links() }}
        </div>
    @endif

    @if (count($marcas) > 0)
        <div class="w-full flex gap-3 mt-5">
            @foreach ($marcas as $item)
                <div class="w-40 p-3 shadow rounded flex flex-col gap-1">
                    <h1 class="text-[10px] font-semibold text-center">{{ $item->name }}</h1>
                    <div class="w-full flex justify-end items-end gap-1 mt-2">
                        <x-button wire:click="edit({{ $item->id }})">EDITAR</x-button>
                        <x-danger-button onclick="confirmDeleteMarca({{ $item }})"
                            wire:key="deleteantena_{{ $item->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-4 h-4">
                                <path d="M3 6h18" />
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                <line x1="10" x2="10" y1="11" y2="17" />
                                <line x1="14" x2="14" y1="11" y2="17" />
                            </svg>
                        </x-danger-button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR MARCA</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="marca.name" />
                    <x-input-error for="marca.name" />
                </div>

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        function confirmDeleteMarca(marca) {
            Swal.fire({
                title: 'Desea eliminar marca, ' + marca.name + ' ?',
                text: "El registro dejará de estar disponible en la base de datos.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(marca.id);
                }
            })
        }
    </script>
</div>
