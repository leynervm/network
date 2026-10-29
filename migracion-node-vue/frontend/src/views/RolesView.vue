<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { RouterLink } from 'vue-router';
import AppLayout from '../layouts/AppLayout.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import SecondaryButton from '../components/SecondaryButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { toast, confirmDialog } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();

// State
const roles = ref<any[]>([]);
const permissionsByTable = ref<Record<string, any[]>>({});
const allPermissions = ref<any[]>([]);
const search = ref('');
const loading = ref(false);

// Create modal state
const open_create = ref(false);
const createName = ref('');
const createSelectedPermissions = ref<string[]>([]);
const createErrors = ref<Record<string, string>>({});
const isSaving = ref(false);

// Edit modal state
const open_edit = ref(false);
const editRole = ref<any>(null);
const editRoleName = ref('');
const editSelectedPermissions = ref<string[]>([]);
const editErrors = ref<Record<string, string>>({});
const isUpdating = ref(false);

// View modal state
const open_view = ref(false);
const viewRole = ref<any>(null);

// Pagination
const currentPage = ref(1);
const perPage = 10;

const filteredRoles = computed(() => {
  if (!search.value.trim()) return roles.value;
  const s = search.value.toLowerCase().trim();
  return roles.value.filter((r) => r.name.toLowerCase().includes(s));
});

const totalRoles = computed(() => filteredRoles.value.length);
const totalPages = computed(() => Math.ceil(totalRoles.value / perPage) || 1);

const paginatedRoles = computed(() => {
  const start = (currentPage.value - 1) * perPage;
  return filteredRoles.value.slice(start, start + perPage);
});

async function loadData() {
  loading.value = true;
  try {
    const [rolesRes, permsRes] = await Promise.all([
      api.get('/roles'),
      api.get('/permissions'),
    ]);
    roles.value = rolesRes.data;
    permissionsByTable.value = permsRes.data.grouped || {};
    allPermissions.value = permsRes.data.all || [];
  } catch (err: any) {
    console.error('Error cargando roles y permisos:', err);
  } finally {
    loading.value = false;
  }
}

// ================= Create Role Actions =================
function openCreate() {
  createName.value = '';
  createSelectedPermissions.value = [];
  createErrors.value = {};
  open_create.value = true;
}

function selectAllCreate() {
  createSelectedPermissions.value = allPermissions.value.map((p) => p.name);
}

function unselectAllCreate() {
  createSelectedPermissions.value = [];
}

function toggleTableCreate(table: string) {
  const tablePerms = (permissionsByTable.value[table] || []).map((p: any) => p.name);
  const selectedInTable = tablePerms.filter((p: string) => createSelectedPermissions.value.includes(p));
  const isAllSelected = selectedInTable.length === tablePerms.length;

  if (isAllSelected) {
    createSelectedPermissions.value = createSelectedPermissions.value.filter(
      (p) => !tablePerms.includes(p)
    );
  } else {
    createSelectedPermissions.value = Array.from(
      new Set([...createSelectedPermissions.value, ...tablePerms])
    );
  }
}

async function saveCreate() {
  createErrors.value = {};
  if (!createName.value.trim()) {
    createErrors.value.name = 'El nombre del rol es obligatorio.';
    return;
  }

  isSaving.value = true;
  try {
    const res = await api.post('/roles', {
      name: createName.value.trim().toLowerCase(),
      selectedPermissions: createSelectedPermissions.value,
    });
    toast(res.data.message || 'Rol creado con éxito', 'success');
    open_create.value = false;
    await loadData();
  } catch (err: any) {
    if (err.response?.status === 422) {
      createErrors.value.name = err.response.data?.message || 'Error de validación.';
    } else {
      toast(err.response?.data?.message || 'Error al crear rol', 'error');
    }
  } finally {
    isSaving.value = false;
  }
}

