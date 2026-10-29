<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import DialogModal from '../components/DialogModal.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const networks = ref<any[]>([]);
const total = ref(0);
const page = ref(1);
const search = ref('');
const statusFilter = ref('');
const typeFilter = ref('');
const loading = ref(true);

const isModalOpen = ref(false);
const clientsList = ref<any[]>([]);
const boxnavsList = ref<any[]>([]);
const antenasList = ref<any[]>([]);

const form = ref({
  date: new Date().toISOString().split('T')[0],
  descripcion: '',
  type: 'FIBRA OPTICA',
  telefono: '',
  price: 50.0,
  direccion: '',
  typelocal: 'PROPIO',
  client_id: '',
  networkable_id: '',
  latitude: null as number | null,
  longitude: null as number | null,
  zoom: 16,
  location: '',
});

async function loadNetworks() {
  try {
    loading.value = true;
    const res = await api.get('/networks', {
      params: {
        search: search.value,
        status: statusFilter.value,
        type: typeFilter.value,
        page: page.value,
        limit: 15,
      },
    });
    networks.value = res.data.data;
    total.value = res.data.meta.total;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function loadDependencies() {
  try {
    const [cRes, bRes, aRes] = await Promise.all([
      api.get('/clients?limit=100'),
      api.get('/boxnavs'),
      api.get('/antenas'),
    ]);
    clientsList.value = cRes.data.data || [];
    boxnavsList.value = bRes.data || [];
    antenasList.value = aRes.data || [];
  } catch (err) {
    console.error(err);
  }
}

function openCreateModal() {
  form.value = {
    date: new Date().toISOString().split('T')[0],
    descripcion: '',
    type: 'FIBRA OPTICA',
    telefono: '',
    price: 50.0,
    direccion: '',
    typelocal: 'PROPIO',
    client_id: '',
    networkable_id: '',
    latitude: null,
    longitude: null,
    zoom: 16,
    location: '',
  };
  isModalOpen.value = true;
}

async function handleSave() {
  if (!form.value.client_id || !form.value.networkable_id || !form.value.price) {
    toast('Cliente, puerto/nodo y precio son requeridos', 'warning');
    return;
  }

  try {
    await api.post('/networks', form.value);
    isModalOpen.value = false;
    await loadNetworks();
  } catch (err) {
    console.error(err);
  }
}

async function handleToggleStatus(net: any) {
  try {
    const res = await api.put(`/networks/${net.id}/toggle-status`);
    net.status = res.data.status;
  } catch (err) {
    console.error(err);
  }
}

async function handleDelete(net: any) {
  const result = await confirmDialog(`¿Eliminar conexión ${net.code}?`, 'Se liberará el puerto y se eliminará el registro.');
  if (result.isConfirmed) {
    try {
      await api.delete(`/networks/${net.id}`);
      await loadNetworks();
    } catch (err) {
      console.error(err);
    }
  }
}

watch([search, statusFilter, typeFilter], () => {
  page.value = 1;
  loadNetworks();
});

onMounted(() => {
  loadNetworks();
  loadDependencies();
});
</script>

<template>
  <AppLayout>
    <div class="space-y-4">
      <!-- Header -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-white dark:bg-neutral-800 p-4 rounded-xl border border-gray-200 dark:border-neutral-700/60 shadow-sm gap-3">
        <div>
          <h1 class="text-xs font-bold text-gray-800 dark:text-gray-100 uppercase tracking-wider">
            Conexiones de Red y Clientes de Internet
          </h1>
          <p class="text-[11px] text-gray-500 dark:text-gray-400">
            Total conexiones registradas: {{ total }} enlaces.
          </p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <input
            v-model="search"
            type="text"
            placeholder="Buscar por cliente, DNI, código..."
            class="rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-1.5 px-3 w-48 focus:ring-neutral-500"
          />

          <select
            v-model="statusFilter"
            class="rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-1.5 px-3 focus:ring-neutral-500"
          >
            <option value="">Todos los Estados</option>
            <option value="0">Activos</option>
            <option value="2">Suspendidos</option>
          </select>

          <button
            v-if="auth.hasPermission('admin.networks.create')"
            @click="openCreateModal"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-neutral-800 dark:bg-neutral-700 text-white text-xs font-bold hover:bg-neutral-900 dark:hover:bg-neutral-600 transition-colors shadow-sm"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            NUEVA CONEXIÓN
          </button>
        </div>
      </div>

      <!-- Networks Table -->
      <div class="bg-white dark:bg-neutral-800 rounded-xl border border-gray-200 dark:border-neutral-700/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs">
            <thead>
              <tr class="border-b border-gray-200 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-750 text-gray-500 dark:text-gray-400 font-semibold uppercase">
                <th class="py-2.5 px-3">Código</th>
                <th class="py-2.5 px-3">Cliente</th>
                <th class="py-2.5 px-3">Tipo / Servicio</th>
                <th class="py-2.5 px-3 text-right">Precio Plan</th>
                <th class="py-2.5 px-3 text-center">Estado</th>
                <th class="py-2.5 px-3 text-right">Acciones</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-neutral-700/50">
              <tr v-for="net in networks" :key="net.id" class="hover:bg-gray-50 dark:hover:bg-neutral-700/30">
                <td class="py-2.5 px-3 font-mono font-bold text-gray-800 dark:text-gray-200">
                  <router-link :to="`/admin/client-network/${net.id}/show`" class="hover:underline text-blue-600 dark:text-blue-400">
                    {{ net.code }}
                  </router-link>
                </td>
                <td class="py-2.5 px-3">
                  <div class="font-semibold text-gray-900 dark:text-gray-100">{{ net.client?.name }}</div>
                  <div class="text-[10px] text-gray-500 font-mono">{{ net.client?.document }} | {{ net.telefono || 'Sin teléfono' }}</div>
                </td>
                <td class="py-2.5 px-3">
                  <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-300">
                    {{ net.type }}
                  </span>
                </td>
                <td class="py-2.5 px-3 text-right font-bold text-gray-800 dark:text-gray-100">
                  S/ {{ Number(net.price).toFixed(2) }}
                </td>
                <td class="py-2.5 px-3 text-center">
                  <button
                    @click="handleToggleStatus(net)"
                    :class="net.status === '0' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300'"
                    class="px-2.5 py-0.5 rounded-full text-[10px] font-bold transition-transform hover:scale-105"
                    title="Click para cambiar estado"
                  >
                    {{ net.status === '0' ? 'ACTIVO' : 'SUSPENDIDO' }}
                  </button>
                </td>
                <td class="py-2.5 px-3 text-right">
                  <div class="inline-flex items-center gap-1">
                    <router-link
                      :to="`/admin/client-network/${net.id}/show`"
                      class="p-1 rounded text-neutral-600 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-700"
                      title="Ver Detalle y Recibos"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </router-link>
                    <button
                      v-if="auth.hasPermission('admin.networks.delete')"
                      @click="handleDelete(net)"
                      class="p-1 rounded text-red-500 hover:bg-red-50"
                      title="Eliminar"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal Conexión -->
      <DialogModal :show="isModalOpen" maxWidth="lg" @close="isModalOpen = false">
        <template #title>
          <div class="flex items-center justify-between w-full">
            <h1 class="font-semibold text-xs uppercase">REGISTRAR CONEXIÓN DE RED</h1>
            <button
              type="button"
              @click="isModalOpen = false"
              class="rounded-md text-gray-700 p-1.5 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="handleSave" class="space-y-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Cliente</label>
                <select v-model="form.client_id" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3">
                  <option value="">Seleccione un cliente...</option>
                  <option v-for="c in clientsList" :key="c.id" :value="c.id">{{ c.document }} - {{ c.name }}</option>
                </select>
              </div>

              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Tipo de Servicio</label>
                <select v-model="form.type" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3">
                  <option value="FIBRA OPTICA">FIBRA OPTICA</option>
                  <option value="FIBRA OPTICA + CABLE TELEVISIÓN">FIBRA OPTICA + CABLE TELEVISIÓN</option>
                  <option value="CABLE TELEVISIÓN">CABLE TELEVISIÓN</option>
                  <option value="INTERNET SATELITAL">INTERNET SATELITAL</option>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">
                  {{ form.type.includes('SATELITAL') ? 'Antena Satelital' : 'Caja NAP / Puerto' }}
                </label>
                <select
                  v-if="form.type.includes('SATELITAL')"
                  v-model="form.networkable_id"
                  required
                  class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3"
                >
                  <option value="">Seleccione antena...</option>
                  <option v-for="a in antenasList" :key="a.id" :value="a.id">{{ a.name }}</option>
                </select>
                <select
                  v-else
                  v-model="form.networkable_id"
                  required
                  class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3"
                >
                  <option value="">Seleccione Caja NAP...</option>
                  <template v-for="b in boxnavsList" :key="b.id">
                    <option v-for="p in b.portboxnavs" :key="p.id" :value="p.id" :disabled="p.status === '1'">
                      {{ b.name }} - Puerto {{ p.code }} {{ p.status === '1' ? '(Ocupado)' : '(Libre)' }}
                    </option>
                  </template>
                </select>
              </div>

              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Precio Mensual (S/)</label>
                <input v-model.number="form.price" type="number" step="0.50" min="0" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Fecha de Instalación</label>
                <input v-model="form.date" type="date" required class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
              </div>
              <div>
                <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Teléfono de Contacto</label>
                <input v-model="form.telefono" type="text" placeholder="9XXXXXXXX" class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3" />
              </div>
            </div>

            <div>
              <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Dirección de Instalación</label>
              <input v-model="form.direccion" type="text" class="w-full rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs py-2 px-3 uppercase" />
            </div>

            <div class="pt-2 flex justify-end gap-2">
              <button type="button" @click="isModalOpen = false" class="px-3 py-1.5 rounded-lg border border-gray-300 text-xs font-semibold">CANCELAR</button>
              <button type="submit" class="px-3 py-1.5 rounded-lg bg-neutral-800 text-white text-xs font-bold uppercase">GUARDAR CONEXIÓN</button>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>
  </AppLayout>
</template>
