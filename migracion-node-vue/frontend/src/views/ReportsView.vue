<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import { api } from '../services/api.js';
import { toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const type = ref<'0' | '1' | '2'>('0');

// Dependency lists
const clients = ref<any[]>([]);
const formapays = ref<any[]>([]);

// Report 0: Clientes Internet
const networkForm = ref({
  type: 'FIBRA',
  typelocal: '',
  formapay_id: '',
});

// Report 1: Recibos Internet
const reciboForm = ref({
  search: '',
  month: '',
  formapay_id: '',
});

// Report 2: Pagos Internet
const paymentForm = ref({
  date_month: '',
  month: '',
  formapay_id: '',
});

const isExporting = ref(false);

async function loadDependencies() {
  try {
    const [cRes, fpRes] = await Promise.all([
      api.get('/clients'),
      api.get('/formapays'),
    ]);
    clients.value = cRes.data?.data || cRes.data || [];
    formapays.value = fpRes.data || [];
  } catch (err: any) {
    console.error('Error cargando dependencias de reportes:', err);
  }
}

async function exportNetwork() {
  isExporting.value = true;
  try {
    const query = new URLSearchParams({
      type: networkForm.value.type,
      typelocal: networkForm.value.typelocal,
      client_id: networkForm.value.formapay_id,
      format: 'excel',
    }).toString();
    window.open(`${api.defaults.baseURL}/reports/networks?${query}`, '_blank');
  } catch (err: any) {
    toast('Error exportando reporte de conexiones', 'error');
  } finally {
    isExporting.value = false;
  }
}

async function exportRecibo() {
  isExporting.value = true;
  try {
    const query = new URLSearchParams({
      search: reciboForm.value.search,
      month: reciboForm.value.month,
      formapay_id: reciboForm.value.formapay_id,
      format: 'excel',
    }).toString();
    window.open(`${api.defaults.baseURL}/reports/recibos?${query}`, '_blank');
  } catch (err: any) {
    toast('Error exportando reporte de recibos', 'error');
  } finally {
    isExporting.value = false;
  }
}

async function exportPayment() {
  isExporting.value = true;
  try {
    const query = new URLSearchParams({
      month: paymentForm.value.month,
      formapay_id: paymentForm.value.formapay_id,
      format: 'excel',
    }).toString();
    window.open(`${api.defaults.baseURL}/reports/payments?${query}`, '_blank');
  } catch (err: any) {
    toast('Error exportando reporte de pagos', 'error');
  } finally {
    isExporting.value = false;
  }
}

onMounted(loadDependencies);
</script>

<template>
  <AppLayout>
    <div v-if="auth.hasPermission('admin.reports.index')" class="w-full">
      <div class="w-full justify-center items-center text-center space-x-2">
        <PrimaryButton @click="type = '0'">CLIENTES INTERNET</PrimaryButton>
        <PrimaryButton @click="type = '1'">RECIBOS INTERNET</PrimaryButton>
        <PrimaryButton @click="type = '2'">PAGOS INTERNET</PrimaryButton>
      </div>

      <!-- Reporte 0: Clientes Internet -->
      <div v-show="type === '0'" class="transition-all duration-200">
        <form
          @submit.prevent="exportNetwork"
          class="w-full bg-white dark:bg-neutral-800 border dark:border-neutral-700 shadow rounded mt-5 p-5 md:max-w-md mx-auto grid grid-cols-1 gap-2"
        >
          <div>
            <InputLabel value="Tipo internet" />
            <div class="w-full flex flex-wrap gap-2">
              <div>
                <input
                  class="hidden peer"
                  type="radio"
                  name="type"
                  v-model="networkForm.type"
                  id="fibra"
                  value="FIBRA"
                />
                <label
                  for="fibra"
                  class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 dark:border-neutral-600 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-neutral-200"
                >
                  FIBRA
                </label>
              </div>
              <div>
                <input
                  class="hidden peer"
                  type="radio"
                  name="type"
                  v-model="networkForm.type"
                  id="satelital"
                  value="SATELITAL"
                />
                <label
                  for="satelital"
                  class="inline-flex items-center cursor-pointer px-2.5 py-2 peer-checked:bg-gray-800 border border-gray-300 dark:border-neutral-600 rounded-md font-semibold text-[10px] peer-checked:text-white uppercase tracking-widest peer-hover:bg-gray-700 peer-hover:text-white peer-focus:bg-gray-700 peer-active:bg-gray-900 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 peer-focus:ring-offset-2 transition ease-in-out duration-150 text-gray-700 dark:text-neutral-200"
                >
                  SATELITAL
                </label>
              </div>
            </div>
          </div>

          <div class="w-full">
            <InputLabel value="Tipo local" />
            <select
              class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs"
              v-model="networkForm.typelocal"
            >
              <option value="">SELECCIONAR...</option>
              <option value="ALQUILADO">ALQUILADO</option>
              <option value="PROPIO">PROPIO</option>
            </select>
          </div>

          <div class="w-full">
            <InputLabel value="Filtrar cliente" />
            <select
              class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs"
              v-model="networkForm.formapay_id"
            >
              <option value="">SELECCIONAR...</option>
              <option v-for="item in clients" :key="item.id" :value="item.id">
                {{ item.name }}
              </option>
            </select>
          </div>

          <div class="text-end">
            <PrimaryButton type="submit" :disabled="isExporting">
              EXPORTAR EXCEL
            </PrimaryButton>
          </div>
        </form>
      </div>

      <!-- Reporte 1: Recibos Internet -->
      <div v-show="type === '1'" class="transition-all duration-200">
        <form
          @submit.prevent="exportRecibo"
          class="w-full bg-white dark:bg-neutral-800 border dark:border-neutral-700 shadow rounded mt-5 p-5 md:max-w-md mx-auto grid grid-cols-1 gap-2"
        >
          <div>
            <InputLabel value="Filtrar serie recibo" />
            <TextInput class="w-full block" v-model="reciboForm.search" />
          </div>

          <div class="w-full">
            <InputLabel value="Filtrar mes" />
            <TextInput class="w-full block" v-model="reciboForm.month" type="month" />
          </div>

          <div class="w-full">
            <InputLabel value="Filtrar forma pago" />
            <select
              class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs"
              v-model="reciboForm.formapay_id"
            >
              <option value="">SELECCIONAR...</option>
              <option v-for="item in formapays" :key="item.id" :value="item.id">
                {{ item.name }}
              </option>
            </select>
          </div>

          <div class="text-end">
            <PrimaryButton type="submit" :disabled="isExporting">
              EXPORTAR EXCEL
            </PrimaryButton>
          </div>
        </form>
      </div>

      <!-- Reporte 2: Pagos Internet -->
      <div v-show="type === '2'" class="transition-all duration-200">
        <form
          @submit.prevent="exportPayment"
          class="w-full bg-white dark:bg-neutral-800 border dark:border-neutral-700 shadow rounded mt-5 p-5 md:max-w-md mx-auto grid grid-cols-1 gap-2"
        >
          <div>
            <InputLabel value="Filtrar fecha pago" />
            <TextInput class="w-full block" v-model="paymentForm.date_month" type="month" />
          </div>

          <div class="w-full">
            <InputLabel value="Filtrar mes" />
            <TextInput class="w-full block" v-model="paymentForm.month" type="month" />
          </div>

          <div class="w-full">
            <InputLabel value="Filtrar forma pago" />
            <select
              class="w-full block rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 text-xs"
              v-model="paymentForm.formapay_id"
            >
              <option value="">SELECCIONAR...</option>
              <option v-for="item in formapays" :key="item.id" :value="item.id">
                {{ item.name }}
              </option>
            </select>
          </div>

          <div class="text-end">
            <PrimaryButton type="submit" :disabled="isExporting">
              EXPORTAR EXCEL
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    <div v-else class="p-6 bg-white dark:bg-neutral-800 rounded-xl text-center text-red-500 font-semibold text-sm">
      No tienes permiso para ver los reportes del sistema.
    </div>
  </AppLayout>
</template>