// ================= Edit Role Actions =================
function edit(roleItem: any) {
  if (roleItem.name === 'admin') {
    toast('El rol de Administrador cuenta con todos los permisos del sistema de forma permanente y no puede ser modificado.', 'info');
    return;
  }
  editRole.value = roleItem;
  editRoleName.value = roleItem.name;
  editSelectedPermissions.value = (roleItem.permissions || []).map((p: any) => p.name);
  editErrors.value = {};
  open_edit.value = true;
}

function selectAllEdit() {
  editSelectedPermissions.value = allPermissions.value.map((p) => p.name);
}

function unselectAllEdit() {
  editSelectedPermissions.value = [];
}

function toggleTableEdit(table: string) {
  const tablePerms = (permissionsByTable.value[table] || []).map((p: any) => p.name);
  const selectedInTable = tablePerms.filter((p: string) => editSelectedPermissions.value.includes(p));
  const isAllSelected = selectedInTable.length === tablePerms.length;

  if (isAllSelected) {
    editSelectedPermissions.value = editSelectedPermissions.value.filter(
      (p) => !tablePerms.includes(p)
    );
  } else {
    editSelectedPermissions.value = Array.from(
      new Set([...editSelectedPermissions.value, ...tablePerms])
    );
  }
}

async function updateRole() {
  editErrors.value = {};
  if (!editRoleName.value.trim()) {
    editErrors.value.role_name = 'El nombre del rol es obligatorio.';
    return;
  }

  isUpdating.value = true;
  try {
    const res = await api.put(`/roles/${editRole.value.id}`, {
      role_name: editRoleName.value.trim().toLowerCase(),
      selectedPermissions: editSelectedPermissions.value,
    });
    toast(res.data.message || 'Rol y permisos actualizados correctamente', 'success');
    open_edit.value = false;
    await loadData();
  } catch (err: any) {
    if (err.response?.status === 422) {
      editErrors.value.role_name = err.response.data?.message || 'Error de validación.';
    } else {
      toast(err.response?.data?.message || 'Error al actualizar rol', 'error');
    }
  } finally {
    isUpdating.value = false;
  }
}

// ================= View Role Details =================
function view(roleItem: any) {
  viewRole.value = roleItem;
  open_view.value = true;
}

const viewRoleGroupedPermissions = computed(() => {
  if (!viewRole.value || !viewRole.value.permissions) return {};
  const map: Record<string, any[]> = {};
  for (const p of viewRole.value.permissions) {
    const key = p.table_name || 'general';
    if (!map[key]) map[key] = [];
    map[key].push(p);
  }
  return map;
});

// ================= Delete Role =================
async function confirmDeleteRole(id: number, name: string) {
  const res = await confirmDialog(
    `¿Eliminar rol ${name}?`,
    'Los usuarios con este rol perderán sus permisos asociados.'
  );
  if (res.isConfirmed) {
    try {
      const delRes = await api.delete(`/roles/${id}`);
      toast(delRes.data.message || 'Rol eliminado con éxito', 'success');
      await loadData();
    } catch (err: any) {
      toast(err.response?.data?.message || 'Error al eliminar rol', 'error');
    }
  }
}

onMounted(loadData);
</script>

