<div>
    @if ($antenas->hasPages())
        <div class="w-full">
            {{ $antenas->links() }}
        </div>
    @endif

    @if (count($antenas) > 0)
        <div class="w-full flex gap-3 mt-5">
            @foreach ($antenas as $item)
                <div class="w-40 p-3 shadow rounded flex flex-col gap-1">
                    <span class="w-12 h-12 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="block w-full h-full">
                            <path
                                d="M20.3068 15.3312C16.7859 18.8521 11.1336 18.908 7.61276 15.3872C4.09192 11.8663 4.14799 6.21408 7.66883 2.69323M20.3068 15.3312C21.9837 13.6543 20.5139 9.46584 17.0241 5.97596C13.5342 2.48608 9.34571 1.01635 7.66883 2.69323M20.3068 15.3312C18.6299 17.0081 14.4414 15.5384 10.9516 12.0485M7.66883 2.69323C5.99196 4.37011 7.46169 8.55859 10.9516 12.0485M10.9516 12.0485L14 9" />
                            <path
                                d="M6.48804 15L4.75106 17.4884C3.3523 19.4923 2.65291 20.4942 3.17039 21.2471C3.68787 22 5.07589 22 7.85193 22H12.1481C14.9241 22 16.3121 22 16.8296 21.2471C17.301 20.5612 16.7625 19.6686 15.6053 18" />
                        </svg>
                    </span>
                    <h1 class="text-[10px] font-semibold text-center">{{ $item->name }}</h1>
                    <p class="text-[10px] leading-3">{{ $item->direccion }}</p>
                    <div class="w-full">
                        <x-button wire:click="edit({{ $item->id }})">EDIT</x-button>
                        <x-danger-button onclick="confirmDelete({{ $item->id }})"
                            wire:key="deleteantena_{{ $item->id }}">DELETE</x-danger-button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR ANTENA</h1>
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
                    <x-input class="w-full block" wire:model.defer="antena.name" />
                    <x-input-error for="antena.name" />
                </div>

                <div class="w-full">
                    <x-label value="Dirección" />
                    <x-input class="w-full block" wire:model.defer="antena.direccion" />
                    <x-input-error for="antena.direccion" />
                </div>

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        function confirmDelete(antena_id) {
            Swal.fire({
                title: 'Desea eliminar antena seleccionada ?',
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
                    @this.delete(antena_id);
                }
            })
        }
    </script>
</div>
