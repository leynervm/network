<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const antenas = ref<any[]>([]);
const loading = ref(false);

// Create modal
const openCreate = ref(false);
const createName = ref('');
const createDireccion = ref('');
const createErrors = ref<Record<string, string>>({});
const isSaving = ref(false);

// Edit modal
const openEdit = ref(false);
const editAntena = ref<any>({ id: 0, name: '', direccion: '' });
const editErrors = ref<Record<string, string>>({});
const isUpdating = ref(false);

async function loadAntenas() {
  loading.value = true;
  try {
    const res = await api.get('/antenas');
    antenas.value = res.data;
  } catch (err: any) {
    console.error('Error cargando antenas:', err);
  } finally {
    loading.value = false;
  }
}

function openCreateModal() {
  createName.value = '';
  createDireccion.value = '';
  createErrors.value = {};
  openCreate.value = true;
}

async function saveAntena() {
  createErrors.value = {};
  if (!createName.value.trim()) {
    createErrors.value.name = 'La descripción es obligatoria.';
    return;
  }

  isSaving.value = true;
  try {
    const res = await api.post('/antenas', {
      name: createName.value.trim(),
      direccion: createDireccion.value.trim(),
    });
    toast(res.data?.message || 'Antena registrada con éxito', 'success');
    openCreate.value = false;
    await loadAntenas();
  } catch (err: any) {
    if (err.response?.status === 422) {
      createErrors.value.name = err.response.data?.message || 'Error de validación.';
    } else {
      toast(err.response?.data?.message || 'Error al guardar antena', 'error');
    }
  } finally {
    isSaving.value = false;
  }
}

function edit(item: any) {
  editAntena.value = { id: item.id, name: item.name, direccion: item.direccion || '' };
  editErrors.value = {};
  openEdit.value = true;
}

async function updateAntena() {
  editErrors.value = {};
  if (!editAntena.value.name.trim()) {
    editErrors.value['antena.name'] = 'La descripción es obligatoria.';
    return;
  }

  isUpdating.value = true;
  try {
    const res = await api.put(`/antenas/${editAntena.value.id}`, {
      name: editAntena.value.name.trim(),
      direccion: editAntena.value.direccion.trim(),
    });
    toast(res.data?.message || 'Antena actualizada con éxito', 'success');
    openEdit.value = false;
    await loadAntenas();
  } catch (err: any) {
    if (err.response?.status === 422) {
      editErrors.value['antena.name'] = err.response.data?.message || 'Error de validación.';
    } else {
      toast(err.response?.data?.message || 'Error al actualizar antena', 'error');
    }
  } finally {
    isUpdating.value = false;
  }
}

async function confirmDeleteAntena(antena_id: number) {
  const result = await confirmDialog(
    'Desea eliminar antena seleccionada ?',
    'El registro dejará de estar disponible en la base de datos.'
  );
  if (result.isConfirmed) {
    try {
      const res = await api.delete(`/antenas/${antena_id}`);
      toast(res.data?.message || 'Antena eliminada con éxito', 'success');
      await loadAntenas();
    } catch (err: any) {
      toast(err.response?.data?.message || 'Error al eliminar antena', 'error');
    }
  }
}

onMounted(loadAntenas);
</script>