<template>
  <AppLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h1 class="text-base font-bold text-gray-800 dark:text-neutral-200 uppercase tracking-wide">
          Gestión de Roles y Permisos
        </h1>
      </div>
    </template>

    <div class="flex flex-wrap gap-2 items-center justify-start mb-3">
      <PrimaryButton
        v-if="auth.hasPermission('admin.roles.create')"
        @click="openCreate"
        class="gap-1.5 shadow-sm"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        <span>NUEVO ROL</span>
      </PrimaryButton>

      <RouterLink
        v-if="auth.hasPermission('admin.users.index')"
        to="/admin/users"
        class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span>USUARIOS</span>
      </RouterLink>

      <RouterLink
        to="/admin/permissions"
        class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
        </svg>
        <span>MATRIZ PERMISOS</span>
      </RouterLink>
    </div>

    <div v-if="auth.hasPermission('admin.roles.index')">
      <!-- Barra de búsqueda y filtros -->
      <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-3">
        <div class="w-full max-w-sm">
          <InputLabel value="Buscar rol por nombre" />
          <TextInput
            class="w-full block"
            v-model="search"
            placeholder="ej: admin, tecnico, cajero..."
          />
        </div>
        <div class="text-xs text-gray-500 dark:text-neutral-400">
          Total roles registrados:
          <span class="font-bold text-gray-800 dark:text-gray-200">{{ totalRoles }}</span>
        </div>
      </div>

      <!-- Tabla de Roles -->
      <div class="w-full bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden">
        <DataTable>
          <template #thead>
            <tr>
              <th class="p-3 text-left font-semibold">ID</th>
              <th class="p-3 text-left font-semibold">NOMBRE DEL ROL</th>
              <th class="p-3 text-center font-semibold">USUARIOS ASIGNADOS</th>
              <th class="p-3 text-center font-semibold">PERMISOS ASIGNADOS</th>
              <th class="p-3 text-right font-semibold">ACCIONES</th>
            </tr>
          </template>
          <template #tbody>
            <tr
              v-for="item in paginatedRoles"
              :key="item.id"
              class="border-b border-gray-100 dark:border-neutral-700/60 hover:bg-gray-50/80 dark:hover:bg-neutral-700/40 transition"
            >
              <td class="p-3 text-gray-500 dark:text-neutral-400 font-mono text-xs">
                #{{ item.id }}
              </td>
              <td class="p-3">
                <div class="flex items-center gap-2">
                  <span
                    class="px-2 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider"
                    :class="item.name === 'admin'
                      ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/60'
                      : 'bg-indigo-50 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-300 border border-indigo-200/80 dark:border-indigo-800/50'"
                  >
                    {{ item.name }}
                  </span>
                  <span
                    v-if="item.name === 'admin'"
                    class="text-[10px] text-amber-600 dark:text-amber-400 font-semibold"
                    title="Rol del sistema con acceso total"
                  >
                    (Super Admin)
                  </span>
                </div>
              </td>
              <td class="p-3 text-center">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  {{ item.users_count }}
                </span>
              </td>
              <td class="p-3 text-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/40">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                  {{ item.permissions_count }} permisos
                </span>
              </td>
              <td class="p-3 text-right">
                <div class="inline-flex items-center gap-1">
                  <!-- Ver permisos asignados -->
                  <button
                    type="button"
                    @click="view(item)"
                    title="Ver detalles y permisos"
                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </button>

                  <!-- Editar rol -->
                  <template v-if="auth.hasPermission('admin.roles.edit')">
                    <span
                      v-if="item.name === 'admin'"
                      title="Rol de Administrador protegido: cuenta con acceso total permanente"
                      class="p-1.5 rounded-lg text-amber-500/80 dark:text-amber-400/80 inline-flex items-center cursor-not-allowed"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                      </svg>
                    </span>
                    <button
                      v-else
                      type="button"
                      @click="edit(item)"
                      title="Editar rol y permisos"
                      class="p-1.5 rounded-lg text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                  </template>

                  <!-- Eliminar rol -->
                  <template v-if="auth.hasPermission('admin.roles.delete') && item.name !== 'admin'">
                    <button
                      type="button"
                      @click="confirmDeleteRole(item.id, item.name)"
                      title="Eliminar rol"
                      class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </template>
                </div>
              </td>
            </tr>

            <tr v-if="paginatedRoles.length === 0">
              <td colspan="5" class="p-6 text-center text-gray-500 dark:text-neutral-400">
                No se encontraron roles registrados.
              </td>
            </tr>
          </template>
        </DataTable>

        <!-- Paginación -->
        <div v-if="totalPages > 1" class="p-3 border-t border-gray-100 dark:border-neutral-700 flex items-center justify-between">
          <button
            :disabled="currentPage === 1"
            @click="currentPage--"
            class="px-3 py-1 text-xs rounded border border-gray-200 dark:border-neutral-600 disabled:opacity-40"
          >
            Anterior
          </button>
          <span class="text-xs text-gray-600 dark:text-neutral-300">
            Página {{ currentPage }} de {{ totalPages }}
          </span>
          <button
            :disabled="currentPage === totalPages"
            @click="currentPage++"
            class="px-3 py-1 text-xs rounded border border-gray-200 dark:border-neutral-600 disabled:opacity-40"
          >
            Siguiente
          </button>
        </div>
      </div>
    </div>
    <div v-else class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
      No tienes permiso para ver la gestión de roles.
    </div>

    <!-- ================= MODAL CREAR NUEVO ROL ================= -->
    <DialogModal :show="open_create" maxWidth="4xl" @close="open_create = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">Crear Nuevo Rol</h2>
              <p class="text-[11px] text-gray-500 dark:text-neutral-400">Asigna nombre y permisos agrupados por módulo al rol</p>
            </div>
          </div>
          <button type="button" @click="open_create = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </template>

      <template #content>
        <form @submit.prevent="saveCreate" id="createRoleForm" class="space-y-4">
          <!-- Nombre del Rol -->
          <div class="bg-gray-50 dark:bg-neutral-800/60 p-3.5 rounded-xl border border-gray-200/80 dark:border-neutral-700/60">
            <InputLabel for="role_name" value="Nombre del Rol (en minúsculas, ej: operador, supervisor)" />
            <TextInput
              id="role_name"
              type="text"
              class="w-full mt-1"
              v-model="createName"
              placeholder="ej: secretaria, cajero, supervisor"
            />
            <InputError :message="createErrors.name" class="mt-1" />
          </div>

          <!-- Barra de herramientas para permisos -->
          <div class="flex flex-wrap items-center justify-between gap-2 p-2 bg-neutral-100 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60">
            <div class="flex items-center gap-2">
              <span class="text-xs font-semibold text-gray-700 dark:text-neutral-300">Permisos Seleccionados:</span>
              <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300">
                {{ createSelectedPermissions.length }}
              </span>
            </div>
            <div class="flex items-center gap-2">
              <button
                type="button"
                @click="selectAllCreate"
                class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-neutral-600 hover:bg-gray-50 font-medium transition shadow-sm"
              >
                ✓ Marcar Todos
              </button>
              <button
                type="button"
                @click="unselectAllCreate"
                class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-red-600 dark:text-red-400 border border-gray-200 dark:border-neutral-600 hover:bg-red-50 font-medium transition shadow-sm"
              >
                ✗ Desmarcar Todos
              </button>
            </div>
          </div>

          <!-- Permisos agrupados por tabla -->
          <div class="max-h-[55vh] overflow-y-auto pr-1 space-y-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
              <div
                v-for="(perms, table) in permissionsByTable"
                :key="table"
                class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm transition hover:border-indigo-400 dark:hover:border-indigo-500"
              >
                <!-- Cabecera del grupo/tabla -->
                <div class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
                  <div class="flex items-center gap-2">
                    <span
                      class="w-2 h-2 rounded-full"
                      :class="perms.every((p: any) => createSelectedPermissions.includes(p.name))
                        ? 'bg-green-500 ring-2 ring-green-200'
                        : 'bg-gray-300 dark:bg-neutral-600'"
                    ></span>
                    <span class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                      TABLA: {{ table }}
                    </span>
                  </div>
                  <button
                    type="button"
                    @click="toggleTableCreate(String(table))"
                    class="text-[10px] uppercase font-bold px-2 py-0.5 rounded transition"
                    :class="perms.every((p: any) => createSelectedPermissions.includes(p.name))
                      ? 'bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 hover:bg-green-200'
                      : 'bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-neutral-300 hover:bg-gray-200'"
                  >
                    {{ perms.every((p: any) => createSelectedPermissions.includes(p.name)) ? 'Desmarcar' : 'Todos' }}
                    ({{ perms.filter((p: any) => createSelectedPermissions.includes(p.name)).length }}/{{ perms.length }})
                  </button>
                </div>

                <!-- Lista de permisos del grupo -->
                <div class="space-y-1.5">
                  <label
                    v-for="perm in perms"
                    :key="perm.id"
                    class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-700/50 cursor-pointer select-none transition"
                  >
                    <input
                      type="checkbox"
                      :value="perm.name"
                      v-model="createSelectedPermissions"
                      class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900 mt-0.5"
                    />
                    <div class="flex-1 min-w-0">
                      <p class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200 leading-tight">
                        {{ perm.description || perm.name }}
                      </p>
                      <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono truncate">
                        {{ perm.name }}
                      </p>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </form>
      </template>

      <template #footer>
        <div class="flex items-center justify-end gap-2">
          <SecondaryButton @click="open_create = false">
            Cancelar
          </SecondaryButton>
          <PrimaryButton type="submit" form="createRoleForm" :disabled="isSaving">
            <span v-if="!isSaving">GUARDAR ROL</span>
            <span v-else>GUARDANDO...</span>
          </PrimaryButton>
        </div>
      </template>
    </DialogModal>

    <!-- ================= MODAL EDITAR ROL ================= -->
    <DialogModal :show="open_edit" maxWidth="4xl" @close="open_edit = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 flex items-center justify-center font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">
                Editar Rol: <span class="text-indigo-600 dark:text-indigo-400">{{ editRoleName }}</span>
              </h2>
              <p class="text-[11px] text-gray-500 dark:text-neutral-400">Modifica los permisos asociados a este rol</p>
            </div>
          </div>
          <button type="button" @click="open_edit = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </template>

      <template #content>
        <form @submit.prevent="updateRole" id="editRoleForm" class="space-y-4">
          <!-- Nombre del Rol -->
          <div class="bg-gray-50 dark:bg-neutral-800/60 p-3.5 rounded-xl border border-gray-200/80 dark:border-neutral-700/60">
            <InputLabel for="edit_role_name" value="Nombre del Rol" />
            <TextInput
              id="edit_role_name"
              type="text"
              class="w-full mt-1"
              v-model="editRoleName"
              :disabled="editRole && editRole.name === 'admin'"
            />
            <p v-if="editRole && editRole.name === 'admin'" class="text-[11px] text-amber-600 dark:text-amber-400 mt-1">
              El nombre del rol 'admin' está protegido y no puede cambiarse.
            </p>
            <InputError :message="editErrors.role_name" class="mt-1" />
          </div>

          <!-- Barra de herramientas para permisos -->
          <div class="flex flex-wrap items-center justify-between gap-2 p-2 bg-neutral-100 dark:bg-neutral-800/80 rounded-xl border border-gray-200 dark:border-neutral-700/60">
            <div class="flex items-center gap-2">
              <span class="text-xs font-semibold text-gray-700 dark:text-neutral-300">Permisos Activos:</span>
              <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300">
                {{ editSelectedPermissions.length }}
              </span>
            </div>
            <div class="flex items-center gap-2">
              <button
                type="button"
                @click="selectAllEdit"
                class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-neutral-600 hover:bg-gray-50 font-medium transition shadow-sm"
              >
                ✓ Marcar Todos
              </button>
              <button
                type="button"
                @click="unselectAllEdit"
                class="text-[11px] px-2.5 py-1 rounded-md bg-white dark:bg-neutral-700 text-red-600 dark:text-red-400 border border-gray-200 dark:border-neutral-600 hover:bg-red-50 font-medium transition shadow-sm"
              >
                ✗ Desmarcar Todos
              </button>
            </div>
          </div>

          <!-- Permisos agrupados por tabla -->
          <div class="max-h-[55vh] overflow-y-auto pr-1 space-y-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
              <div
                v-for="(perms, table) in permissionsByTable"
                :key="table"
                class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm transition hover:border-indigo-400 dark:hover:border-indigo-500"
              >
                <!-- Cabecera del grupo/tabla -->
                <div class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
                  <div class="flex items-center gap-2">
                    <span
                      class="w-2 h-2 rounded-full"
                      :class="perms.every((p: any) => editSelectedPermissions.includes(p.name))
                        ? 'bg-green-500 ring-2 ring-green-200'
                        : 'bg-gray-300 dark:bg-neutral-600'"
                    ></span>
                    <span class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                      TABLA: {{ table }}
                    </span>
                  </div>
                  <button
                    type="button"
                    @click="toggleTableEdit(String(table))"
                    class="text-[10px] uppercase font-bold px-2 py-0.5 rounded transition"
                    :class="perms.every((p: any) => editSelectedPermissions.includes(p.name))
                      ? 'bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 hover:bg-green-200'
                      : 'bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-neutral-300 hover:bg-gray-200'"
                  >
                    {{ perms.every((p: any) => editSelectedPermissions.includes(p.name)) ? 'Desmarcar' : 'Todos' }}
                    ({{ perms.filter((p: any) => editSelectedPermissions.includes(p.name)).length }}/{{ perms.length }})
                  </button>
                </div>

                <!-- Lista de permisos del grupo -->
                <div class="space-y-1.5">
                  <label
                    v-for="perm in perms"
                    :key="perm.id"
                    class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-700/50 cursor-pointer select-none transition"
                  >
                    <input
                      type="checkbox"
                      :value="perm.name"
                      v-model="editSelectedPermissions"
                      class="rounded border-gray-300 dark:border-neutral-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-neutral-900 mt-0.5"
                    />
                    <div class="flex-1 min-w-0">
                      <p class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200 leading-tight">
                        {{ perm.description || perm.name }}
                      </p>
                      <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono truncate">
                        {{ perm.name }}
                      </p>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </form>
      </template>

      <template #footer>
        <div class="flex items-center justify-end gap-2">
          <SecondaryButton @click="open_edit = false">
            Cancelar
          </SecondaryButton>
          <PrimaryButton type="submit" form="editRoleForm" :disabled="isUpdating">
            <span v-if="!isUpdating">ACTUALIZAR ROL</span>
            <span v-else>ACTUALIZANDO...</span>
          </PrimaryButton>
        </div>
      </template>
    </DialogModal>

    <!-- ================= MODAL VER DETALLES DE ROL ================= -->
    <DialogModal :show="open_view" maxWidth="3xl" @close="open_view = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider">
                Detalles del Rol: <span class="text-indigo-600 dark:text-indigo-400">{{ viewRole?.name }}</span>
              </h2>
              <p class="text-[11px] text-gray-500 dark:text-neutral-400">Permisos asignados organizados por tabla</p>
            </div>
          </div>
          <button type="button" @click="open_view = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </template>

      <template #content>
        <div v-if="viewRole" class="space-y-3 max-h-[60vh] overflow-y-auto pr-1">
          <div
            v-for="(perms, table) in viewRoleGroupedPermissions"
            :key="table"
            class="p-3 rounded-xl border border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800/90 shadow-sm"
          >
            <div class="flex items-center justify-between pb-2 mb-2 border-b border-gray-100 dark:border-neutral-700/80">
              <span class="text-xs font-bold text-gray-800 dark:text-white uppercase font-mono">
                TABLA: {{ table }}
              </span>
              <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-50 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300">
                {{ perms.length }} permisos
              </span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
              <div
                v-for="p in perms"
                :key="p.id"
                class="p-2 rounded-lg bg-gray-50 dark:bg-neutral-700/40 border border-gray-100 dark:border-neutral-700/50"
              >
                <p class="text-[11px] font-semibold text-gray-800 dark:text-neutral-200">
                  {{ p.description || p.name }}
                </p>
                <p class="text-[9px] text-gray-400 dark:text-neutral-400 font-mono">{{ p.name }}</p>
              </div>
            </div>
          </div>

          <div v-if="Object.keys(viewRoleGroupedPermissions).length === 0" class="text-center py-6 text-gray-500 text-xs">
            Este rol aún no tiene permisos asignados.
          </div>
        </div>
      </template>

      <template #footer>
        <SecondaryButton @click="open_view = false">
          Cerrar
        </SecondaryButton>
      </template>
    </DialogModal>
  </AppLayout>
</template>
