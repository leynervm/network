<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { cn } from '@/lib/utils';

withDefaults(
  defineProps<{
    type?: 'button' | 'submit' | 'reset';
    disabled?: boolean;
  }>(),
  {
    type: 'submit',
    disabled: false,
  }
);
</script>

<template>
  <Button
    :type="type"
    :disabled="disabled"
    :class="cn('uppercase tracking-widest text-[10px] font-semibold h-auto py-2 px-3 bg-gray-800 hover:bg-gray-700 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-white rounded-lg shadow-sm transition ease-in-out duration-150', $attrs.class as string)"
  >
    <slot />
  </Button>
</template>
