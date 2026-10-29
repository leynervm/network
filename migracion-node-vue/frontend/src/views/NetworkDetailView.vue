<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import { useRoute } from 'vue-router';
import AppLayout from '../layouts/AppLayout.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import DangerButton from '../components/DangerButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const route = useRoute();
const networkId = route.params.id;

const loading = ref(false);
const network = ref<any>(null);
const searchmonth = ref('');

// Equipo Modal
const openCreateEquipo = ref(false);
const equipoDescripcion = ref('');
const equipoType = ref('ALQUILADO');
const equipoPrice = ref('0.00');
const equipoMac = ref('');

const openEditEquipo = ref(false);
const editingEquipo = ref<any>(null);
const editEquipoDesc = ref('');
const editEquipoType = ref('ALQUILADO');
const editEquipoPrice = ref('0.00');
const editEquipoMac = ref('');

// Recibo Modal
const openCreateRecibo = ref(false);
const reciboMonth = ref(new Date().toISOString().slice(0, 7));
const reciboAmount = ref('0.00');
const reciboDescuento = ref('0.00');
const reciboDate = ref(new Date().toISOString().split('T')[0]);
const reciboVencimiento = ref(new Date().toISOString().split('T')[0]);
const seriepagos = ref<any[]>([]);
const seriepagoId = ref<number | string>('');

// Pay Modal
const openPayModal = ref(false);
const payingRecibo = ref<any>(null);
const payAmount = ref('0.00');
const formapays = ref<any[]>([]);
const formapayId = ref<number | string>('');
const payDate = ref(new Date().toISOString().split('T')[0]);

async function loadNetwork() {
  try {
    loading.value = true;
    const res = await api.get(`/networks/${networkId}`);
    network.value = res.data;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function loadDependencies() {
  try {
    const [spRes, fpRes] = await Promise.all([
      api.get('/seriepagos'),
      api.get('/formapays'),
    ]);
    seriepagos.value = spRes.data || [];
    if (seriepagos.value.length > 0) {
      seriepagoId.value = seriepagos.value[0].id;
    }
    formapays.value = fpRes.data || [];
    if (formapays.value.length > 0) {
      formapayId.value = formapays.value[0].id;
    }
  } catch (err) {
    console.error(err);
  }
}

function formatDate(dateStr: string) {
  if (!dateStr) return '-';
  const d = new Date(dateStr);
  return d.toLocaleDateString('es-PE', { day: '2-digit', month: 'short', year: 'numeric' }).toUpperCase();
}

function formatPhone(phone: string) {
  if (!phone) return '';
  return phone.replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3');
}

// Equipos operations
async function saveEquipo() {
  if (!equipoDescripcion.value.trim()) {
    toast('Descripción requerida', 'warning');
    return;
  }
  try {
    loading.value = true;
    await api.post('/equipos', {
      network_id: networkId,
      descripcion: equipoDescripcion.value.trim().toUpperCase(),
      type: equipoType.value,
      price: parseFloat(equipoPrice.value) || 0,
      mac: equipoMac.value.trim() || null,
    });
    toast('Equipo agregado con éxito', 'success');
    openCreateEquipo.value = false;
    equipoDescripcion.value = '';
    equipoMac.value = '';
    equipoPrice.value = '0.00';
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar equipo', 'error');
  } finally {
    loading.value = false;
  }
}

function editEquipo(item: any) {
  editingEquipo.value = item;
  editEquipoDesc.value = item.descripcion;
  editEquipoType.value = item.type;
  editEquipoPrice.value = item.price;
  editEquipoMac.value = item.mac || '';
  openEditEquipo.value = true;
}

async function updateEquipo() {
  if (!editingEquipo.value) return;
  try {
    loading.value = true;
    await api.put(`/equipos/${editingEquipo.value.id}`, {
      descripcion: editEquipoDesc.value.trim().toUpperCase(),
      type: editEquipoType.value,
      price: parseFloat(editEquipoPrice.value) || 0,
      mac: editEquipoMac.value.trim() || null,
    });
    toast('Equipo actualizado', 'success');
    openEditEquipo.value = false;
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar equipo', 'error');
  } finally {
    loading.value = false;
  }
}

async function deleteEquipo(id: number) {
  const confirm = await confirmDialog('¿Eliminar equipo?', 'Esta acción no se puede deshacer.', 'warning');
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/equipos/${id}`);
    toast('Equipo eliminado', 'success');
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar', 'error');
  } finally {
    loading.value = false;
  }
}

// Recibos operations
function openCreateReciboModal() {
  reciboAmount.value = String(network.value?.price || '0.00');
  reciboDescuento.value = '0.00';
  openCreateRecibo.value = true;
}

async function saveRecibo() {
  try {
    loading.value = true;
    const subtotal = parseFloat(reciboAmount.value) || 0;
    const desc = parseFloat(reciboDescuento.value) || 0;
    const total = subtotal - desc;

    await api.post('/recibos', {
      network_id: networkId,
      month: `${reciboMonth.value}-01`,
      date: reciboDate.value,
      vencimiento: reciboVencimiento.value,
      amount: subtotal,
      descuento: desc,
      total: total,
      seriepago_id: seriepagoId.value || null,
    });

    toast('Recibo generado exitosamente', 'success');
    openCreateRecibo.value = false;
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al generar recibo', 'error');
  } finally {
    loading.value = false;
  }
}

function openPay(recibo: any) {
  payingRecibo.value = recibo;
  payAmount.value = String(recibo.total);
  openPayModal.value = true;
}

async function submitPayment() {
  if (!payingRecibo.value) return;
  try {
    loading.value = true;
    await api.post('/payments', {
      recibo_id: payingRecibo.value.id,
      formapay_id: formapayId.value,
      amount: parseFloat(payAmount.value),
      date: payDate.value,
    });
    toast('Pago registrado exitosamente', 'success');
    openPayModal.value = false;
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al registrar pago', 'error');
  } finally {
    loading.value = false;
  }
}

async function confirmDeletePayment(recibo: any) {
  const confirm = await confirmDialog('¿Anular pago?', 'Se desvinculará el comprobante de pago.', 'warning');
  if (!confirm) return;

  try {
    loading.value = true;
    if (recibo.payment?.id) {
      await api.delete(`/payments/${recibo.payment.id}`);
    }
    toast('Pago anulado', 'success');
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al anular pago', 'error');
  } finally {
    loading.value = false;
  }
}

async function confirmDeleteRecibo(recibo: any) {
  const confirm = await confirmDialog('¿Eliminar recibo?', 'Esta acción no se puede deshacer.', 'warning');
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/recibos/${recibo.id}`);
    toast('Recibo eliminado', 'success');
    await loadNetwork();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar recibo', 'error');
  } finally {
    loading.value = false;
  }
}

