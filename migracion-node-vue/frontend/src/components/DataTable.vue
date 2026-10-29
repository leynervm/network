<script setup lang="ts">
import { Table, TableHeader, TableBody } from '@/components/ui/table';
</script>

<template>
  <div class="w-full block overflow-x-auto rounded-lg border border-gray-200/80 dark:border-neutral-700/60 shadow-sm">
    <Table class="w-full text-[10px] table-default">
      <TableHeader class="bg-neutral-600 dark:bg-neutral-800 text-white font-bold">
        <slot name="thead" />
      </TableHeader>
      <TableBody>
        <slot name="tbody" />
      </TableBody>
    </Table>
  </div>
</template>
