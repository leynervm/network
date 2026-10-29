<script setup lang="ts">
import { ref, onMounted, computed, watch } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import SecondaryButton from '../components/SecondaryButton.vue';
import DangerButton from '../components/DangerButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import SelectInput from '../components/SelectInput.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const loading = ref(false);
const users = ref<any[]>([]);
const allRoles = ref<any[]>([]);

// Filters
const search = ref('');
const roleFilter = ref('');

// Create User Modal
const openCreate = ref(false);
const createName = ref('');
const createEmail = ref('');
const createPassword = ref('');
const createPasswordConfirmation = ref('');
const createSelectedRoles = ref<string[]>([]);
const errors = ref<Record<string, string>>({});

// Edit User Modal
const openEdit = ref(false);
const editingUser = ref<any>(null);
const editName = ref('');
const editEmail = ref('');
const editPassword = ref('');
const editSelectedRoles = ref<string[]>([]);

// View Permissions Modal
const openView = ref(false);
const viewingUser = ref<any>(null);

async function loadData() {
  try {
    loading.value = true;
    const [uRes, rRes] = await Promise.all([
      api.get('/users'),
      api.get('/roles'),
    ]);
    users.value = uRes.data || [];
    allRoles.value = rRes.data || [];
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

const filteredUsers = computed(() => {
  return users.value.filter((u) => {
    const matchesSearch =
      !search.value ||
      u.name.toLowerCase().includes(search.value.toLowerCase()) ||
      u.email.toLowerCase().includes(search.value.toLowerCase());
    const matchesRole =
      !roleFilter.value ||
      u.roles?.some((r: any) => r.name.toLowerCase() === roleFilter.value.toLowerCase());
    return matchesSearch && matchesRole;
  });
});

async function saveUser() {
  errors.value = {};
  if (!createName.value.trim()) errors.value.name = 'El nombre es obligatorio';
  if (!createEmail.value.trim()) errors.value.email = 'El correo es obligatorio';
  if (!createPassword.value) errors.value.password = 'La contraseña es obligatoria';
  if (createPassword.value !== createPasswordConfirmation.value) {
    errors.value.password = 'Las contraseñas no coinciden';
  }
  if (Object.keys(errors.value).length > 0) return;

  try {
    loading.value = true;
    const roleIds = allRoles.value
      .filter((r) => createSelectedRoles.value.includes(r.name))
      .map((r) => r.id);

    await api.post('/users', {
      name: createName.value.trim(),
      email: createEmail.value.trim(),
      password: createPassword.value,
      role_ids: roleIds,
    });

    toast('Usuario creado con éxito', 'success');
    openCreate.value = false;
    createName.value = '';
    createEmail.value = '';
    createPassword.value = '';
    createPasswordConfirmation.value = '';
    createSelectedRoles.value = [];
    await loadData();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al crear usuario', 'error');
  } finally {
    loading.value = false;
  }
}

function edit(item: any) {
  editingUser.value = item;
  editName.value = item.name;
  editEmail.value = item.email;
  editPassword.value = '';
  editSelectedRoles.value = item.roles ? item.roles.map((r: any) => r.name) : [];
  openEdit.value = true;
}

async function updateUser() {
  if (!editingUser.value) return;
  try {
    loading.value = true;
    const roleIds = allRoles.value
      .filter((r) => editSelectedRoles.value.includes(r.name))
      .map((r) => r.id);

    const payload: any = {
      name: editName.value.trim(),
      email: editEmail.value.trim(),
      role_ids: roleIds,
    };
    if (editPassword.value) {
      payload.password = editPassword.value;
    }

    await api.put(`/users/${editingUser.value.id}`, payload);
    toast('Usuario actualizado', 'success');
    openEdit.value = false;
    await loadData();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar usuario', 'error');
  } finally {
    loading.value = false;
  }
}

function viewUserPermissions(item: any) {
  viewingUser.value = item;
  openView.value = true;
}

async function confirmDeleteUser(item: any) {
  const confirm = await confirmDialog(
    `¿Eliminar usuario ${item.name}?`,
    'Esta acción revocará todo acceso al sistema.',
    'warning'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/users/${item.id}`);
    toast('Usuario eliminado', 'success');
    await loadData();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar usuario', 'error');
  } finally {
    loading.value = false;
  }
}

onMounted(loadData);
</script>

<template>
  <AppLayout title="Gestión de Usuarios">
    <LoadingOverlay :show="loading" />

    <!-- Action Buttons Bar -->
    <div class="flex flex-wrap gap-2 items-center justify-start mb-3">
      <PrimaryButton @click="openCreate = true" class="gap-1.5 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
        </svg>
        <span>NUEVO USUARIO</span>
      </PrimaryButton>

      <router-link
        to="/admin/roles"
        class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        <span>ROLES</span>
      </router-link>
    </div>

    <!-- Search & Filters -->
    <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-3">
      <div class="flex flex-wrap items-center gap-2 flex-1 max-w-xl">
        <div class="w-full sm:w-64">
          <InputLabel value="Buscar usuario" />
          <TextInput v-model="search" placeholder="Nombre o correo..." class="w-full block" />
        </div>

        <div class="w-full sm:w-48">
          <InputLabel value="Filtrar por rol" />
          <SelectInput v-model="roleFilter" class="w-full">
            <option value="">TODOS LOS ROLES</option>
            <option v-for="r in allRoles" :key="r.id" :value="r.name">
              {{ r.name.toUpperCase() }}
            </option>
          </SelectInput>
        </div>
      </div>

      <div class="text-xs text-gray-500 dark:text-neutral-400">
        Total usuarios: <span class="font-bold text-gray-800 dark:text-gray-200">{{ filteredUsers.length }}</span>
      </div>
    </div>

    <!-- Table -->
    <div class="w-full bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden">
      <DataTable>
        <template #thead>
          <tr>
            <th class="p-3 text-left font-semibold">USUARIO</th>
            <th class="p-3 text-left font-semibold">CORREO ELECTRÓNICO</th>
            <th class="p-3 text-center font-semibold">ROLES ASIGNADOS</th>
            <th class="p-3 text-center font-semibold">PERMISOS TOTALES</th>
            <th class="p-3 text-right font-semibold">ACCIONES</th>
          </tr>
        </template>
        <template #tbody>
          <tr v-if="filteredUsers.length === 0">
            <td colspan="5" class="text-center py-4 text-gray-500">No se encontraron usuarios.</td>
          </tr>
          <tr
            v-for="item in filteredUsers"
            :key="item.id"
            class="border-b border-gray-100 dark:border-neutral-700/60 hover:bg-gray-50/80 dark:hover:bg-neutral-700/40 transition"
          >
            <td class="p-3">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-neutral-200 dark:bg-neutral-700 flex items-center justify-center font-bold text-xs uppercase text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-neutral-700">
                  {{ item.name.slice(0, 2) }}
                </div>
                <div>
                  <h4 class="text-xs font-bold text-gray-800 dark:text-white">{{ item.name }}</h4>
                  <p class="text-[10px] text-gray-400 font-mono">ID #{{ item.id }}</p>
                </div>
              </div>
            </td>
            <td class="p-3 text-xs text-gray-600 dark:text-neutral-300 font-mono">
              {{ item.email }}
            </td>
            <td class="p-3 text-center">
              <div class="flex flex-wrap items-center justify-center gap-1">
                <span
                  v-for="role in item.roles || []"
                  :key="role.id"
                  :class="role.name === 'admin' ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/60' : 'bg-indigo-50 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-300 border border-indigo-200/80 dark:border-indigo-800/50'"
                  class="px-2 py-0.5 rounded-lg text-[10px] font-bold uppercase"
                >
                  {{ role.name }}
                </span>
                <span v-if="!item.roles || item.roles.length === 0" class="text-[10px] text-gray-400 italic">
                  Sin rol
                </span>
              </div>
            </td>
            <td class="p-3 text-center">
              <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/40">
                {{ item.roles?.some((r: any) => r.name === 'admin') ? 'Acceso Total (Admin)' : `${item.roles?.reduce((acc: number, r: any) => acc + (r.permissions?.length || 0), 0) || 0} permisos` }}
              </span>
            </td>
            <td class="p-3 text-right">
              <div class="inline-flex items-center gap-1">
                <button
                  type="button"
                  @click="viewUserPermissions(item)"
                  title="Ver matriz de permisos del usuario"
                  class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </button>

                <button
                  type="button"
                  @click="edit(item)"
                  title="Editar usuario y roles"
                  class="p-1.5 rounded-lg text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg>
                </button>

                <button
                  type="button"
                  @click="confirmDeleteUser(item)"
                  title="Eliminar usuario"
                  class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M10 12V17" /><path d="M14 12V17" /><path d="M4 7H20" /><path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" /><path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>
        </template>
      </DataTable>
    </div>

    <!-- Create User Modal -->
    <DialogModal :show="openCreate" maxWidth="lg" @close="openCreate = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Crear Nuevo Usuario</h2>
              <p class="text-[11px] text-gray-500 dark:text-neutral-400">Completa los datos y asigna roles de acceso</p>
            </div>
          </div>
          <button @click="openCreate = false" class="text-gray-400 hover:text-gray-600">✕</button>
        </div>
      </template>

      <template #content>
        <form @submit.prevent="saveUser" id="createUserForm" class="space-y-3">
          <div>
            <InputLabel value="Nombre Completo" />
            <TextInput v-model="createName" placeholder="ej: Juan Pérez" class="w-full mt-1" />
            <InputError :message="errors.name" />
          </div>

          <div>
            <InputLabel value="Correo Electrónico" />
            <TextInput v-model="createEmail" type="email" placeholder="ej: usuario@ejemplo.com" class="w-full mt-1" />
            <InputError :message="errors.email" />
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
              <InputLabel value="Contraseña" />
              <TextInput v-model="createPassword" type="password" placeholder="Mínimo 6 caracteres" class="w-full mt-1" />
              <InputError :message="errors.password" />
            </div>
            <div>
              <InputLabel value="Confirmar Contraseña" />
              <TextInput v-model="createPasswordConfirmation" type="password" placeholder="Repite contraseña" class="w-full mt-1" />
            </div>
          </div>

          <div class="pt-2">
            <InputLabel value="Asignar Roles" />
            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-2 p-3 bg-gray-50 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60 max-h-48 overflow-y-auto">
              <label
                v-for="role in allRoles"
                :key="role.id"
                class="flex items-center gap-2 p-2 rounded-lg bg-white dark:bg-neutral-800 border border-gray-100 dark:border-neutral-700 hover:border-indigo-400 cursor-pointer select-none"
              >
                <input
                  type="checkbox"
                  :value="role.name"
                  v-model="createSelectedRoles"
                  class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500"
                />
                <div>
                  <span class="text-xs font-bold uppercase text-gray-800 dark:text-gray-200">{{ role.name }}</span>
                  <p class="text-[10px] text-gray-400">{{ role.permissions?.length || 0 }} permisos</p>
                </div>
              </label>
            </div>
          </div>
        </form>
      </template>

      <template #footer>
        <div class="flex items-center justify-end gap-2">
          <SecondaryButton @click="openCreate = false">
            Cancelar
          </SecondaryButton>
          <PrimaryButton type="submit" form="createUserForm" :disabled="loading">
            GUARDAR USUARIO
          </PrimaryButton>
        </div>
      </template>
    </DialogModal>

    <!-- Edit User Modal -->
    <DialogModal :show="openEdit" maxWidth="lg" @close="openEdit = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <h1 class="font-semibold text-[10px] uppercase">ACTUALIZAR USUARIO</h1>
          <button @click="openEdit = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="updateUser" id="editUserForm" class="space-y-3">
          <div>
            <InputLabel value="Nombre Completo" />
            <TextInput v-model="editName" class="w-full mt-1" />
          </div>
          <div>
            <InputLabel value="Correo Electrónico" />
            <TextInput v-model="editEmail" type="email" class="w-full mt-1" />
          </div>
          <div>
            <InputLabel value="Nueva Contraseña (Opcional)" />
            <TextInput v-model="editPassword" type="password" placeholder="Dejar en blanco para no cambiar" class="w-full mt-1" />
          </div>
          <div>
            <InputLabel value="Roles Asignados" />
            <div class="mt-2 grid grid-cols-2 gap-2 p-3 bg-gray-50 dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700">
              <label
                v-for="role in allRoles"
                :key="role.id"
                class="flex items-center gap-2 p-2 rounded-lg bg-white dark:bg-neutral-800 border border-gray-100 dark:border-neutral-700 cursor-pointer"
              >
                <input
                  type="checkbox"
                  :value="role.name"
                  v-model="editSelectedRoles"
                  class="rounded border-gray-300 text-indigo-600"
                />
                <span class="text-xs font-bold uppercase">{{ role.name }}</span>
              </label>
            </div>
          </div>
        </form>
      </template>
      <template #footer>
        <div class="flex items-center justify-end gap-2">
          <SecondaryButton @click="openEdit = false">Cancelar</SecondaryButton>
          <PrimaryButton type="submit" form="editUserForm" :disabled="loading">ACTUALIZAR</PrimaryButton>
        </div>
      </template>
    </DialogModal>

    <!-- View Permissions Modal -->
    <DialogModal :show="openView" maxWidth="2xl" @close="openView = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <h1 class="font-semibold text-[10px] uppercase">PERMISOS DE {{ viewingUser?.name }}</h1>
          <button @click="openView = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <div class="space-y-3" v-if="viewingUser">
          <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">Roles:</span>
            <span
              v-for="r in viewingUser.roles || []"
              :key="r.id"
              class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-indigo-100 text-indigo-700"
            >
              {{ r.name }}
            </span>
          </div>
          <div class="max-h-60 overflow-y-auto space-y-1">
            <div
              v-for="role in viewingUser.roles || []"
              :key="role.id"
              class="border border-gray-200 dark:border-neutral-700 p-2 rounded-lg"
            >
              <h5 class="text-xs font-bold uppercase mb-1">{{ role.name }} ({{ role.permissions?.length || 0 }} permisos):</h5>
              <div class="flex flex-wrap gap-1">
                <span
                  v-for="p in role.permissions || []"
                  :key="p.id"
                  class="px-1.5 py-0.5 rounded text-[9px] bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-300 font-mono"
                >
                  {{ p.name }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </template>
    </DialogModal>
  </AppLayout>
</template>
