<div x-data="loadeditimage()">

    <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-sm">
            <x-label value="Buscar producto" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>

        @if (count($marcas) > 0)
            <div class="w-full max-w-xs">
                <x-label value="Filtrar marca" />
                <x-select-input class="w-full" wire:model.lazy="searchmarca">
                    <option value="">SELECCIONAR...</option>
                    @foreach ($marcas as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-select-input>
            </div>
        @endif
    </div>

    <div class="w-full">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>DESCRIPCIÓN PRODUCTO</th>
                    <th>MARCA</th>
                    <th>DIRECCION IP</th>
                    <th>DIRECCION MAC</th>
                    <th>PRECIO COMPRA</th>
                    {{-- <th>PRECIO VENTA</th> --}}
                    <th>STOCK</th>
                    <th></th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($products) > 0)
                    @foreach ($products as $item)
                        <tr>
                            <td class="flex gap-1">
                                @if ($item->image)
                                    <img src="{{ $item->getImage() }}" alt=""
                                        class="w-24 h-24 flex-shrink-0 object-cover rounded overflow-hidden">
                                @endif
                                <p class="flex-1 w-full">{{ $item->name }}</p>
                            </td>
                            <td class="text-center uppercase w-[100px]">
                                @if ($item->marca)
                                    {{ $item->marca->name }}
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $item->ip }}</td>
                            <td class="text-center">
                                {{ $item->mac }}
                            </td>
                            <td class="text-center">S/.
                                {{ number_format($item->pricebuy, 2, '.', ', ') }}
                            </td>
                            <td class="text-center">
                                <p class="block w-full">{{ number_format($item->stock, 0, '.', '') }} UND</p>

                                @if ($item->stock < 1)
                                    <span
                                        class="bg-red-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3">
                                        AGOTADO</span>
                                @else
                                    <span
                                        class="bg-green-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3">
                                        DISPONIBLE</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                        wire:key="edit_{{ $item->id }}" @click="reset"
                                        class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-6 h-6 block mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>

                                    <x-danger-button onclick="confirmDeleteProduct({{ $item }})"
                                        wire:loading.attr="disabled" wire:key="delete_{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-4 h-4">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>

    @if ($products->hasPages())
        <div class="sticky bottom-2 z-10 w-full mt-4">
            {{ $products->links() }}
        </div>
    @endif

    <x-dialog-modal wire:model="open" maxWidth="2xl" footerAlign="justify-end">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PRODUCTO</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" class="w-full">
                <div class="w-full relative">
                    <div class="w-full h-60 relative mb-2 shadow-md shadow-shadowminicard rounded-xl overflow-hidden">
                        <template x-if="editimage">
                            <img id="editimage" class="object-scale-down block w-full h-full" :src="editimage" />
                        </template>
                        <template x-if="!editimage">
                            @if ($product->image)
                                <img id="editimage" class="object-scale-down block w-full h-full"
                                    src="{{ $product->getImage() }}" />
                            @else
                                <span class="block w-auto h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-full h-full">
                                        <line x1="2" x2="22" y1="2" y2="22" />
                                        <path d="M10.41 10.41a2 2 0 1 1-2.83-2.83" />
                                        <line x1="13.5" x2="6" y1="13.5" y2="21" />
                                        <line x1="18" x2="21" y1="12" y2="15" />
                                        <path
                                            d="M3.59 3.59A1.99 1.99 0 0 0 3 5v14a2 2 0 0 0 2 2h14c.55 0 1.052-.22 1.41-.59" />
                                        <path d="M21 15V5a2 2 0 0 0-2-2H9" />
                                    </svg>
                                </span>
                            @endif
                        </template>
                    </div>

                    <div class="w-full flex flex-wrap gap-2 justify-center">
                        <template x-if="editimage">
                            <x-button class="inline-flex !rounded-lg" wire:loading.attr="disabled" @click="reset">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                                LIMPIAR
                            </x-button>
                        </template>

                        @if ($product->image)
                            <x-button x-cloak x-show="editimage == null" class="inline-flex !rounded-lg"
                                wire:loading.attr="disabled" wire:click="deleteimage" wire:key="buttondeletelogo">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                                ELIMINAR IMAGEN
                            </x-button>
                        @endif

                        <label for="editFileInput" type="button"
                            class="cursor-pointer text-[10px] inine-flex justify-between items-center focus:outline-none hover:ring-2 hover:ring-ringbutton py-2 px-4 rounded-lg shadow-sm text-left text-colorbutton bg-fondobutton hover:bg-fondohoverbutton hover:text-colorhoverbutton font-semibold tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="0" y="0" stroke="none"></rect>
                                <path
                                    d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                            SELECCIONAR IMAGEN
                        </label>
                        <input name="photo" id="editFileInput" accept="image/*" class="hidden disabled:opacity-25"
                            type="file" @change="loadlogo" wire:loading.attr="disabled" wire:model="image">
                    </div>
                    <x-input-error for="image" class="text-center" />
                </div>

                <div class="mt-2">
                    <x-label value="Nombre / Descripción :" />
                    <x-input class="block w-full" wire:model.defer="product.name"
                        placeholder="Ingrese nombre / descripción..." />
                    <x-input-error for="product.name" />
                </div>

                <div class="w-full mt-2 grid grid-cols-2 gap-2">
                    <div>
                        <x-label value="Modelo :" />
                        <x-input class="block w-full" wire:model.defer="product.modelo" />
                        <x-input-error for="product.modelo" />
                    </div>

                    <div>
                        <x-label value="Marca :" />
                        <div class="flex items-start gap-1">
                            <x-select-input wire:model.defer="product.marca_id" class="flex-1">
                                <option value="">SELECCIONAR MARCA</option>
                                @foreach ($marcas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select-input>

                            <x-button type="button" @click="openmarca=!openmarca" class="flex-shrink-0 p-3 h-full"
                                wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                            </x-button>
                        </div>
                        <x-input-error for="product.marca_id" />
                    </div>

                    <div class="col-span-2" style="display: none" x-show="openmarca">
                        <x-label value="Marca :" />
                        <div class="flex items-start gap-1">
                            <x-input class="block w-full" wire:keydown.enter="savemarca" wire:model.defer="marca"
                                placeholder="Ingrese nombre de marca..." />
                            <x-button type="button" wire:click="savemarca" class="flex-shrink-0 p-2.5 h-full"
                                wire:loading.attr="disabled">
                                GUARDAR MARCA
                            </x-button>
                        </div>
                        <x-input-error for="marca" />
                    </div>

                    <div>
                        <x-label value="Direccióm MAC :" />
                        <x-input class="block w-full" wire:model.defer="product.mac" placeholder="aa:aa:aa:aa" />
                        <x-input-error for="product.mac" />
                    </div>

                    <div>
                        <x-label value="Direccion IP :" />
                        <x-input class="block w-full" wire:model.defer="product.ip" placeholder="0.0.0.0" />
                        <x-input-error for="product.ip" />
                    </div>

                    <div>
                        <x-label value="Precio compra :" />
                        <x-input class="block w-full" wire:model.defer="product.pricebuy" placeholder="0.00" />
                        <x-input-error for="product.pricebuy" />
                    </div>

                    <div>
                        <x-label value="Stock :" />
                        <x-input class="block w-full" wire:model.defer="product.stock" placeholder="0.00" />
                        <x-input-error for="product.stock" />
                    </div>
                </div>

                <div class="w-full flex pt-4 justify-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        {{ __('REGISTRAR') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-dialog-modal>

    <script>
        function loadeditimage() {
            return {
                editimage: null,
                openmarca: false,
                loadlogo() {
                    let file = document.getElementById('editFileInput').files[0];
                    var reader = new FileReader();
                    reader.onload = (e) => this.editimage = e.target.result;
                    reader.readAsDataURL(file);
                },
                reset() {
                    this.editimage = null;
                    @this.clearImage();
                },

            }
        }


        function confirmDeleteProduct(product) {
            Swal.fire({
                title: 'Eliminar producto, ' + product.name + ' ?',
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
                    @this.delete(product.id);
                }
            })
        }
    </script>
</div>
