<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import { api } from '../services/api.js';
import { toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const profileForm = ref({ name: '', email: '' });
const passwordForm = ref({
  current_password: '',
  password: '',
  password_confirmation: '',
});

async function handleUpdateProfile() {
  try {
    const res = await api.put('/auth/profile', profileForm.value);
    toast('Perfil actualizado correctamente', 'success');
    auth.user = { ...auth.user!, name: res.data.user.name, email: res.data.user.email };
  } catch (err) {
    console.error(err);
  }
}

async function handleUpdatePassword() {
  if (passwordForm.value.password !== passwordForm.value.password_confirmation) {
    toast('Las contraseñas no coinciden', 'warning');
    return;
  }
  try {
    await api.put('/auth/password', passwordForm.value);
    toast('Contraseña modificada correctamente', 'success');
    passwordForm.value = { current_password: '', password: '', password_confirmation: '' };
  } catch (err) {
    console.error(err);
  }
}

onMounted(() => {
  if (auth.user) {
    profileForm.value = { name: auth.user.name, email: auth.user.email };
  }
});
</script>

<template>
  <AppLayout>
    <div class="max-w-2xl mx-auto space-y-4">
      <div class="bg-white dark:bg-neutral-800 p-4 rounded-xl border border-gray-200 dark:border-neutral-700/60 shadow-sm">
        <h1 class="text-xs font-bold text-gray-800 dark:text-gray-100 uppercase tracking-wider mb-3">
          Información del Perfil
        </h1>
        <form @submit.prevent="handleUpdateProfile" class="space-y-3">
          <div>
            <label class="block text-xs font-semibold mb-1">Nombre</label>
            <input v-model="profileForm.name" type="text" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
          </div>
          <div>
            <label class="block text-xs font-semibold mb-1">Correo Electrónico</label>
            <input v-model="profileForm.email" type="email" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-3 py-1.5 rounded-lg bg-neutral-800 text-white text-xs font-bold uppercase">GUARDAR PERFIL</button>
          </div>
        </form>
      </div>

      <div class="bg-white dark:bg-neutral-800 p-4 rounded-xl border border-gray-200 dark:border-neutral-700/60 shadow-sm">
        <h1 class="text-xs font-bold text-gray-800 dark:text-gray-100 uppercase tracking-wider mb-3">
          Seguridad y Contraseña
        </h1>
        <form @submit.prevent="handleUpdatePassword" class="space-y-3">
          <div>
            <label class="block text-xs font-semibold mb-1">Contraseña Actual</label>
            <input v-model="passwordForm.current_password" type="password" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
          </div>
          <div>
            <label class="block text-xs font-semibold mb-1">Nueva Contraseña</label>
            <input v-model="passwordForm.password" type="password" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
          </div>
          <div>
            <label class="block text-xs font-semibold mb-1">Confirmar Nueva Contraseña</label>
            <input v-model="passwordForm.password_confirmation" type="password" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-3 py-1.5 rounded-lg bg-neutral-800 text-white text-xs font-bold uppercase">ACTUALIZAR CONTRASEÑA</button>
          </div>
        </form>
      </div>
    </div>
  </AppLayout>
</template>
