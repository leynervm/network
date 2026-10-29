<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import DialogModal from '../components/DialogModal.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import DangerButton from '../components/DangerButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import { Card, CardTitle } from '@/components/ui/card';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const loading = ref(false);
const marcas = ref<any[]>([]);

// Create Marca Modal
const openCreate = ref(false);
const createName = ref('');
const createErrors = ref<Record<string, string>>({});

// Edit Marca Modal
const openEdit = ref(false);
const editingMarca = ref<any>(null);
const editName = ref('');
const editErrors = ref<Record<string, string>>({});

async function loadMarcas() {
  try {
    loading.value = true;
    const res = await api.get('/marcas');
    marcas.value = res.data || [];
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function saveMarca() {
  createErrors.value = {};
  if (!createName.value.trim()) {
    createErrors.value.name = 'El nombre es obligatorio';
    return;
  }
  try {
    loading.value = true;
    await api.post('/marcas', { name: createName.value.trim().toUpperCase() });
    toast('Marca registrada con éxito', 'success');
    openCreate.value = false;
    createName.value = '';
    await loadMarcas();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar marca', 'error');
  } finally {
    loading.value = false;
  }
}

function edit(item: any) {
  editingMarca.value = item;
  editName.value = item.name;
  editErrors.value = {};
  openEdit.value = true;
}

async function updateMarca() {
  if (!editingMarca.value) return;
  editErrors.value = {};
  if (!editName.value.trim()) {
    editErrors.value.name = 'El nombre es obligatorio';
    return;
  }
  try {
    loading.value = true;
    await api.put(`/marcas/${editingMarca.value.id}`, { name: editName.value.trim().toUpperCase() });
    toast('Marca actualizada', 'success');
    openEdit.value = false;
    await loadMarcas();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar', 'error');
  } finally {
    loading.value = false;
  }
}

async function confirmDeleteMarca(item: any) {
  const confirm = await confirmDialog(
    `Desea eliminar marca, ${item.name} ?`,
    'El registro dejará de estar disponible en la base de datos.',
    'question'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/marcas/${item.id}`);
    toast('Marca eliminada', 'success');
    await loadMarcas();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar', 'error');
  } finally {
    loading.value = false;
  }
}

onMounted(loadMarcas);
</script>

<template>
  <AppLayout title="Gestionar Marcas">
    <LoadingOverlay :show="loading" />

    <div>
      <PrimaryButton @click="openCreate = true">
        REGISTRAR MARCA
      </PrimaryButton>
    </div>

    <!-- Cards Grid -->
    <div v-if="marcas.length > 0" class="w-full flex flex-wrap gap-3 mt-5">
      <Card
        v-for="item in marcas"
        :key="item.id"
        class="w-44 p-3 shadow-sm rounded-xl flex flex-col justify-between border-border bg-card"
      >
        <CardTitle class="text-[11px] font-semibold text-center uppercase tracking-wider truncate">
          {{ item.name }}
        </CardTitle>
        <div class="w-full flex justify-end items-center gap-1 mt-3 pt-2 border-t border-border">
          <PrimaryButton @click="edit(item)">
            EDITAR
          </PrimaryButton>
          <DangerButton @click="confirmDeleteMarca(item)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5">
              <path d="M3 6h18" />
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
              <line x1="10" x2="10" y1="11" y2="17" />
              <line x1="14" x2="14" y1="11" y2="17" />
            </svg>
          </DangerButton>
        </div>
      </Card>
    </div>

    <!-- Create Modal -->
    <DialogModal :show="openCreate" maxWidth="xl" @close="openCreate = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">REGISTRAR MARCA</h1>
          <button @click="openCreate = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="saveMarca" class="w-full grid grid-cols-1 gap-2">
          <div class="w-full">
            <InputLabel value="Nombre" />
            <TextInput v-model="createName" class="w-full block" />
            <InputError :message="createErrors.name" />
          </div>
          <div class="text-end">
            <PrimaryButton type="submit" :disabled="loading">
              REGISTRAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>

    <!-- Edit Modal -->
    <DialogModal :show="openEdit" maxWidth="xl" @close="openEdit = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">ACTUALIZAR MARCA</h1>
          <button @click="openEdit = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="updateMarca" class="w-full grid grid-cols-1 gap-2">
          <div class="w-full">
            <InputLabel value="Descripción" />
            <TextInput v-model="editName" class="w-full block" />
            <InputError :message="editErrors.name" />
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