<template>
  <AppLayout>
    <template #header>
      {{ 'Gestionar Antenas' }}
    </template>

    <div v-if="auth.hasPermission('admin.antenas.create')">
      <PrimaryButton @click="openCreateModal">REGISTRAR ANTENA</PrimaryButton>

      <DialogModal :show="openCreate" maxWidth="xl" @close="openCreate = false">
        <template #title>
          <div class="flex items-center justify-between w-full">
            <h1 class="font-semibold text-[10px]">REGISTRAR ANTENA</h1>
            <button
              @click="openCreate = false"
              type="button"
              class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </template>

        <template #content>
          <form @submit.prevent="saveAntena" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full">
              <InputLabel value="Descripción" />
              <TextInput class="w-full block" v-model="createName" />
              <InputError :message="createErrors.name" />
            </div>

            <div class="w-full">
              <InputLabel value="Dirección" />
              <TextInput class="w-full block" v-model="createDireccion" />
              <InputError :message="createErrors.direccion" />
            </div>

            <div class="text-end">
              <PrimaryButton type="submit" :disabled="isSaving">
                REGISTRAR
              </PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>

    <div v-if="auth.hasPermission('admin.antenas.index')">
      <div v-if="antenas.length > 0" class="w-full grid grid-cols-[repeat(auto-fill,minmax(150px,1fr))] gap-3 mt-5">
        <div
          v-for="item in antenas"
          :key="item.id"
          class="w-full bg-white dark:bg-neutral-700/80 hover:bg-gray-50/80 dark:hover:bg-neutral-700 border border-gray-200 dark:border-neutral-600/80 rounded-xl shadow-md hover:shadow-lg p-3 flex flex-col justify-between gap-2 transition-all duration-200"
        >
          <span class="w-12 h-12 mx-auto text-gray-700 dark:text-neutral-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="block w-full h-full">
              <path
                d="M20.3068 15.3312C16.7859 18.8521 11.1336 18.908 7.61276 15.3872C4.09192 11.8663 4.14799 6.21408 7.66883 2.69323M20.3068 15.3312C21.9837 13.6543 20.5139 9.46584 17.0241 5.97596C13.5342 2.48608 9.34571 1.01635 7.66883 2.69323M20.3068 15.3312C18.6299 17.0081 14.4414 15.5384 10.9516 12.0485M7.66883 2.69323C5.99196 4.37011 7.46169 8.55859 10.9516 12.0485M10.9516 12.0485L14 9" />
              <path
                d="M6.48804 15L4.75106 17.4884C3.3523 19.4923 2.65291 20.4942 3.17039 21.2471C3.68787 22 5.07589 22 7.85193 22H12.1481C14.9241 22 16.3121 22 16.8296 21.2471C17.301 20.5612 16.7625 19.6686 15.6053 18" />
            </svg>
          </span>
          <h1 class="text-[10px] font-semibold text-center text-gray-800 dark:text-gray-100">{{ item.name }}</h1>
          <p class="text-[10px] leading-3 text-gray-500 dark:text-neutral-300 text-center">{{ item.direccion }}</p>

          <div class="w-full flex justify-end items-center gap-1">
            <button
              v-if="auth.hasPermission('admin.antenas.edit')"
              @click="edit(item)"
              title="Editar"
              class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-4 block mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
            </button>
            
            <button
              v-if="auth.hasPermission('admin.antenas.delete')"
              type="button"
              @click="confirmDeleteAntena(item.id)"
              title="Eliminar"
              class="inline-block p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white duration-150 transition-colors"
            >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="size-4 block mx-auto">
                <path d="M3 6h18" />
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                <line x1="10" x2="10" y1="11" y2="17" />
                <line x1="14" x2="14" y1="11" y2="17" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <DialogModal :show="openEdit" maxWidth="xl" @close="openEdit = false">
        <template #title>
          <div class="flex items-center justify-between w-full">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR ANTENA</h1>
            <button
              @click="openEdit = false"
              type="button"
              class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </template>

        <template #content>
          <form @submit.prevent="updateAntena" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full">
              <InputLabel value="Descripción" />
              <TextInput class="w-full block" v-model="editAntena.name" />
              <InputError :message="editErrors['antena.name']" />
            </div>

            <div class="w-full">
              <InputLabel value="Dirección" />
              <TextInput class="w-full block" v-model="editAntena.direccion" />
              <InputError :message="editErrors['antena.direccion']" />
            </div>

            <div class="text-end">
              <PrimaryButton type="submit" :disabled="isUpdating">
                ACTUALIZAR
              </PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>
  </AppLayout>
</template>
