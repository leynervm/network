<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { cn } from '@/lib/utils';

withDefaults(
  defineProps<{
    modelValue?: string | number | null;
    disabled?: boolean;
    type?: string;
    placeholder?: string;
  }>(),
  {
    modelValue: '',
    disabled: false,
    type: 'text',
    placeholder: '',
  }
);

defineEmits<{
  (e: 'update:modelValue', val: string | number): void;
}>();
</script>

<template>
  <Input
    :type="type"
    :model-value="modelValue ?? ''"
    :disabled="disabled"
    :placeholder="placeholder"
    @update:model-value="$emit('update:modelValue', $event)"
    :class="cn('h-9 text-xs rounded-lg border-border bg-background text-foreground shadow-xs', $attrs.class as string)"
  />
</template>
