<div>
    @if ($olts->hasPages())
        {{ $olt->links() }}
    @endif


    @if (count($olts) > 0)
        <div class="w-full flex flex-col gap-3 mt-3">
            @foreach ($olts as $item)
                <div class="w-full p-2 rounded-md shadow hover:shadow-xl flex justify-between items-center gap-2">
                    <div>
                        <h1 class="text-xs font-semibold">{{ $item->name }}</h1>
                        <small>{{ $item->outs }} SALIDAS</small>
                    </div>
                    <div class="flex gap-1 items-center">
                        <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                            class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6 block mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button onclick="confirmDeleteOLT({{ $item }})" wire:loading.attr="disabled"
                            class="inline-block p-1 rounded-md text-red-500 hover:bg-red-500 hover:text-white duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6 block mx-auto">
                                <path d="M10 12V17" />
                                <path d="M14 12V17" />
                                <path d="M4 7H20" />
                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                            </svg>
                        </button>
                        <a class="inline-block p-1 rounded-md text-neutral-500 hover:bg-neutral-500 hover:text-white duration-150"
                            href="{{ route('admin.olts.show', $item->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6 block mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12H21M12 8V12M6.5 12V16M17.5 12V16M10.1 8H13.9C14.4601 8 14.7401 8 14.954 7.89101C15.1422 7.79513 15.2951 7.64215 15.391 7.45399C15.5 7.24008 15.5 6.96005 15.5 6.4V4.6C15.5 4.03995 15.5 3.75992 15.391 3.54601C15.2951 3.35785 15.1422 3.20487 14.954 3.10899C14.7401 3 14.4601 3 13.9 3H10.1C9.53995 3 9.25992 3 9.04601 3.10899C8.85785 3.20487 8.70487 3.35785 8.60899 3.54601C8.5 3.75992 8.5 4.03995 8.5 4.6V6.4C8.5 6.96005 8.5 7.24008 8.60899 7.45399C8.70487 7.64215 8.85785 7.79513 9.04601 7.89101C9.25992 8 9.53995 8 10.1 8ZM15.6 21H19.4C19.9601 21 20.2401 21 20.454 20.891C20.6422 20.7951 20.7951 20.6422 20.891 20.454C21 20.2401 21 19.9601 21 19.4V17.6C21 17.0399 21 16.7599 20.891 16.546C20.7951 16.3578 20.6422 16.2049 20.454 16.109C20.2401 16 19.9601 16 19.4 16H15.6C15.0399 16 14.7599 16 14.546 16.109C14.3578 16.2049 14.2049 16.3578 14.109 16.546C14 16.7599 14 17.0399 14 17.6V19.4C14 19.9601 14 20.2401 14.109 20.454C14.2049 20.6422 14.3578 20.7951 14.546 20.891C14.7599 21 15.0399 21 15.6 21ZM4.6 21H8.4C8.96005 21 9.24008 21 9.45399 20.891C9.64215 20.7951 9.79513 20.6422 9.89101 20.454C10 20.2401 10 19.9601 10 19.4V17.6C10 17.0399 10 16.7599 9.89101 16.546C9.79513 16.3578 9.64215 16.2049 9.45399 16.109C9.24008 16 8.96005 16 8.4 16H4.6C4.03995 16 3.75992 16 3.54601 16.109C3.35785 16.2049 3.20487 16.3578 3.10899 16.546C3 16.7599 3 17.0399 3 17.6V19.4C3 19.9601 3 20.2401 3.10899 20.454C3.20487 20.6422 3.35785 20.7951 3.54601 20.891C3.75992 21 4.03995 21 4.6 21Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR OLT</h1>
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
                    <x-input class="w-full block" wire:model.defer="olt.name" />
                    <x-input-error for="olt.name" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="N° salidas" />
                        <x-input class="w-full block" wire:model.defer="olt.outs" type="number" min="1"
                            step="1" />
                        <x-input-error for="olt.outs" />
                    </div>
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        function confirmDeleteOLT(olt) {
            Swal.fire({
                title: 'Eliminar registro de OLT con descripción ' + olt.name + ' ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo todos sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                cancelButtonText: 'CANCELAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(olt.id);
                }
            })
        }
    </script>
</div>
