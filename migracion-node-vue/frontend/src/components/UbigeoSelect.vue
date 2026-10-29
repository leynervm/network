<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted } from 'vue';

interface OptionItem {
  id: string | number;
  label?: string;
  name?: string;
  descripcion?: string;
  code?: string;
  alias?: string;
  network?: any;
  departamento?: string;
  provincia?: string;
  distrito?: string;
  ubigeo_reniec?: string;
  active?: boolean;
}

const props = withDefaults(
  defineProps<{
    options?: OptionItem[];
    modelValue?: string | number | null;
    searchable?: boolean;
    placeholder?: string;
    disabled?: boolean;
  }>(),
  {
    options: () => [],
    modelValue: '',
    searchable: true,
    placeholder: 'SELECCIONAR...',
    disabled: false,
  }
);

const emit = defineEmits<{
  (e: 'update:modelValue', val: string | number): void;
  (e: 'change', val: string | number): void;
}>();

const open = ref(false);
const search = ref('');
const highlightedIndex = ref(-1);
const rootRef = ref<HTMLElement | null>(null);

const formattedOptions = computed(() => {
  return (props.options || []).map((item) => {
    let active = true;
    let label = '';
    if (item.departamento && item.provincia && item.distrito) {
      label = `${item.departamento} - ${item.provincia} - ${item.distrito}`;
    } else {
      label = item.label || item.name || item.descripcion || item.code || '';
      if (item.alias) {
        label = `${label} - ${item.alias}`;
      }
      if (item.network) {
        if (props.modelValue && String(item.id) === String(props.modelValue)) {
          label = `${label} (Actual)`;
          active = true;
        } else {
          label = `${label} (Ocupado)`;
          active = false;
        }
      }
    }
    const searchText = item.ubigeo_reniec ? `${label} ${item.ubigeo_reniec}` : label;
    return {
      id: item.id,
      label,
      search_text: searchText,
      active: item.active !== undefined ? item.active : active,
    };
  });
});

const filteredOptions = computed(() => {
  if (!search.value.trim()) {
    if (props.modelValue) {
      const idx = formattedOptions.value.findIndex((o) => String(o.id) === String(props.modelValue));
      if (idx !== -1 && idx >= 50) {
        return formattedOptions.value.slice(0, idx + 20);
      }
    }
    return formattedOptions.value.slice(0, 50);
  }
  const term = search.value.toLowerCase();
  return formattedOptions.value
    .filter((item) => item.search_text.toLowerCase().includes(term))
    .slice(0, 50);
});

const selectedName = computed(() => {
  if (!props.modelValue) return '';
  const found = formattedOptions.value.find((o) => String(o.id) === String(props.modelValue));
  return found ? found.label : '';
});

function select(id: string | number, name: string) {
  open.value = false;
  search.value = '';
  emit('update:modelValue', id);
  emit('change', id);
}

function highlightNext() {
  if (!open.value) {
    open.value = true;
    highlightedIndex.value = 0;
    return;
  }
  const count = filteredOptions.value.length;
  if (count === 0) return;
  highlightedIndex.value = (highlightedIndex.value + 1) % count;
}

function highlightPrevious() {
  if (!open.value) {
    open.value = true;
    highlightedIndex.value = 0;
    return;
  }
  const count = filteredOptions.value.length;
  if (count === 0) return;
  highlightedIndex.value = (highlightedIndex.value - 1 + count) % count;
}

function selectHighlighted() {
  if (open.value && highlightedIndex.value >= 0 && highlightedIndex.value < filteredOptions.value.length) {
    const item = filteredOptions.value[highlightedIndex.value];
    if (item.active) {
      select(item.id, item.label);
    }
  } else {
    open.value = !open.value;
  }
}

function handleClickOutside(e: MouseEvent) {
  if (rootRef.value && !rootRef.value.contains(e.target as Node)) {
    open.value = false;
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
  <div
    ref="rootRef"
    class="relative w-full"
    @keydown.down.prevent="highlightNext"
    @keydown.up.prevent="highlightPrevious"
    @keydown.enter.prevent="selectHighlighted"
    @keydown.esc.prevent="open = false"
  >
    <button
      type="button"
      :disabled="disabled"
      @click="open = !open"
      class="w-full text-left text-[10px] py-2 pl-2 pr-8 relative bg-white dark:bg-neutral-800 dark:text-white rounded-lg shadow-sm border border-gray-300 dark:border-neutral-700 transition-all duration-200 outline-none focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 disabled:opacity-60 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-neutral-900/50"
      :class="open ? 'border-indigo-500 ring-1 ring-indigo-500' : ''"
    >
      <span class="truncate block pr-2">{{ selectedName || placeholder }}</span>
      <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
          <path
            fill-rule="evenodd"
            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </span>
    </button>

    <div
      v-show="open"
      class="absolute z-[999] mt-1 w-full bg-white dark:bg-neutral-800 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-lg max-h-60 overflow-hidden flex flex-col transition-all"
    >
      <div v-show="searchable && formattedOptions.length > 10" class="p-1 border-b border-gray-200 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-800">
        <input
          type="text"
          v-model="search"
          placeholder="Buscar..."
          class="w-full px-2 py-2 text-[10px] border border-gray-300 dark:border-neutral-700 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 bg-white dark:bg-neutral-800 dark:text-white"
        />
      </div>

      <ul @mouseleave="highlightedIndex = -1" class="overflow-y-auto flex-1 max-h-48 py-1">
        <template v-for="(item, index) in filteredOptions" :key="item.id">
          <li
            @mousedown.prevent.stop="item.active && select(item.id, item.label)"
            @mouseenter="item.active && (highlightedIndex = index)"
            :class="[
              'select-none relative py-2 pl-2 pr-9 text-[10px] transition-colors duration-150',
              item.active
                ? String(item.id) === String(modelValue) && index === highlightedIndex
                  ? 'bg-neutral-300 dark:bg-neutral-500 text-neutral-900 dark:text-white font-bold cursor-pointer'
                  : String(item.id) === String(modelValue)
                  ? 'bg-neutral-200 dark:bg-neutral-600 text-neutral-900 dark:text-white font-bold cursor-pointer'
                  : index === highlightedIndex
                  ? 'bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-white cursor-pointer'
                  : 'text-gray-900 dark:text-neutral-300 cursor-pointer'
                : 'opacity-50 cursor-not-allowed select-none text-gray-400 bg-gray-50/50 dark:bg-neutral-800/30 dark:text-neutral-500'
            ]"
          >
            <span>{{ item.label }}</span>
            <span v-if="item.active && String(item.id) === String(modelValue)" class="absolute inset-y-0 right-0 flex items-center pr-3">
              <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
          </li>
        </template>
        <li v-if="filteredOptions.length === 0" class="py-2 text-center text-[10px] text-gray-500 dark:text-neutral-400">
          No se encontraron resultados
        </li>
      </ul>
    </div>
  </div>
</template>
