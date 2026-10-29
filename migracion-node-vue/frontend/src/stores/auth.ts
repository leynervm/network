import { defineStore } from 'pinia';
import { ref, computed } from 'vue';
import { api } from '../services/api.js';

export interface UserInfo {
  id: number;
  name: string;
  email: string;
  roles: string[];
  permissions: string[];
}

export const useAuthStore = defineStore('auth', () => {
  const user = ref<UserInfo | null>(null);
  const loading = ref(true);

  const isAuthenticated = computed(() => !!user.value);
  const isAdmin = computed(() => user.value?.roles?.some((r) => r.toLowerCase() === 'administrador') ?? false);

  function hasPermission(permissionName?: string | null): boolean {
    if (!permissionName) return true;
    if (isAdmin.value) return true;
    return user.value?.permissions?.includes(permissionName) ?? false;
  }

  async function checkAuth() {
    try {
      loading.value = true;
      const response = await api.get('/auth/me');
      user.value = response.data;
    } catch {
      user.value = null;
    } finally {
      loading.value = false;
    }
  }

  async function login(credentialsOrEmail: { email: string; password: string } | string, maybePassword?: string, _remember?: boolean) {
    const payload = typeof credentialsOrEmail === 'string'
      ? { email: credentialsOrEmail, password: maybePassword || '' }
      : credentialsOrEmail;
    const response = await api.post('/auth/login', payload);
    user.value = response.data.user;
    return response.data;
  }

  async function logout() {
    try {
      await api.post('/auth/logout');
    } finally {
      user.value = null;
      window.location.href = '/login';
    }
  }

  return {
    user,
    loading,
    isAuthenticated,
    isAdmin,
    hasPermission,
    checkAuth,
    login,
    logout,
  };
});
