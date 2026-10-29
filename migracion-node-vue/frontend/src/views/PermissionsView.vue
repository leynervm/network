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
import SelectInput from '../components/SelectInput.vue';
import { api } from '../services/api.js';
import { toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();

// State
const permissions = ref<any[]>([]);
const tables = ref<string[]>([]);
const totalPermissions = ref(0);
const search = ref('');
const selectedTable = ref('');
const loading = ref(false);

// Create permission modal state
const open_create = ref(false);
const formName = ref('');
const formTable = ref('');
const formDesc = ref('');
const formErrors = ref<Record<string, string>>({});
const isSaving = ref(false);

async function loadData() {
  loading.value = true;
  try {
    const res = await api.get('/permissions', {
      params: {
        search: search.value,
        selectedTable: selectedTable.value,
      },
    });
    permissions.value = res.data.all || [];
    tables.value = res.data.tables || [];
    totalPermissions.value = res.data.totalPermissions || 0;
  } catch (err: any) {
    console.error('Error cargando permisos:', err);
  } finally {
    loading.value = false;
  }
}

// Client filtering for instant responsiveness matching Blade
const permissionsGrouped = computed(() => {
  let list = permissions.value;
  if (selectedTable.value) {
    list = list.filter((p) => p.table_name === selectedTable.value);
  }
  if (search.value.trim()) {
    const s = search.value.toLowerCase().trim();
    list = list.filter(
      (p) =>
        p.name.toLowerCase().includes(s) ||
        (p.description && p.description.toLowerCase().includes(s)) ||
        (p.table_name && p.table_name.toLowerCase().includes(s))
    );
  }

  const grouped: Record<string, any[]> = {};
  for (const p of list) {
    const key = p.table_name || 'general';
    if (!grouped[key]) grouped[key] = [];
    grouped[key].push(p);
  }
  return grouped;
});

function openCreateModal() {
  formName.value = '';
  formTable.value = '';
  formDesc.value = '';
  formErrors.value = {};
  open_create.value = true;
}

async function savePermission() {
  formErrors.value = {};
  let valid = true;

  if (!formTable.value.trim()) {
    formErrors.value.table_name = 'El nombre de tabla/módulo es obligatorio.';
    valid = false;
  }
  if (!formName.value.trim()) {
    formErrors.value.name = 'El identificador del permiso es obligatorio.';
    valid = false;
  }
  if (!formDesc.value.trim()) {
    formErrors.value.description = 'La descripción es obligatoria.';
    valid = false;
  }

  if (!valid) return;

  isSaving.value = true;
  try {
    const res = await api.post('/permissions', {
      table_name: formTable.value.trim().toLowerCase(),
      name: formName.value.trim().toLowerCase(),
      description: formDesc.value.trim(),
    });
    toast(res.data.message || 'Permiso creado exitosamente', 'success');
    open_create.value = false;
    await loadData();
  } catch (err: any) {
    if (err.response?.status === 422) {
      const msg = err.response.data?.message;
      if (msg.includes('identificador')) formErrors.value.name = msg;
      else if (msg.includes('tabla')) formErrors.value.table_name = msg;
      else formErrors.value.description = msg;
    } else {
      toast(err.response?.data?.message || 'Error al crear permiso', 'error');
    }
  } finally {
    isSaving.value = false;
  }
}

onMounted(loadData);
</script>

<template>
  <AppLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h1 class="text-base font-bold text-gray-800 dark:text-neutral-200 uppercase tracking-wide">
          Matriz de Permisos por Tabla
        </h1>
      </div>
    </template>

    <div class="flex flex-wrap gap-2 items-center justify-start mb-3">
      <RouterLink
        v-if="auth.hasPermission('admin.roles.index')"
        to="/admin/roles"
        class="inline-flex gap-1.5 shadow-sm items-center justify-center p-2 bg-gray-800 dark:bg-neutral-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-neutral-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 disabled:ring-0 transition ease-in-out duration-150"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        <span>ROLES</span>
      </RouterLink>

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
    </div>

    <div v-if="auth.hasPermission('admin.roles.index')">
      <!-- Barra superior con filtros y botón para nuevo permiso -->
      <div class="w-full flex flex-wrap items-center justify-between gap-3 mb-4">
        <div class="flex flex-wrap items-center gap-2 flex-1 max-w-2xl">
          <!-- Buscar -->
          <div class="w-full sm:w-64">
            <TextInput
              class="w-full block text-xs"
              v-model="search"
              placeholder="Buscar permiso o descripción..."
            />
          </div>

          <!-- Filtrar por tabla -->
          <div class="w-full sm:w-48">
            <SelectInput class="w-full text-xs" v-model="selectedTable">
              <option value="">TODAS LAS TABLAS ({{ tables.length }})</option>
              <option v-for="t in tables" :key="t" :value="t">
                TABLA: {{ t.toUpperCase() }}
              </option>
            </SelectInput>
          </div>
        </div>

        <div class="flex items-center gap-2">
          <PrimaryButton
            v-if="auth.hasPermission('admin.roles.create')"
            @click="openCreateModal"
            class="gap-1 text-xs"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            NUEVO PERMISO
          </PrimaryButton>
        </div>
      </div>

      <!-- Resumen de estadísticas -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-4">
        <div class="p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <div>
            <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-neutral-400">Total Permisos</p>
            <p class="text-base font-bold text-gray-800 dark:text-white">{{ totalPermissions }}</p>
          </div>
        </div>

        <div class="p-3 bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7z" />
            </svg>
          </div>
          <div>
            <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-neutral-400">Módulos / Tablas</p>
            <p class="text-base font-bold text-gray-800 dark:text-white">{{ tables.length }}</p>
          </div>
        </div>
      </div>

      <!-- Grid de permisos agrupados por tabla -->
      <div class="space-y-4">
        <div
          v-for="(perms, table) in permissionsGrouped"
          :key="table"
          class="bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/80 shadow-sm overflow-hidden"
        >
          <!-- Cabecera de la tabla/módulo -->
          <div class="px-4 py-3 bg-gray-50/80 dark:bg-neutral-800/80 border-b border-gray-200 dark:border-neutral-700/80 flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
              <h3 class="text-xs font-bold text-gray-800 dark:text-white uppercase tracking-wider font-mono">
                TABLA: {{ table }}
              </h3>
            </div>
            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300">
              {{ perms.length }} permisos
            </span>
          </div>

          <!-- Contenido de permisos en cuadrícula -->
          <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            <div
              v-for="item in perms"
              :key="item.id"
              class="p-3 rounded-lg border border-gray-100 dark:border-neutral-700/60 bg-gray-50/50 dark:bg-neutral-900/40 hover:border-indigo-300 dark:hover:border-indigo-600 transition flex flex-col justify-between"
            >
              <div>
                <div class="flex items-start justify-between gap-1 mb-1">
                  <p class="text-xs font-bold text-gray-800 dark:text-gray-100 leading-snug">
                    {{ item.description || item.name }}
                  </p>
                </div>
                <code class="text-[10px] font-mono text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/40 px-1.5 py-0.5 rounded border border-indigo-100 dark:border-indigo-900/40 block w-fit truncate max-w-full">
                  {{ item.name }}
                </code>
              </div>

              <!-- Roles que tienen este permiso -->
              <div class="mt-2.5 pt-2 border-t border-gray-100 dark:border-neutral-800 flex flex-wrap items-center gap-1">
                <span class="text-[9px] text-gray-400 dark:text-neutral-400">Roles:</span>
                <span
                  v-for="role in (item.roles || [])"
                  :key="role.id"
                  class="px-1.5 py-0.5 rounded text-[9px] font-semibold uppercase"
                  :class="role.name === 'admin'
                    ? 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300'
                    : 'bg-gray-200 dark:bg-neutral-700 text-gray-700 dark:text-neutral-300'"
                >
                  {{ role.name }}
                </span>
                <span v-if="!item.roles || item.roles.length === 0" class="text-[9px] text-gray-400 italic">
                  Ninguno
                </span>
              </div>
            </div>
          </div>
        </div>

        <div
          v-if="Object.keys(permissionsGrouped).length === 0"
          class="p-8 text-center bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700 text-gray-500"
        >
          No se encontraron permisos con los filtros aplicados.
        </div>
      </div>
    </div>
    <div v-else class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
      No tienes permiso para ver la matriz de permisos.
    </div>

    <!-- ================= MODAL CREAR PERMISO ================= -->
    <DialogModal :show="open_create" maxWidth="md" @close="open_create = false">
      <template #title>
        <div class="flex items-center justify-between w-full">
          <h2 class="text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-white">Nuevo Permiso</h2>
          <button type="button" @click="open_create = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </template>

      <template #content>
        <form @submit.prevent="savePermission" id="createPermissionForm" class="space-y-3">
          <div>
            <InputLabel value="Tabla / Módulo (ej: users, olts, recibos, etc.)" />
            <TextInput
              type="text"
              class="w-full mt-1"
              v-model="formTable"
              placeholder="ej: reportes, auditoria, clientes"
            />
            <InputError :message="formErrors.table_name" class="mt-1" />
          </div>

          <div>
            <InputLabel value="Identificador Técnico (ej: admin.users.export)" />
            <TextInput
              type="text"
              class="w-full mt-1"
              v-model="formName"
              placeholder="ej: admin.reports.export"
            />
            <InputError :message="formErrors.name" class="mt-1" />
          </div>

          <div>
            <InputLabel value="Descripción Amigable" />
            <TextInput
              type="text"
              class="w-full mt-1"
              v-model="formDesc"
              placeholder="ej: Exportar reportes en Excel o PDF"
            />
            <InputError :message="formErrors.description" class="mt-1" />
          </div>
        </form>
      </template>

      <template #footer>
        <div class="flex items-center justify-end gap-2">
          <SecondaryButton @click="open_create = false">
            Cancelar
          </SecondaryButton>
          <PrimaryButton type="submit" form="createPermissionForm" :disabled="isSaving">
            <span v-if="!isSaving">GUARDAR PERMISO</span>
            <span v-else>GUARDANDO...</span>
          </PrimaryButton>
        </div>
      </template>
    </DialogModal>
  </AppLayout>
</template>
