import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useNavStore = defineStore('nav', () => {
  const initialOpen = localStorage.getItem('sidebarOpen') !== 'false';
  const initialTheme =
    localStorage.getItem('theme') ||
    (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

  const open = ref(initialOpen);
  const mobileOpen = ref(false);
  const theme = ref(initialTheme);

  // Aplicar tema inicial
  if (theme.value === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }

  function toggle() {
    open.value = !open.value;
    localStorage.setItem('sidebarOpen', open.value ? 'true' : 'false');
  }

  function toggleTheme() {
    theme.value = theme.value === 'dark' ? 'light' : 'dark';
    localStorage.setItem('theme', theme.value);
    if (theme.value === 'dark') {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  }

  function closeMobile() {
    mobileOpen.value = false;
  }

  function openMobile() {
    mobileOpen.value = true;
  }

  return {
    open,
    mobileOpen,
    theme,
    toggle,
    toggleTheme,
    closeMobile,
    openMobile,
  };
});
