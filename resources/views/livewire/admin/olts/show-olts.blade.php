<div>
    @if ($olts->hasPages())
        {{ $olt->links() }}
    @endif


    @if (count($olts) > 0)
        <div class="w-full flex flex-col gap-3 mt-3">
            @foreach ($olts as $item)
                <a href="{{ route('admin.olts.show', $item->id) }}"
                    class="w-full p-3 rounded-xl bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700/80 shadow-sm hover:shadow-md hover:border-indigo-500 dark:hover:border-indigo-500 transition-all duration-200 flex justify-between items-center gap-3 group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 border border-indigo-100 dark:border-indigo-800/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-105 transition-transform shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xs font-bold text-gray-800 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $item->name }}</h1>
                            <span class="inline-block mt-0.5 px-2 py-0.5 bg-gray-100 dark:bg-neutral-700/60 text-gray-600 dark:text-gray-300 text-[10px] font-semibold rounded-md border border-gray-200/60 dark:border-neutral-600/60">{{ $item->outs }} SALIDAS</span>
                        </div>
                    </div>
                    <div class="flex gap-1 items-center">
                        <button type="button" wire:click.stop="edit({{ $item->id }})" wire:loading.attr="disabled"
                            onclick="event.preventDefault(); event.stopPropagation();" title="Editar OLT"
                            class="p-1.5 rounded-lg text-orange-500 hover:bg-orange-500 hover:text-white dark:hover:bg-orange-600 duration-150 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-4 block mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button type="button" onclick="event.preventDefault(); event.stopPropagation(); confirmDeleteOLT({{ $item }});"
                            wire:loading.attr="disabled" title="Eliminar OLT"
                            class="p-1.5 rounded-lg text-red-500 hover:bg-red-500 hover:text-white dark:hover:bg-red-600 duration-150 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-4 block mx-auto">
                                <path d="M10 12V17" />
                                <path d="M14 12V17" />
                                <path d="M4 7H20" />
                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                            </svg>
                        </button>
                    </div>
                </a>
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
