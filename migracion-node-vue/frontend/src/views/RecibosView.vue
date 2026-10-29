<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import DangerButton from '../components/DangerButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import SelectInput from '../components/SelectInput.vue';
import DataTable from '../components/DataTable.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const loading = ref(false);
const recibos = ref<any[]>([]);
const total = ref(0);
const page = ref(1);
const lastPage = ref(1);

// Filters
const search = ref('');
const searchmonth = ref('');
const searchtype = ref('');
const searchstatus = ref('');
const searchuser = ref('');
const searchlocation = ref('');

// Options lists
const users = ref<any[]>([]);
const locations = ref<any[]>([]);
const seriepagos = ref<any[]>([]);
const formapays = ref<any[]>([]);

// Create Recibo Modal
const openCreate = ref(false);
const createType = ref('TODOS');
const createUser = ref('');
const createUbigeo = ref('');
const createSeriepago = ref('');
const createMonth = ref(new Date().toISOString().slice(0, 7));

// Pay Modal
const openPayModal = ref(false);
const payingRecibo = ref<any>(null);
const payAmount = ref('0.00');
const formapayId = ref<number | string>('');
const payDate = ref(new Date().toISOString().split('T')[0]);

async function loadRecibos() {
  try {
    loading.value = true;
    const res = await api.get('/recibos', {
      params: {
        search: search.value,
        month: searchmonth.value ? `${searchmonth.value}-01` : undefined,
        type: searchtype.value || undefined,
        status: searchstatus.value || undefined,
        user_id: searchuser.value || undefined,
        ubigeo_id: searchlocation.value || undefined,
        page: page.value,
        limit: 15,
      },
    });
    recibos.value = res.data.data || [];
    total.value = res.data.meta?.total || 0;
    lastPage.value = res.data.meta?.last_page || 1;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function loadDependencies() {
  try {
    const [uRes, locRes, serRes, fpRes] = await Promise.all([
      api.get('/users'),
      api.get('/ubigeos'),
      api.get('/seriepagos'),
      api.get('/formapays'),
    ]);
    users.value = uRes.data || [];
    locations.value = locRes.data || [];
    seriepagos.value = serRes.data || [];
    if (seriepagos.value.length > 0) {
      createSeriepago.value = seriepagos.value[0].id;
    }
    formapays.value = fpRes.data || [];
    if (formapays.value.length > 0) {
      formapayId.value = formapays.value[0].id;
    }
  } catch (err) {
    console.error(err);
  }
}

watch([search, searchmonth, searchtype, searchstatus, searchuser, searchlocation], () => {
  page.value = 1;
  loadRecibos();
});

function formatDate(dateStr: string) {
  if (!dateStr) return '-';
  const d = new Date(dateStr);
  return d.toLocaleDateString('es-PE', { day: '2-digit', month: 'short', year: 'numeric' }).toUpperCase();
}

function formatPhone(phone: string) {
  if (!phone) return '';
  return phone.replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3');
}

async function saveReciboMasivo() {
  if (!createSeriepago.value) {
    toast('Debe seleccionar una serie', 'warning');
    return;
  }
  try {
    loading.value = true;
    await api.post('/recibos/masivo', {
      seriepago_id: createSeriepago.value,
      month: `${createMonth.value}-01`,
      type: createType.value === 'TODOS' ? null : createType.value,
      user_id: createUser.value || null,
      ubigeo_id: createUbigeo.value || null,
    });
    toast('Recibos generados con éxito', 'success');
    openCreate.value = false;
    await loadRecibos();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al generar recibos', 'error');
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
    toast('Pago registrado', 'success');
    openPayModal.value = false;
    await loadRecibos();
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
    await loadRecibos();
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
    await loadRecibos();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar recibo', 'error');
  } finally {
    loading.value = false;
  }
}

function sharePdf(recibo: any) {
  const phone = recibo.network?.telefono || '';
  const message = `Estimado(a) ${recibo.client?.name}, le informamos sobre su recibo ${recibo.seriecompleta} por un monto de S/. ${recibo.total} con vencimiento el ${formatDate(recibo.vencimiento)}.`;
  const url = `https://wa.me/51${phone}?text=${encodeURIComponent(message)}`;
  window.open(url, '_blank');
}

function printRecibo(reciboId: number) {
  window.open(`${api.defaults.baseURL}/recibos/${reciboId}/print`, '_blank');
}

function exportExcel() {
  window.open(`${api.defaults.baseURL}/reports/recibos?format=excel`, '_blank');
}

function exportPdf() {
  window.open(`${api.defaults.baseURL}/reports/recibos?format=pdf`, '_blank');
}

onMounted(async () => {
  await Promise.all([loadRecibos(), loadDependencies()]);
});
</script>

<template>
  <AppLayout title="Gestionar Recibos de Pago">
    <LoadingOverlay :show="loading" />

    <!-- Create Button -->
    <div>
      <PrimaryButton @click="openCreate = true">
        CREAR RECIBO
      </PrimaryButton>
    </div>

    <!-- Filters Bar -->
    <div class="mt-3">
      <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-48">
          <InputLabel value="Buscar serie recibo" />
          <TextInput v-model="search" class="w-full block" />
        </div>

        <div class="w-full max-w-40">
          <InputLabel value="Filtrar mes" />
          <TextInput v-model="searchmonth" type="month" class="w-full block" />
        </div>

        <div class="w-full max-w-40">
          <InputLabel value="Tipo recibo" />
          <SelectInput v-model="searchtype" class="w-full">
            <option value="">SELECCIONAR...</option>
            <option value="TV">TV</option>
            <option value="FIBRA">FIBRA</option>
            <option value="FIBRA+TV">FIBRA+TV</option>
            <option value="SATELITAL">SATELITAL</option>
          </SelectInput>
        </div>

        <div class="w-full max-w-40">
          <InputLabel value="Estado de pago" />
          <SelectInput v-model="searchstatus" class="w-full">
            <option value="">TODOS</option>
            <option value="PAGADO">PAGADO</option>
            <option value="PENDIENTE">PENDIENTE</option>
          </SelectInput>
        </div>

        <div class="w-full max-w-48">
          <InputLabel value="Usuario" />
          <SelectInput v-model="searchuser" class="w-full">
            <option value="">TODOS</option>
            <option v-for="user in users" :key="user.id" :value="user.id">
              {{ user.name }}
            </option>
          </SelectInput>
        </div>

        <div class="w-full max-w-40">
          <InputLabel value="Seleccionar Lugar" />
          <SelectInput v-model="searchlocation" class="w-full">
            <option value="">TODOS LOS LUGARES</option>
            <option v-for="loc in locations" :key="loc.id" :value="loc.id">
              {{ loc.distrito }} - {{ loc.provincia }}
            </option>
          </SelectInput>
        </div>

        <div class="flex items-end gap-2 ml-auto">
          <button
            type="button"
            @click="exportExcel"
            class="inline-flex items-center justify-center p-2 px-3 bg-emerald-600 dark:bg-emerald-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors gap-1 shadow-sm h-[38px] min-h-[38px]"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            EXCEL
          </button>
          <DangerButton @click="exportPdf" class="inline-flex items-center justify-center px-3 h-[38px] min-h-[38px] gap-1 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            PDF
          </DangerButton>
        </div>
      </div>

      <!-- Table -->
      <div class="w-full">
        <DataTable>
          <template #thead>
            <tr>
              <th>REGISTRADO</th>
              <th>SERIE</th>
              <th style="min-width: 230px;">CLIENTE</th>
              <th style="min-width: 150px;">SERVICIO</th>
              <th style="min-width: 100px;">MES PAGO</th>
              <th style="min-width: 120px;">SUBTOTAL</th>
              <th>DESCUENTO</th>
              <th>TOTAL</th>
              <th>ESTADO</th>
              <th>PROVEEDOR</th>
              <th>ACCIONES</th>
            </tr>
          </template>
          <template #tbody>
            <tr v-if="recibos.length === 0">
              <td colspan="11" class="text-center py-4 text-gray-500">No se encontraron recibos de pago.</td>
            </tr>
            <tr v-for="item in recibos" :key="item.id">
              <td class="text-center uppercase">
                {{ formatDate(item.date) }}
                <p class="text-[10px] text-red-600">VENCE : {{ formatDate(item.vencimiento) }}</p>
              </td>
              <td class="text-center">{{ item.seriecompleta }}</td>
              <td class="text-left">
                <p>
                  <span class="font-bold text-neutral-600 dark:text-neutral-300">[{{ item.client?.document }}]</span>
                  {{ item.client?.name }}
                </p>
                <p class="text-green-600 dark:text-green-500 flex items-center gap-1 font-medium mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                  </svg>
                  {{ formatPhone(item.network?.telefono) }}
                </p>
                <p class="text-[10px] text-neutral-600 dark:text-neutral-400">
                  {{ item.network?.direccion }}
                </p>
              </td>
              <td class="text-center">{{ item.network?.type }}</td>
              <td class="text-center uppercase">
                {{ item.month ? new Date(item.month).toLocaleDateString('es-PE', { month: 'short', year: 'numeric' }).toUpperCase() : '-' }}
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
                <span class="text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                  {{ item.user?.name || '-' }}
                </span>
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

      <!-- Pagination -->
      <div v-if="lastPage > 1" class="sticky bottom-2 z-10 w-full mt-4 flex items-center justify-between bg-white dark:bg-neutral-800 p-2 rounded-lg shadow border border-gray-200 dark:border-neutral-700">
        <span class="text-xs text-gray-600 dark:text-gray-400">
          Página {{ page }} de {{ lastPage }} (Total: {{ total }})
        </span>
        <div class="flex items-center gap-1">
          <button
            :disabled="page <= 1"
            @click="page--; loadRecibos()"
            class="px-2.5 py-1 text-xs font-semibold rounded bg-gray-100 dark:bg-neutral-700 disabled:opacity-50"
          >
            Anterior
          </button>
          <button
            :disabled="page >= lastPage"
            @click="page++; loadRecibos()"
            class="px-2.5 py-1 text-xs font-semibold rounded bg-gray-100 dark:bg-neutral-700 disabled:opacity-50"
          >
            Siguiente
          </button>
        </div>
      </div>
    </div>

    <!-- Create Recibo Modal (Masivo) -->
    <DialogModal :show="openCreate" maxWidth="xl" @close="openCreate = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">GENERAR RECIBO</h1>
          <button @click="openCreate = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="saveReciboMasivo" class="w-full grid grid-cols-1 gap-2">
          <div>
            <InputLabel value="Tipo servicio" />
            <div class="w-full flex flex-wrap gap-2">
              <div>
                <input class="hidden peer" type="radio" name="cr_type" v-model="createType" id="cr_todos" value="TODOS" />
                <label for="cr_todos" class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                  TODOS
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="cr_type" v-model="createType" id="cr_tv" value="TV" />
                <label for="cr_tv" class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                  TV
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="cr_type" v-model="createType" id="cr_fibra" value="FIBRA" />
                <label for="cr_fibra" class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                  FIBRA
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="cr_type" v-model="createType" id="cr_fibra_tv" value="FIBRA+TV" />
                <label for="cr_fibra_tv" class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                  FIBRA+TV
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="cr_type" v-model="createType" id="cr_satelital" value="SATELITAL" />
                <label for="cr_satelital" class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-lg font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-neutral-500 peer-hover:text-white transition ease-in-out duration-150 text-gray-700 dark:text-gray-300">
                  SATELITAL
                </label>
              </div>
            </div>
          </div>

          <div class="w-full">
            <InputLabel value="Usuario" />
            <SelectInput v-model="createUser" class="w-full">
              <option value="">TODOS</option>
              <option v-for="user in users" :key="user.id" :value="user.id">
                {{ user.name }}
              </option>
            </SelectInput>
          </div>

          <div class="w-full">
            <InputLabel value="Seleccionar Lugar (Opcional)" />
            <select v-model="createUbigeo" class="w-full block rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs !p-2">
              <option value="">TODOS LOS LUGARES</option>
              <option v-for="loc in locations" :key="loc.id" :value="loc.id">
                {{ loc.distrito }} - {{ loc.provincia }}
              </option>
            </select>
          </div>

          <div class="w-full">
            <InputLabel value="Tipo recibo" />
            <select v-model="createSeriepago" class="w-full block rounded-lg border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white text-xs !p-2">
              <option value="">SELECCIONAR...</option>
              <option v-for="item in seriepagos" :key="item.id" :value="item.id">
                {{ item.descripcion }}
              </option>
            </select>
          </div>

          <div class="w-full">
            <InputLabel value="Mes" />
            <TextInput v-model="createMonth" type="month" class="w-full block rounded-lg text-xs !p-2" />
          </div>

          <div class="text-end">
            <PrimaryButton type="submit" :disabled="loading">REGISTRAR</PrimaryButton>
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
  </AppLayout>
</template>
