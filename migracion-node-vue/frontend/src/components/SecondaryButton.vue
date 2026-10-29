<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { cn } from '@/lib/utils';

withDefaults(
  defineProps<{
    type?: 'button' | 'submit' | 'reset';
    disabled?: boolean;
  }>(),
  {
    type: 'button',
    disabled: false,
  }
);
</script>

<template>
  <Button
    variant="outline"
    :type="type"
    :disabled="disabled"
    :class="cn('uppercase tracking-widest text-[10px] font-semibold h-auto py-2 px-3 border-gray-300 dark:border-neutral-700 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-neutral-700 rounded-lg shadow-sm transition ease-in-out duration-150', $attrs.class as string)"
  >
    <slot />
  </Button>
</template>
