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
                            <div class="flex items-center justify-end gap-1.5">
                                <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="edit_{{ $item->id }}" title="Editar Equipo"
                                    class="inline-flex items-center justify-center p-1.5 rounded-lg bg-indigo-50 hover:bg-indigo-100 dark:bg-indigo-500/10 dark:hover:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-500/30 transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="delete_{{ $item->id }}" title="Eliminar Equipo"
                                    class="inline-flex items-center justify-center p-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 dark:bg-rose-500/10 dark:hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 border border-rose-200 dark:border-rose-500/30 transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