function sharePdf(recibo: any) {
  const phone = network.value?.telefono || '';
  const message = `Estimado(a) ${network.value?.client?.name}, le informamos sobre su recibo ${recibo.seriecompleta} por un monto de S/. ${recibo.total} con vencimiento el ${formatDate(recibo.vencimiento)}.`;
  const url = `https://wa.me/51${phone}?text=${encodeURIComponent(message)}`;
  window.open(url, '_blank');
}

function printRecibo(reciboId: number) {
  window.open(`${api.defaults.baseURL}/recibos/${reciboId}/print`, '_blank');
}

const filteredRecibos = computed(() => {
  if (!network.value?.recibos) return [];
  if (!searchmonth.value) return network.value.recibos;
  return network.value.recibos.filter((r: any) => r.month && r.month.startsWith(searchmonth.value));
});

onMounted(async () => {
  await Promise.all([loadNetwork(), loadDependencies()]);
});
</script>

<template>
  <AppLayout :title="network ? `Cliente Red: ${network.code}` : 'Cargando...'">
    <LoadingOverlay :show="loading" />

    <div v-if="network">
      <!-- Header / Tarjeta Principal de Información -->
      <div class="w-full bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 shadow-sm rounded-xl mb-3 overflow-hidden transition-colors duration-300">
        <div class="p-2 sm:p-3 flex flex-col md:flex-row md:items-center justify-between gap-2 border-b border-neutral-100 dark:border-neutral-800">
          <div>
            <div class="flex flex-wrap items-center gap-3 mb-1.5">
              <h1 class="text-xl sm:text-2xl font-black text-neutral-800 dark:text-neutral-100 uppercase tracking-tight flex items-center">
                <span class="text-neutral-400 dark:text-neutral-500 font-semibold text-sm mr-2">CÓDIGO:</span>
                {{ network.code }}
              </h1>
              <span
                v-if="network.status === '2'"
                class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400 border border-red-200 dark:border-red-500/20 shadow-sm"
              >
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5 animate-pulse"></span> Suspendido
              </span>
              <span
                v-else
                class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20 shadow-sm"
              >
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Activo
              </span>
            </div>
            <div class="text-sm text-neutral-600 dark:text-neutral-400 font-medium flex flex-wrap items-center gap-2">
              <svg class="w-4 h-4 text-neutral-400 dark:text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <span>{{ network.client?.name }}</span>
              <span class="opacity-75 text-xs bg-neutral-100 dark:bg-neutral-800 px-2 py-0.5 rounded-md border border-neutral-200 dark:border-neutral-700">
                {{ network.client?.document }}
              </span>

              <span v-if="network.telefono" class="flex items-center gap-1 text-green-600 dark:text-green-500 ml-1 md:ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
                  <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                </svg>
                {{ formatPhone(network.telefono) }}
              </span>
            </div>
          </div>

          <!-- Bloque de Precio -->
          <div class="flex flex-col md:items-end bg-neutral-50 dark:bg-neutral-800/50 p-2 rounded-lg border border-neutral-100 dark:border-neutral-800">
            <span class="text-[10px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider mb-0.5">
              Costo de Servicio
            </span>
            <div class="flex items-baseline gap-1 text-emerald-600 dark:text-emerald-400">
              <span class="text-sm font-semibold">S/.</span>
              <span class="text-xl font-black tracking-tight">{{ Number(network.price).toFixed(2) }}</span>
            </div>
          </div>
        </div>

        <div class="p-2 sm:p-3 bg-neutral-50/50 dark:bg-neutral-900/30">
          <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3">
            <!-- Fecha Alta -->
            <div class="flex flex-col gap-1">
              <dt class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Fecha de Alta
              </dt>
              <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                {{ formatDate(network.date) }}
              </dd>
            </div>

            <!-- Conexión -->
            <div class="flex flex-col gap-1">
              <dt class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Conexión
              </dt>
              <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                <template v-if="network.networkable">
                  <template v-if="network.type === 'SATELITAL'">
                    <p>{{ network.networkable.name }}</p>
                    <span v-if="network.networkable.direccion" class="block text-[10px] text-neutral-500 dark:text-neutral-400 leading-tight mt-0.5">
                      {{ network.networkable.direccion }}
                    </span>
                  </template>
                  <template v-else>
                    <p>{{ network.networkable.code }}</p>
                    <span class="block text-[10px] text-neutral-500 dark:text-neutral-400 leading-tight mt-0.5">
                      {{ network.networkable.boxnav?.name }},
                      {{ network.networkable.boxnav?.spliter?.name }},
                      {{ network.networkable.boxnav?.spliter?.olt?.name }}
                    </span>
                  </template>
                </template>
              </dd>
            </div>

            <!-- Servicio -->
            <div class="flex flex-col gap-1">
              <dt class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                Servicio
              </dt>
              <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                {{ network.type }}
              </dd>
            </div>

            <!-- Ciclo de pago -->
            <div class="flex flex-col gap-1">
              <dt class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Ciclos de Pago
              </dt>
              <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200">
                Último día cada mes
              </dd>
            </div>

            <!-- Dirección -->
            <div class="flex flex-col gap-1 sm:col-span-2 lg:col-span-4 border-t border-neutral-200/60 dark:border-neutral-800 pt-2 mt-1">
              <dt class="text-[11px] font-bold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Dirección de Instalación
              </dt>
              <dd class="text-sm font-medium text-neutral-800 dark:text-neutral-200 flex flex-wrap items-center gap-2">
                {{ network.direccion }}
                <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-neutral-200 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 border border-neutral-300 dark:border-neutral-700 shadow-sm">
                  {{ network.typelocal }}
                </span>
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <!-- Modulos Adicionales (Equipos & Recibos) -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        <!-- Equipos Section (Sidebar) -->
        <div class="lg:col-span-1 space-y-2">
          <div class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-xl shadow-sm p-2 transition-colors duration-300">
            <div class="flex items-center gap-2 mb-2">
              <div class="p-1.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-lg border border-indigo-100 dark:border-indigo-500/20 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                </svg>
              </div>
              <h2 class="text-sm font-bold text-neutral-800 dark:text-neutral-100 uppercase tracking-wide">
                Equipos Agregados
              </h2>
            </div>

            <div class="space-y-3">
              <div>
                <PrimaryButton @click="openCreateEquipo = true">
                  REGISTRAR EQUIPO
                </PrimaryButton>
              </div>

              <div class="w-full">
                <DataTable>
                  <template #thead>
                    <tr>
                      <th class="text-left">DESCRIPCION</th>
                      <th>TIPO ENTREGA</th>
                      <th>PRECIO</th>
                      <th class="sr-only">OPCIONES</th>
                    </tr>
                  </template>
                  <template #tbody>
                    <tr v-for="item in network.equipos || []" :key="item.id">
                      <td class="text-left">
                        {{ item.descripcion }}
                        <p v-if="item.mac" class="text-[10px] text-neutral-500">MAC: {{ item.mac }}</p>
                      </td>
                      <td class="text-center uppercase">{{ item.type }}</td>
                      <td class="text-center">{{ item.price }}</td>
                      <td class="text-end">
                        <div class="flex items-center justify-end gap-1">
                          <button
                            type="button"
                            @click="editEquipo(item)"
                            title="Editar"
                            class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                          </button>
                          <button
                            type="button"
                            @click="deleteEquipo(item.id)"
                            title="Eliminar"
                            class="inline-block p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white duration-150 transition-colors"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4 block mx-auto">
                              <path d="M3 6h18" />
                              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                              <line x1="10" x2="10" y1="11" y2="17" />
                              <line x1="14" x2="14" y1="11" y2="17" />
                            </svg>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </template>
                </DataTable>
              </div>
            </div>
          </div>
        </div>

        <!-- Recibos Section (Main Content) -->
        <div class="lg:col-span-2 space-y-2">
          <div class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-xl shadow-sm overflow-hidden transition-colors duration-300 p-2">
            <div class="flex items-center gap-2 mb-2">
              <div class="p-1.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg border border-emerald-100 dark:border-emerald-500/20 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
              <h2 class="text-sm font-bold text-neutral-800 dark:text-neutral-100 uppercase tracking-wide">
                Recibos de Pago
              </h2>
            </div>

            <div class="w-full flex justify-between items-start gap-3">
              <PrimaryButton v-if="network.status === '0'" @click="openCreateReciboModal">
                CREAR RECIBO
              </PrimaryButton>

              <div class="w-full max-w-36 ml-auto">
                <TextInput v-model="searchmonth" type="month" class="w-full block !py-1 !text-[10px]" />
              </div>
            </div>

            <div class="overflow-x-auto w-full pt-3">
              <DataTable>
                <template #thead>
                  <tr>
                    <th>REGISTRADO</th>
                    <th>SERIE</th>
                    <th>MES PAGO</th>
                    <th>SUBTOTAL</th>
                    <th>DESCUENTO</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                  </tr>
                </template>
                <template #tbody>
                  <tr v-if="filteredRecibos.length === 0">
                    <td colspan="8" class="text-center py-4 text-gray-500">No hay recibos registrados.</td>
                  </tr>
                  <tr v-for="item in filteredRecibos" :key="item.id">
                    <td class="text-center uppercase">
                      {{ formatDate(item.date) }}
                      <p class="text-[10px] text-red-600">VENCE : {{ formatDate(item.vencimiento) }}</p>
                    </td>
                    <td class="text-center">{{ item.seriecompleta }}</td>
                    <td class="text-center uppercase">
                      {{ item.month ? new Date(item.month).toLocaleDateString('es-PE', { month: 'long', year: 'numeric' }).toUpperCase() : '-' }}
                    </td>
                    <td class="text-center">{{ item.amount }}</td>
                    <td class="text-center">{{ item.descuento }}</td>
                    <td class="text-center">{{ item.total }}</td>
                    <td class="text-center align-middle">
                      <div class="flex flex-col gap-1 justify-center items-center">
                        <template v-if="item.payment">
                          <span class="inline-block bg-green-500 text-white rounded text-[10px] p-1 leading-3">PAGADO</span>
                          <DangerButton @click="confirmDeletePayment(item)">ANULAR</DangerButton>
                        </template>
                        <template v-else>
                          <PrimaryButton @click="openPay(item)">PAGAR</PrimaryButton>
                        </template>
                      </div>
                    </td>
                    <td class="text-center align-middle">
                      <div class="flex items-center justify-center gap-1.5">
                        <button
                          type="button"
                          @click="sharePdf(item)"
                          title="Compartir por WhatsApp"
                          class="inline-flex items-center justify-center p-1.5 rounded-lg bg-green-50 hover:bg-green-100 dark:bg-green-500/10 dark:hover:bg-green-500/20 text-green-600 dark:text-green-400 border border-green-200 dark:border-green-500/30 transition-colors shadow-sm"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-4" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                          </svg>
                        </button>
                        <button
                          type="button"
                          @click="printRecibo(item.id)"
                          title="Imprimir Recibo"
                          class="inline-flex items-center justify-center p-1.5 rounded-lg bg-white hover:bg-neutral-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 text-neutral-700 dark:text-white border border-neutral-600 dark:border-neutral-400 transition-colors shadow-sm"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081-.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                          </svg>
                        </button>
                        <button
                          type="button"
                          @click="confirmDeleteRecibo(item)"
                          title="Eliminar Recibo"
                          class="p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white transition-colors"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4 block mx-auto">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                          </svg>
                        </button>
                      </div>
                    </td>
                  </tr>
                </template>
              </DataTable>
            </div>
          </div>
        </div>
      </div>

      <!-- Create Equipo Modal -->
      <DialogModal :show="openCreateEquipo" maxWidth="xl" @close="openCreateEquipo = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">REGISTRAR EQUIPO</h1>
            <button @click="openCreateEquipo = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="saveEquipo" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full grid lg:grid-cols-2 gap-2">
              <div class="lg:col-span-2">
                <InputLabel value="Agregar equipo" />
                <TextInput v-model="equipoDescripcion" class="w-full block" />
              </div>
              <div class="w-full">
                <InputLabel value="Tipo entrega" />
                <select v-model="equipoType" class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs">
                  <option value="ALQUILADO">EQUIPO ALQUILADO</option>
                  <option value="VENDIDO">EQUIPO VENDIDO</option>
                </select>
              </div>
              <div class="w-full">
                <InputLabel value="Precio" />
                <TextInput v-model="equipoPrice" type="number" step="0.01" min="0" class="w-full block" />
              </div>
              <div class="w-full">
                <InputLabel value="MAC" />
                <TextInput v-model="equipoMac" class="w-full block" />
              </div>
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">REGISTRAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Edit Equipo Modal -->
      <DialogModal :show="openEditEquipo" maxWidth="xl" @close="openEditEquipo = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR EQUIPO</h1>
            <button @click="openEditEquipo = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="updateEquipo" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full grid lg:grid-cols-2 gap-2">
              <div class="lg:col-span-2">
                <InputLabel value="Agregar equipo" />
                <TextInput v-model="editEquipoDesc" class="w-full block" />
              </div>
              <div class="w-full">
                <InputLabel value="Tipo entrega" />
                <select v-model="editEquipoType" class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs">
                  <option value="ALQUILADO">EQUIPO ALQUILADO</option>
                  <option value="VENDIDO">EQUIPO VENDIDO</option>
                </select>
              </div>
              <div class="w-full">
                <InputLabel value="Precio" />
                <TextInput v-model="editEquipoPrice" type="number" step="0.01" min="0" class="w-full block" />
              </div>
              <div class="w-full">
                <InputLabel value="MAC" />
                <TextInput v-model="editEquipoMac" class="w-full block" />
              </div>
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">ACTUALIZAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Create Recibo Modal -->
      <DialogModal :show="openCreateRecibo" maxWidth="xl" @close="openCreateRecibo = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">CREAR RECIBO INDIVIDUAL</h1>
            <button @click="openCreateRecibo = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="saveRecibo" class="w-full grid grid-cols-1 gap-3">
            <div>
              <InputLabel value="Serie del recibo" />
              <select v-model="seriepagoId" class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs">
                <option v-for="sp in seriepagos" :key="sp.id" :value="sp.id">
                  {{ sp.serie }} (N° {{ sp.correlativo }})
                </option>
              </select>
            </div>
            <div class="grid grid-cols-2 gap-2">
              <div>
                <InputLabel value="Mes de cobro" />
                <TextInput v-model="reciboMonth" type="month" class="w-full block" />
              </div>
              <div>
                <InputLabel value="Fecha de emisión" />
                <TextInput v-model="reciboDate" type="date" class="w-full block" />
              </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
              <div>
                <InputLabel value="Subtotal (S/.)" />
                <TextInput v-model="reciboAmount" type="number" step="0.01" class="w-full block" />
              </div>
              <div>
                <InputLabel value="Descuento (S/.)" />
                <TextInput v-model="reciboDescuento" type="number" step="0.01" class="w-full block" />
              </div>
            </div>
            <div>
              <InputLabel value="Fecha de vencimiento" />
              <TextInput v-model="reciboVencimiento" type="date" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">GENERAR RECIBO</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Pay Modal -->
      <DialogModal :show="openPayModal" maxWidth="xl" @close="openPayModal = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">REGISTRAR PAGO DE RECIBO</h1>
            <button @click="openPayModal = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="submitPayment" class="w-full grid grid-cols-1 gap-3">
            <div>
              <InputLabel value="Forma de Pago" />
              <select v-model="formapayId" class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs">
                <option v-for="fp in formapays" :key="fp.id" :value="fp.id">
                  {{ fp.name }}
                </option>
              </select>
            </div>
            <div>
              <InputLabel value="Monto recibido (S/.)" />
              <TextInput v-model="payAmount" type="number" step="0.01" class="w-full block" />
            </div>
            <div>
              <InputLabel value="Fecha de pago" />
              <TextInput v-model="payDate" type="date" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">CONFIRMAR PAGO</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>
  </AppLayout>
</template>
