@props(['options' => [], 'searchable' => true, 'placeholder' => 'SELECCIONAR...'])

@php
    $formattedOptions = collect($options)
        ->map(function ($item) {
            $active = true;
            if (is_array($item)) {
                $item = (object) $item;
            }

            if (isset($item->departamento) && isset($item->provincia) && isset($item->distrito)) {
                $label = "{$item->departamento} - {$item->provincia} - {$item->distrito}";
            } else {
                $label = $item->label ?? ($item->name ?? ($item->descripcion ?? ($item->text ?? ($item->code ?? ''))));
                if (isset($item->alias) && $item->alias) {
                    $label = "{$label} - {$item->alias}";
                }
                if (isset($item->network) && $item->network) {
                    $label = "{$label} (Ocupado)";
                    $active = false;
                }
            }

            return [
                'id' => $item->id,
                'label' => $label,
                'search_text' => isset($item->ubigeo_reniec) ? "{$label} {$item->ubigeo_reniec}" : $label,
                'active' => $active,
            ];
        })
        ->values();
@endphp

<div x-data="{
    open: false,
    search: '',
    value: @entangle($attributes->wire('model')),
    selectedName: '',
    options: {{ $formattedOptions->toJson() }},
    searchable: {{ json_encode($searchable) }},
    highlightedIndex: -1,
    get filteredOptions() {
        if (!this.search.trim()) {
            if (this.value) {
                const idx = this.options.findIndex(o => o.id == this.value);
                if (idx !== -1 && idx >= 50) {
                    return this.options.slice(0, idx + 20);
                }
            }
            return this.options.slice(0, 50);
        }
        const term = this.search.toLowerCase();
        return this.options.filter(item => {
            return item.search_text.toLowerCase().includes(term);
        }).slice(0, 50);
    },
    select(id, name) {
        this.open = false;
        this.selectedName = name;
        this.search = '';
        this.value = id;
        if (document.activeElement) {
            document.activeElement.blur();
        }
    },
    updateSelectedName() {
        if (!this.value) {
            this.selectedName = '';
            return;
        }
        const found = this.options.find(o => o.id == this.value);
        if (found) {
            this.selectedName = found.label;
        } else {
            this.selectedName = '';
        }
    },
    highlightNext() {
        if (!this.open) {
            this.open = true;
            this.highlightedIndex = 0;
            return;
        }
        const count = this.filteredOptions.length;
        if (count === 0) return;
        this.highlightedIndex = (this.highlightedIndex + 1) % count;
    },
    highlightPrevious() {
        if (!this.open) {
            this.open = true;
            this.highlightedIndex = 0;
            return;
        }
        const count = this.filteredOptions.length;
        if (count === 0) return;
        this.highlightedIndex = (this.highlightedIndex - 1 + count) % count;
    },
    selectHighlighted() {
        if (this.open && this.highlightedIndex >= 0 && this.highlightedIndex < this.filteredOptions.length) {
            const item = this.filteredOptions[this.highlightedIndex];
            this.select(item.id, item.label);
        } else {
            this.open = !this.open;
        }
    },
    initComponent(el) {
        const self = this;
        self.updateSelectedName();
        self.$watch('value', () => self.updateSelectedName());
        self.$watch('search', () => self.highlightedIndex = 0);
        self.$watch('open', (val) => {
            if (val) {
                const idx = self.filteredOptions.findIndex(o => o.id == self.value);
                self.highlightedIndex = idx !== -1 ? idx : 0;
                self.$nextTick(() => {
                    if (self.searchable && self.options.length > 10) {
                        const input = el.querySelector('input[type=text]');
                        if (input) input.focus();
                    }
                    setTimeout(() => {
                        const list = el.querySelector('ul');
                        if (list) {
                            const items = list.querySelectorAll('li:not(.text-center)');
                            if (items[self.highlightedIndex]) {
                                items[self.highlightedIndex].scrollIntoView({ block: 'center' });
                            }
                        }
                    }, 50);
                });
            } else {
                self.highlightedIndex = -1;
            }
        });
        self.$watch('highlightedIndex', (index) => {
            if (index < 0) return;
            self.$nextTick(() => {
                const list = el.querySelector('ul');
                if (!list) return;
                const items = list.querySelectorAll('li:not(.text-center)');
                if (items[index]) {
                    items[index].scrollIntoView({ block: 'nearest' });
                }
            });
        });
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-options') {
                    self.options = JSON.parse(el.getAttribute('data-options') || '[]');
                    self.updateSelectedName();
                }
            });
        });
        observer.observe(el, { attributes: true });

        // Global Livewire Hook & Event Listeners to ensure dropdown closes during loading/updates
        const closeDropdown = () => { self.open = false; };
        document.addEventListener('livewire:update', closeDropdown);
        if (window.Livewire) {
            window.Livewire.hook('message.sent', closeDropdown);
        } else {
            document.addEventListener('livewire:load', () => {
                window.Livewire.hook('message.sent', closeDropdown);
            });
        }
    }
}" x-init="initComponent($el)" 
@keydown.arrow-down.prevent="highlightNext()" 
@keydown.arrow-up.prevent="highlightPrevious()" 
@keydown.enter.prevent="selectHighlighted()" 
@keydown.escape.prevent="open = false" 
@click.away="open = false" 
data-options="{{ $formattedOptions->toJson() }}"
{{ $attributes->merge(['class' => 'relative w-full']) }}>

    <button type="button" @click="open = !open" wire:ignore wire:loading.attr="disabled"
        class="w-full text-left text-[10px] py-2 pl-2 pr-8 relative bg-white dark:bg-neutral-800 dark:text-white rounded-lg shadow-sm border border-gray-300 dark:border-neutral-700 transition-all duration-200 outline-none focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 disabled:opacity-60 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-neutral-900/50"
        :class="open ? 'border-indigo-500 ring-1 ring-indigo-500' : ''">
        <span class="truncate block pr-2" x-text="selectedName || '{{ $placeholder }}'"></span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <div x-show="open" style="display: none;" wire:ignore
        class="absolute z-[999] mt-1 w-full bg-white dark:bg-neutral-800 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-lg max-h-60 overflow-hidden flex flex-col transition-all">

        <div x-show="searchable && options.length > 10" class="p-1 border-b border-gray-200 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-800">
            <input type="text" x-model="search" @keydown.enter.prevent="" @input.stop="" @change.stop="" placeholder="Buscar..." wire:loading.attr="disabled"
                class="w-full px-2 py-2 text-[10px] border border-gray-300 dark:border-neutral-700 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 bg-white dark:bg-neutral-800 dark:text-white disabled:opacity-60 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-neutral-900/50" />
        </div>

        <ul @mouseleave="highlightedIndex = -1" class="overflow-y-auto flex-1 max-h-48 py-1">
            <template x-for="(item, index) in filteredOptions" :key="item.id">
                <li @mousedown.prevent.stop="if (item.active) select(item.id, item.label)"
                    @mouseenter="if (item.active) highlightedIndex = index"
                    :class="item.active ? { 
                        'bg-neutral-300 dark:bg-neutral-500 text-neutral-900 dark:text-white font-bold': item.id == value && index === highlightedIndex,
                        'bg-neutral-200 dark:bg-neutral-600 text-neutral-900 dark:text-white font-bold': item.id == value && index !== highlightedIndex,
                        'bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-white': item.id != value && index === highlightedIndex,
                        'text-gray-900 dark:text-neutral-300': item.id != value && index !== highlightedIndex,
                        'cursor-pointer': true
                    } : 'opacity-50 cursor-not-allowed select-none relative py-2 pl-2 pr-9 text-[10px] text-gray-400 bg-gray-50/50 dark:bg-neutral-800/30 dark:text-neutral-500'"
                    class="select-none relative py-2 pl-2 pr-9 text-[10px] transition-colors duration-150">
                    <span x-text="item.label"></span>
                    <span x-show="item.active && item.id == value" class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                </li>
            </template>
            <li x-show="filteredOptions.length === 0"
                class="py-2 text-center text-[10px] text-gray-500 dark:text-neutral-400">
                No se encontraron resultados
            </li>
        </ul>
    </div>
</div>
