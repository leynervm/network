<script setup lang="ts">
import {
  AlertDialog,
  AlertDialogContent,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogDescription,
  AlertDialogFooter,
} from '@/components/ui/alert-dialog';
import { cn } from '@/lib/utils';

const props = defineProps<{
  show: boolean;
  maxWidth?: 'sm' | 'md' | 'lg' | 'xl' | '2xl';
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
};
</script>

<template>
  <AlertDialog :open="show" @update:open="(val: boolean) => !val && emit('close')">
    <AlertDialogContent :class="cn(maxWidthClass[maxWidth || '2xl'], 'border border-gray-200/80 dark:border-neutral-700/60 bg-white dark:bg-neutral-800 rounded-xl p-0 overflow-hidden shadow-2xl')">
      <div class="px-5 pt-5 pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-red-100 dark:bg-red-950/50 sm:mx-0">
            <svg class="h-5 w-5 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
          </div>

          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left flex-1">
            <AlertDialogHeader>
              <AlertDialogTitle class="text-sm font-bold text-gray-900 dark:text-gray-100 uppercase">
                <slot name="title" />
              </AlertDialogTitle>
              <AlertDialogDescription class="mt-2 text-xs text-gray-600 dark:text-neutral-300">
                <slot name="content" />
              </AlertDialogDescription>
            </AlertDialogHeader>
          </div>
        </div>
      </div>

      <AlertDialogFooter class="px-5 py-3 bg-gray-50/80 dark:bg-neutral-700/30 border-t border-gray-200/80 dark:border-neutral-700/60 flex items-center justify-end gap-2">
        <slot name="footer" />
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>
