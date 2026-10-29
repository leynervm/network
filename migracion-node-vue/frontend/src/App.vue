<script setup lang="ts">
import { onMounted } from 'vue';
import { useNavStore } from './stores/nav.js';

const nav = useNavStore();

onMounted(() => {
  // Asegurar persistencia de clase 'dark'
  if (nav.theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
});
</script>

<template>
  <router-view />
</template>
