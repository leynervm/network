<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const payments = ref<any[]>([]);
const loading = ref(false);

async function loadPayments() {
  loading.value = true;
  try {
    const res = await api.get('/payments');
    payments.value = res.data.data || res.data || [];
  } catch (err: any) {
    console.error('Error cargando pagos:', err);
  } finally {
    loading.value = false;
  }
}

function formatDate(dateStr: string | null) {
  if (!dateStr) return '-';
  const d = new Date(dateStr);
  if (isNaN(d.getTime())) return dateStr;
  return d.toLocaleDateString('es-PE', { day: '2-digit', month: '2-digit', year: 'numeric' });
}

function formatMonth(dateStr: string | null) {
  if (!dateStr) return '-';
  const d = new Date(dateStr);
  if (isNaN(d.getTime())) return dateStr;
  return d.toLocaleDateString('es-PE', { month: 'long', year: 'numeric' }).toUpperCase();
}

onMounted(loadPayments);
</script>

<template>
  <AppLayout>
    <template #header>
      {{ 'Historial de Pagos' }}
    </template>

    <div v-if="auth.hasPermission('admin.payments.index')">
      <div>
        <div class="w-full">
          <DataTable>
            <template #thead>
              <tr>
                <th>FECHA</th>
                <th>MONTO</th>
                <th>MES PAGO</th>
                <th>FORMA PAGO</th>
                <th>DETALLE</th>
              </tr>
            </template>
            <template #tbody>
              <tr v-for="item in payments" :key="item.id">
                <td class="text-center uppercase">{{ formatDate(item.date) }}</td>
                <td class="text-center">{{ Number(item.amount).toFixed(2) }}</td>
                <td class="text-center uppercase">{{ formatMonth(item.month) }}</td>
                <td class="text-center">
                  {{ item.formapay?.name || 'EFECTIVO' }}
                  <p v-if="item.codetransferencia" class="text-[9px] text-neutral-500">
                    N° OPERACIÓN :{{ item.codetransferencia }}
                  </p>
                </td>
                <td class="text-center">{{ item.detalle }}</td>
              </tr>

              <tr v-if="payments.length === 0">
                <td colspan="5" class="p-6 text-center text-gray-500 dark:text-neutral-400">
                  No se encontraron pagos registrados.
                </td>
              </tr>
            </template>
          </DataTable>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
