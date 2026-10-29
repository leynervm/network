<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import AppLayout from '../layouts/AppLayout.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import DialogModal from '../components/DialogModal.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const router = useRouter();

const loading = ref(false);
const olts = ref<any[]>([]);

// Create modal
const openCreate = ref(false);
const createName = ref('');
const createOuts = ref<number | string>(8);
const createErrors = ref<Record<string, string>>({});

// Edit modal
const openEdit = ref(false);
const editingOlt = ref<any>(null);
const editName = ref('');
const editOuts = ref<number | string>(8);
const editErrors = ref<Record<string, string>>({});

async function loadOlts() {
  try {
    loading.value = true;
    const res = await api.get('/olts');
    olts.value = res.data || [];
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function saveOlt() {
  createErrors.value = {};
  if (!createName.value.trim()) {
    createErrors.value.name = 'La descripción es obligatoria';
    return;
  }
  if (!createOuts.value || Number(createOuts.value) < 1) {
    createErrors.value.outs = 'El número de salidas debe ser mayor a 0';
    return;
  }

  try {
    loading.value = true;
    await api.post('/olts', {
      name: createName.value.trim().toUpperCase(),
      outs: parseInt(String(createOuts.value), 10),
    });
    toast('OLT registrada con éxito', 'success');
    openCreate.value = false;
    createName.value = '';
    createOuts.value = 8;
    await loadOlts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar OLT', 'error');
  } finally {
    loading.value = false;
  }
}

function edit(item: any) {
  editingOlt.value = item;
  editName.value = item.name;
  editOuts.value = item.outs;
  editErrors.value = {};
  openEdit.value = true;
}

async function updateOlt() {
  if (!editingOlt.value) return;
  editErrors.value = {};
  if (!editName.value.trim()) {
    editErrors.value.name = 'La descripción es obligatoria';
    return;
  }
  if (!editOuts.value || Number(editOuts.value) < 1) {
    editErrors.value.outs = 'El número de salidas debe ser mayor a 0';
    return;
  }

  try {
    loading.value = true;
    await api.put(`/olts/${editingOlt.value.id}`, {
      name: editName.value.trim().toUpperCase(),
      outs: parseInt(String(editOuts.value), 10),
    });
    toast('OLT actualizada con éxito', 'success');
    openEdit.value = false;
    await loadOlts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar OLT', 'error');
  } finally {
    loading.value = false;
  }
}

async function confirmDeleteOLT(item: any) {
  const confirm = await confirmDialog(
    `Eliminar registro de OLT con descripción ${item.name} ?`,
    'El registro dejará de estar disponible en la base de datos, incluyendo todos sus registros vinculados.',
    'question'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/olts/${item.id}`);
    toast('OLT eliminada correctamente', 'success');
    await loadOlts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar OLT', 'error');
  } finally {
    loading.value = false;
  }
}

onMounted(loadOlts);
</script>

<template>
  <AppLayout title="Gestionar OLTs">
    <LoadingOverlay :show="loading" />

    <!-- Create OLT Button -->
    <div>
      <PrimaryButton @click="openCreate = true">
        REGISTRAR OLT
      </PrimaryButton>
    </div>

    <!-- OLTs List -->
    <div v-if="olts.length > 0" class="w-full flex flex-col gap-3 mt-3">
      <div
        v-for="item in olts"
        :key="item.id"
        @click="router.push(`/admin/olts/${item.id}/show`)"
        class="w-full p-3 rounded-xl bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700/80 shadow-sm hover:shadow-md hover:border-neutral-500 dark:hover:border-neutral-500 transition-all duration-200 flex justify-between items-center gap-3 group cursor-pointer"
      >
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-neutral-50 dark:bg-neutral-700/50 border border-neutral-100 dark:border-neutral-700/60 flex items-center justify-center text-neutral-600 dark:text-neutral-400 group-hover:scale-105 transition-transform shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
            </svg>
          </div>
          <div>
            <h1 class="text-xs font-bold text-gray-800 dark:text-gray-100 group-hover:text-neutral-600 dark:group-hover:text-neutral-400 transition-colors">
              {{ item.name }}
            </h1>
            <span class="inline-block mt-0.5 px-2 py-0.5 bg-gray-100 dark:bg-neutral-700/60 text-gray-600 dark:text-gray-300 text-[10px] font-semibold rounded-md border border-gray-200/60 dark:border-neutral-600/60">
              {{ item.outs }} SALIDAS
            </span>
          </div>
        </div>

        <div class="flex gap-1 items-center" @click.stop>
          <button
            type="button"
            @click.stop="edit(item)"
            title="Editar OLT"
            class="p-1.5 rounded-lg text-orange-500 hover:bg-orange-500 hover:text-white dark:hover:bg-orange-600 duration-150 transition-colors"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
          </button>
          <button
            type="button"
            @click.stop="confirmDeleteOLT(item)"
            title="Eliminar OLT"
            class="p-1.5 rounded-lg text-red-500 hover:bg-red-500 hover:text-white dark:hover:bg-red-600 duration-150 transition-colors"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
              <path d="M10 12V17" />
              <path d="M14 12V17" />
              <path d="M4 7H20" />
              <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" />
              <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Create Dialog Modal -->
    <DialogModal :show="openCreate" maxWidth="xl" @close="openCreate = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">REGISTRAR OLT</h1>
          <button
            type="button"
            @click="openCreate = false"
            class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="saveOlt" class="w-full grid grid-cols-1 gap-2">
          <div class="w-full">
            <InputLabel value="Descripción" />
            <TextInput v-model="createName" class="w-full block" />
            <InputError :message="createErrors.name" />
          </div>
          <div class="w-full grid lg:grid-cols-2 gap-2">
            <div class="w-full">
              <InputLabel value="N° salidas" />
              <TextInput v-model="createOuts" type="number" min="1" step="1" class="w-full block" />
              <InputError :message="createErrors.outs" />
            </div>
          </div>
          <div class="text-end">
            <PrimaryButton type="submit" :disabled="loading">
              REGISTRAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>

    <!-- Edit Dialog Modal -->
    <DialogModal :show="openEdit" maxWidth="xl" @close="openEdit = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">ACTUALIZAR OLT</h1>
          <button
            type="button"
            @click="openEdit = false"
            class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="updateOlt" class="w-full grid grid-cols-1 gap-2">
          <div class="w-full">
            <InputLabel value="Descripción" />
            <TextInput v-model="editName" class="w-full block" />
            <InputError :message="editErrors.name" />
          </div>
          <div class="w-full grid lg:grid-cols-2 gap-2">
            <div class="w-full">
              <InputLabel value="N° salidas" />
              <TextInput v-model="editOuts" type="number" min="1" step="1" class="w-full block" />
              <InputError :message="editErrors.outs" />
            </div>
          </div>
          <div class="text-end">
            <PrimaryButton type="submit" :disabled="loading">
              ACTUALIZAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>
  </AppLayout>
</template>
