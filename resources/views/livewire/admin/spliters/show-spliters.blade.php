<div>
    @if (count($olt->spliters) > 0)
        <div class="w-full grid grid-cols-1 gap-12">
            @foreach ($olt->spliters as $item)
                <div class="w-full rounded shadow border p-1" wire:key="spliter_{{ $item->id }}">
                    <h1 class="p-1 text-sm font-semibold">{{ $item->name }}
                        <small>\ SPLITER {{ $item->outs }} SALIDAS</small>
                    </h1>

                    @if (count($item->boxnavs) > 0)
                        <div class="w-full flex flex-wrap justify-around gap-1">
                            @foreach ($item->boxnavs as $itemboxnav)
                                <div class="w-full max-w-xs lg:max-w-72 rounded shadow text-center border p-1">
                                    <h1 class="p-1 text-xs font-semibold">{{ $itemboxnav->name }}
                                        <small> - {{ $itemboxnav->outs }} SALIDAS</small>
                                    </h1>
                                    <div class="w-full grid grid-cols-4 gap-2 justify-items-center">
                                        @if (count($itemboxnav->portboxnavs) > 0)
                                            @foreach ($itemboxnav->portboxnavs as $portboxnav)
                                                <div
                                                    class="shadow border p-2 font-bold text-[8px] w-12 h-12 {{ $portboxnav->network ? 'bg-red-200 text-red-600' : 'bg-green-200 text-green-600' }}">
                                                    {{ $portboxnav->code }}
                                                </div>

                                                {{-- <button class="shadow border p-2 font-bold text-[8px] w-12 h-12"
                                                wire:click="createnetwork({{ $portboxnav->id }})"
                                                wire:key="createnetwork_{{ $portboxnav->id }}">
                                                {{ $portboxnav->code }}
                                            </button> --}}
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mt-2 w-full flex gap-2 justify-end">
                                        <x-button wire:click="editbox({{ $itemboxnav->id }})"
                                            wire:key="editbox_{{ $item->id }}_{{ $itemboxnav->id }}">EDITAR</x-button>

                                        <x-danger-button
                                            wire:key="deletebox_{{ $item->id }}_{{ $itemboxnav->id }}"
                                            onclick="confirmDeleteBox({{ $itemboxnav->id }})">
                                            ELIMINAR</x-danger-button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="w-full flex justify-between mt-3">
                        <div class="inline-flex gap-2">
                            @if (count($item->boxnavs) < $item->outs)
                                <x-button wire:click="addbooxnav({{ $item->id }})"
                                    wire:key="addbooxnav{{ $item->id }}">REGISTRAR CAJA NAP</x-button>
                            @endif
                            <x-button wire:click="editspliter({{ $item->id }})"
                                wire:key="editspliter{{ $item->id }}">EDITAR</x-button>
                        </div>

                        <div>
                            <form action="{{ route('admin.spliters.delete', $item->id) }}" method="post">
                                @method('put')
                                @csrf
                                <x-danger-button type="submit">
                                    ELIMINAR</x-danger-button>
                                {{-- <x-danger-button type="submit"
                                    wire:key="deletebox_{{ $item->id }}_{{ $itemboxnav->id }}"
                                    onclick="confirmDeleteBox({{ $itemboxnav->id }})">
                                    ELIMINAR</x-danger-button> --}}
                            </form>

                            {{-- <x-danger-button wire:loading.attr="disabled"
                                wire:key="deletespliter_{{ $olt->id }}_{{ $item->id }}"
                                onclick="confirmDeleteSpliter({{ $item->id }})">ELIMINAR</x-danger-button> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif



    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR CAJA NAP</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="saveboxnav" class="w-full grid grid-cols-1 gap-2" x-data="mufaboxnav">
                <div class="w-full" x-show="!allports">
                    <x-label value="Código" />
                    <x-input class="w-full block" x-model="code" maxlength="12" />
                    <x-input-error for="code" />
                </div>

                <div class="w-full" x-show="!allports">
                    <x-label value="Nombre / Dirección de CAJA NAP" />
                    {{-- <p class="border border-gray-300 rounded-md shadow-sm w-full block p-2.5">
                        <span>CAJA NAV </span>
                        <span x-text="code"></span>
                    </p> --}}
                    <x-input class="w-full block" wire:model.defer="name" />
                    <x-input-error for="name" />
                </div>

                <div class="w-full">
                    <x-label value="Puertos" />
                    <x-input class="w-full block" wire:model.defer="outs" type="number" min="1"
                        step="1" />
                    <x-input-error for="outs" />
                </div>
                <div>
                    <label class="inline-flex items-center gap-1" for="allports">
                        <x-input type="checkbox" x-model="allports" wire:loading.attr="disabled" id="allports" />
                        USAR DATOS PARA TODAS LAS CAJAS NAV
                    </label>
                    <span x-text="allports"></span>
                </div>
                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        REGISTRAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openspliter" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR SPLITER</h1>
            <button wire:click="$set('openspliter', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updatespliter" class="w-full grid grid-cols-1 gap-2">
                <div class="w-full">
                    <x-label value="Descripción" />
                    <x-input class="w-full block" wire:model.defer="spliter.name" />
                    <x-input-error for="spliter.name" />
                </div>
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label value="N° salidas" />
                        <x-input class="w-full block" wire:model.defer="spliter.outs" type="number" min="1"
                            step="1" />
                        <x-input-error for="spliter.outs" />
                    </div>
                </div>

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="openedit" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CAJA NAP</h1>
            <button wire:click="$set('openedit', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateboxnav" class="w-full grid grid-cols-1 gap-2" x-data="mufaboxnav">
                <div class="w-full">
                    <x-label value="Nombre / Dirección de CAJA NAP" />
                    <x-input class="w-full block" wire:model.defer="editname" />
                    <x-input-error for="editname" />
                </div>

                <div class="w-full">
                    <x-label value="Código" />
                    <x-input class="w-full block" wire:model.defer="editcode" maxlength="12" />
                    <x-input-error for="editcode" />
                </div>

                <div class="w-full">
                    <x-label value="Puertos" />
                    <x-input class="w-full block" wire:model.defer="editouts" type="number" min="1"
                        step="1" />
                    <x-input-error for="editouts" />
                </div>
                <div class="text-end">
                    {{ print_r($errors->all()) }}
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mufaboxnav', () => ({
                allports: @entangle('allports').defer,
                code: @entangle('code').defer,
            }))
        })

        function confirmDeleteSpliter(spliter_id) {
            Swal.fire({
                title: 'Desea eliminar spliter seleccionado ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(spliter_id);
                }
            })
        }

        function confirmDeleteBox(boxnav_id) {
            Swal.fire({
                title: 'Desea eliminar caja nap seleccionado ?',
                text: "El registro dejará de estar disponible en la base de datos, incluyendo sus registros vinculados.",
                icon: 'question',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ELIMINAR',
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteboxnav(boxnav_id);
                }
            })
        }
    </script>

</div>
