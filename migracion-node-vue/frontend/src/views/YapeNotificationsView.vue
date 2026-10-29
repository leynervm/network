<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const notifications = ref<any[]>([]);
const loading = ref(false);

async function loadNotifications() {
  loading.value = true;
  try {
    const res = await api.get('/yape-notifications');
    notifications.value = res.data?.data || res.data || [];
  } catch (err: any) {
    console.error('Error cargando notificaciones:', err);
  } finally {
    loading.value = false;
  }
}

function formatDate(dateStr: string | null) {
  if (!dateStr) return '-';
  const d = new Date(dateStr);
  if (isNaN(d.getTime())) return dateStr;
  return d.toLocaleString('es-PE', {
    day: '2-digit',
    month: 'short',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    hour12: true,
  }).toUpperCase();
}

onMounted(loadNotifications);
</script>

<template>
  <AppLayout>
    <template #header>
      {{ 'Notificaciones Webhook de Yape' }}
    </template>

    <div v-if="auth.hasPermission('admin.yape.notifications')">
      <div class="overflow-x-auto w-full pt-3">
        <DataTable>
          <template #thead>
            <tr>
              <th>FECHA</th>
              <th>TÍTULO</th>
              <th class="text-left">CONTENIDO CAPTURADO</th>
            </tr>
          </template>
          <template #tbody>
            <tr v-for="item in notifications" :key="item.id">
              <td class="text-center uppercase w-[120px]">
                {{ formatDate(item.created_at) }}
              </td>
              <td class="text-center w-[150px]">
                <span class="inline-block text-purple-700 dark:text-purple-400 font-bold px-2 py-1 rounded text-xs">
                  {{ item.title }}
                </span>
              </td>
              <td class="text-left font-medium text-gray-700 dark:text-gray-300">
                {{ item.content }}
              </td>
            </tr>

            <tr v-if="notifications.length === 0">
              <td colspan="3" class="text-center py-4 text-gray-500">
                No hay notificaciones registradas.
              </td>
            </tr>
          </template>
        </DataTable>
      </div>
    </div>
    <div v-else class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
      No tienes permiso para ver las notificaciones de Yape.
    </div>
  </AppLayout>
</template>
