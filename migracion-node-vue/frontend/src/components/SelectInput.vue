<script setup lang="ts">
withDefaults(
  defineProps<{
    modelValue?: string | number | null;
    disabled?: boolean;
  }>(),
  {
    modelValue: '',
    disabled: false,
  }
);

defineEmits<{
  (e: 'update:modelValue', val: string | number): void;
}>();
</script>

<template>
  <select
    :value="modelValue ?? ''"
    :disabled="disabled"
    @change="$emit('update:modelValue', ($event.target as HTMLSelectElement).value)"
    class="block w-full border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-2.5 pr-8 text-xs"
  >
    <slot />
  </select>
</template>
