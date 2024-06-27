<div>
    @if (count($network->equipos) > 0)
        <div class="w-full mb-8">

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th class="text-left">DESCRIPCION</th>
                        <th>TIPO ENTREGA</th>
                        <th>PRECIO</th>
                        <th class="sr-only">OPCIONES</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($network->equipos as $item)
                        <tr>
                            <td class="text-left">
                                {{ $item->descripcion }}
                                @if ($item->mac)
                                    <p class="text-[10px] text-neutral-500">MAC: {{ $item->mac }}</p>
                                @endif
                            </td>
                            <td class="text-center uppercase">{{ $item->type }}</td>
                            <td class="text-center">{{ $item->price }}</td>
                            <td class="text-end">
                                <x-button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="edit_{{ $item->id }}">EDITAR</x-button>
                                <x-danger-button wire:click="delete({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="delete_{{ $item->id }}">ELIMINAR</x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR EQUIPO</h1>
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
                <div class="w-full grid lg:grid-cols-2 gap-2">
                    <div class="lg:col-span-2">
                        <x-label value="Agregar equipo" />
                        <x-input class="w-full block" wire:model.defer="equipo.descripcion" />
                        <x-input-error for="equipo.descripcion" />
                    </div>

                    <div class="w-full">
                        <x-label value="Tipo entrega" />
                        <select class="w-full block rounded-md border-gray-300 " wire:model.defer="equipo.type">
                            <option value="">SELECCIONAR...</option>
                            <option value="{{ \App\Models\Network::ALQUILADO }}">
                                {{ \App\Models\Network::EQUIPO_ALQUILADO }}
                            </option>
                            <option value="{{ \App\Models\Network::EQUIPO_VENDIDO }}">
                                {{ \App\Models\Network::EQUIPO_VENDIDO }}</option>
                        </select>
                        <x-input-error for="equipo.type" />
                    </div>
                    <div class="w-full">
                        <x-label value="Precio" />
                        <x-input class="w-full block" wire:model.defer="equipo.price" type="number" step="0.01"
                            min="0" />
                        <x-input-error for="equipo.price" />
                    </div>
                    <div class="w-full">
                        <x-label value="MAC" />
                        <x-input class="w-full block" wire:model.defer="equipo.mac" />
                        <x-input-error for="equipo.mac" />
                    </div>
                </div>

                <div class="text-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        ACTUALIZAR</x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

</div>
