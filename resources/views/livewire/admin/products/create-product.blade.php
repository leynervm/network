<div x-data="loadimage()">
    <x-button wire:click="$set('open', true)" @click="image=null">
        REGISTRAR PRODUCTO</x-button>

    <x-dialog-modal wire:model="open" maxWidth="2xl" footerAlign="justify-end">
        <x-slot name="title">
            <h1 class="font-semibold text-[10px]">REGISTRAR PRODUCTO</h1>
            <button wire:click="$set('open', false)"
                class="rounded-md text-gray-700 p-2 hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-600 focus:text-gray-600 transition-colors ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="w-full">
                <div class="w-full relative">
                    <div class="w-full text-center">
                        <div
                            class="w-full h-60 relative mb-2 shadow-md shadow-shadowminicard rounded-xl overflow-hidden">
                            <template x-if="image">
                                <img id="image" class="object-scale-down block w-full h-full"
                                    :src="image" />
                            </template>
                            <template x-if="!image">
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
                            </template>
                        </div>


                        <div class="w-full flex items-center justify-center gap-2">
                            <template x-if="image">
                                <x-button class="!inline-flex !rounded-lg gap-2" wire:loading.attr="disabled" @click="reset">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                    LIMPIAR</x-button>
                            </template>

                            <label for="fileInput" type="button"
                                class="cursor-pointer text-[10px] inline-flex gap-2 justify-between items-center focus:outline-none hover:ring-2 hover:ring-ringbutton py-2 px-3 rounded-lg shadow-sm text-left text-colorbutton bg-fondobutton hover:bg-fondohoverbutton hover:text-colorhoverbutton font-semibold tracking-widest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-4 h-4"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" stroke="none"></rect>
                                    <path
                                        d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                    <circle cx="12" cy="13" r="3" />
                                </svg>
                                SELECCIONAR IMAGEN
                            </label>
                            <input name="photo" id="fileInput" accept="image/*" class="hidden disabled:opacity-25"
                                type="file" @change="loadlogo" wire:loading.attr="disabled" wire:model="image">
                        </div>
                    </div>

                    <x-input-error for="image" class="text-center" />
                </div>

                <div class="mt-2">
                    <x-label value="Nombre / Descripción :" />
                    <x-input class="block w-full" wire:model.defer="name"
                        placeholder="Ingrese nombre / descripción..." />
                    <x-input-error for="name" />
                </div>

                <div class="w-full mt-2 grid grid-cols-2 gap-2">
                    <div>
                        <x-label value="Modelo :" />
                        <x-input class="block w-full" wire:model.defer="modelo" />
                        <x-input-error for="modelo" />
                    </div>

                    <div>
                        <x-label value="Marca :" />
                        <div class="flex items-start gap-1">
                            <x-select-input wire:model.defer="marca_id" class="flex-1">
                                <option value="">SELECCIONAR MARCA</option>
                                @foreach ($marcas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select-input>

                            <x-button type="button" @click="openmarca=!openmarca" class="flex-shrink-0 p-2 h-full"
                                wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                            </x-button>
                        </div>
                        <x-input-error for="marca_id" />
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
                        <x-input class="block w-full" wire:model.defer="mac" placeholder="aa:aa:aa:aa" />
                        <x-input-error for="mac" />
                    </div>

                    <div>
                        <x-label value="Direccion IP :" />
                        <x-input class="block w-full" wire:model.defer="ip" placeholder="0.0.0.0" />
                        <x-input-error for="ip" />
                    </div>

                    <div>
                        <x-label value="Precio compra :" />
                        <x-input class="block w-full" wire:model.defer="pricebuy" placeholder="0.00" />
                        <x-input-error for="pricebuy" />
                    </div>

                    <div>
                        <x-label value="Stock :" />
                        <x-input class="block w-full" wire:model.defer="stock" placeholder="0.00" />
                        <x-input-error for="stock" />
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
        function loadimage() {
            return {
                image: null,
                openmarca: false,
                loadlogo() {
                    let file = document.getElementById('fileInput').files[0];
                    var reader = new FileReader();
                    reader.onload = (e) => this.image = e.target.result;
                    reader.readAsDataURL(file);
                },
                reset() {
                    this.image = null;
                    @this.clearImage();
                },

            }
        }
    </script>
</div>
