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
    variant="destructive"
    :type="type"
    :disabled="disabled"
    :class="cn('uppercase tracking-widest text-[10px] font-semibold h-auto py-2 px-3 rounded-lg shadow-sm transition ease-in-out duration-150', $attrs.class as string)"
  >
    <slot />
  </Button>
</template>
