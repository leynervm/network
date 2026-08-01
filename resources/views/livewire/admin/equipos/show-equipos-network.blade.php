<div>
    {{-- @if (count($network->equipos) > 0) --}}
    <div class="w-full">
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
                            <div class="flex items-center justify-end gap-1">
                                <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="edit_{{ $item->id }}" title="Editar"
                                    class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>

                                <button wire:click="delete({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="delete_{{ $item->id }}" title="Eliminar"
                                    class="inline-block p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white duration-150 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="size-4 block mx-auto">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    {{-- @endif --}}

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
