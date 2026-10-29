<script setup lang="ts">
import { Label } from '@/components/ui/label';
import { cn } from '@/lib/utils';

defineProps<{
  value?: string;
}>();
</script>

<template>
  <Label :class="cn('block font-medium text-[11px] uppercase tracking-wider text-gray-700 dark:text-gray-300 mb-1', $attrs.class as string)">
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </Label>
</template>
