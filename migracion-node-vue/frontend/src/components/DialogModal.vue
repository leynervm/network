<script setup lang="ts">
import {
  Dialog,
  DialogContent,
} from '@/components/ui/dialog';
import { cn } from '@/lib/utils';

const props = defineProps<{
  show: boolean;
  maxWidth?: 'sm' | 'md' | 'lg' | 'xl' | '2xl' | '3xl' | '4xl' | '5xl' | '6xl' | '7xl';
}>();

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const maxWidthClass: Record<string, string> = {
  sm: 'sm:max-w-sm',
  md: 'sm:max-w-md',
  lg: 'sm:max-w-lg',
  xl: 'sm:max-w-xl',
  '2xl': 'sm:max-w-2xl',
  '3xl': 'sm:max-w-3xl',
  '4xl': 'sm:max-w-4xl',
  '5xl': 'sm:max-w-5xl',
  '6xl': 'sm:max-w-6xl',
  '7xl': 'sm:max-w-7xl',
};
</script>

<template>
  <Dialog :open="show" @update:open="(val: boolean) => !val && emit('close')">
    <DialogContent
      :show-close-button="false"
      :class="cn(
        'w-full flex flex-col max-h-[97dvh] sm:max-h-[95dvh] p-0 gap-0 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200/80 dark:border-neutral-700/60 overflow-hidden shadow-2xl z-50',
        maxWidthClass[maxWidth || '2xl']
      )"
    >
      <!-- Header / Title -->
      <div class="w-full px-4 py-2.5 shrink-0 flex items-center justify-between font-semibold text-xs text-gray-800 dark:text-gray-100 bg-gray-50/80 dark:bg-neutral-700/40 border-b border-gray-200/80 dark:border-neutral-700/60 transition-colors duration-200">
        <slot name="title" />
      </div>

      <!-- Scrollable Body Content -->
      <div class="w-full flex-1 overflow-y-auto p-4 sm:p-5 text-gray-700 dark:text-gray-300 transition-colors duration-200">
        <slot name="content" />
      </div>

      <!-- Footer Actions -->
      <div
        v-if="$slots.footer"
        class="w-full px-4 py-3 shrink-0 flex items-center justify-end gap-2 bg-gray-50/80 dark:bg-neutral-700/30 border-t border-gray-200/80 dark:border-neutral-700/60 transition-colors duration-200"
      >
        <slot name="footer" />
      </div>
    </DialogContent>
  </Dialog>
</template>
