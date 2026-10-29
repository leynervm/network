<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
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

const router = useRouter();

const loading = ref(false);
const products = ref<any[]>([]);
const marcas = ref<any[]>([]);

// Filters
const search = ref('');
const searchmarca = ref('');

// Create Product Modal
const openCreate = ref(false);
const openmarca = ref(false);
const imagePreview = ref<string | null>(null);
const createName = ref('');
const createModelo = ref('');
const createMarcaId = ref<number | string>('');
const newMarcaName = ref('');
const createMac = ref('');
const createIp = ref('');
const createPricebuy = ref('');
const createStock = ref('');
const errors = ref<Record<string, string>>({});

// Edit Product Modal
const openEdit = ref(false);
const editingProduct = ref<any>(null);
const editName = ref('');
const editModelo = ref('');
const editMarcaId = ref<number | string>('');
const editMac = ref('');
const editIp = ref('');
const editPricebuy = ref('');
const editStock = ref('');

async function loadProducts() {
  try {
    loading.value = true;
    const res = await api.get('/products', {
      params: {
        search: search.value,
        marca_id: searchmarca.value || undefined,
      },
    });
    products.value = res.data || [];
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

async function loadMarcas() {
  try {
    const res = await api.get('/marcas');
    marcas.value = res.data || [];
  } catch (err) {
    console.error(err);
  }
}

watch([search, searchmarca], () => {
  loadProducts();
});

function handleFileChange(e: Event) {
  const file = (e.target as HTMLInputElement).files?.[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (evt) => {
      imagePreview.value = evt.target?.result as string;
    };
    reader.readAsDataURL(file);
  }
}

function resetImage() {
  imagePreview.value = null;
}

async function saveMarcaInline() {
  if (!newMarcaName.value.trim()) return;
  try {
    loading.value = true;
    const res = await api.post('/marcas', { name: newMarcaName.value.trim().toUpperCase() });
    toast('Marca registrada', 'success');
    await loadMarcas();
    createMarcaId.value = res.data.data?.id || res.data.id;
    newMarcaName.value = '';
    openmarca.value = false;
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar marca', 'error');
  } finally {
    loading.value = false;
  }
}

async function saveProduct() {
  errors.value = {};
  if (!createName.value.trim()) {
    errors.value.name = 'El nombre es obligatorio';
    return;
  }
  try {
    loading.value = true;
    await api.post('/products', {
      name: createName.value.trim().toUpperCase(),
      modelo: createModelo.value ? createModelo.value.trim().toUpperCase() : null,
      marca_id: createMarcaId.value || null,
      mac: createMac.value ? createMac.value.trim() : null,
      ip: createIp.value ? createIp.value.trim() : null,
      pricebuy: parseFloat(createPricebuy.value) || 0,
      stock: parseFloat(createStock.value) || 0,
      image: imagePreview.value || null,
    });
    toast('Producto registrado con éxito', 'success');
    openCreate.value = false;
    createName.value = '';
    createModelo.value = '';
    createMarcaId.value = '';
    createMac.value = '';
    createPricebuy.value = '';
    createStock.value = '';
    imagePreview.value = null;
    await loadProducts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar producto', 'error');
  } finally {
    loading.value = false;
  }
}

function edit(item: any) {
  editingProduct.value = item;
  editName.value = item.name;
  editModelo.value = item.modelo || '';
  editMarcaId.value = item.marca_id || '';
  editMac.value = item.mac || '';
  editIp.value = item.ip || '';
  editPricebuy.value = item.pricebuy || '';
  editStock.value = item.stock || '';
  openEdit.value = true;
}

async function updateProduct() {
  if (!editingProduct.value) return;
  try {
    loading.value = true;
    await api.put(`/products/${editingProduct.value.id}`, {
      name: editName.value.trim().toUpperCase(),
      modelo: editModelo.value ? editModelo.value.trim().toUpperCase() : null,
      marca_id: editMarcaId.value || null,
      mac: editMac.value ? editMac.value.trim() : null,
      ip: editIp.value ? editIp.value.trim() : null,
      pricebuy: parseFloat(String(editPricebuy.value)) || 0,
      stock: parseFloat(String(editStock.value)) || 0,
    });
    toast('Producto actualizado', 'success');
    openEdit.value = false;
    await loadProducts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar producto', 'error');
  } finally {
    loading.value = false;
  }
}

async function confirmDeleteProduct(item: any) {
  const confirm = await confirmDialog(`¿Eliminar producto ${item.name}?`, 'Esta acción no se puede deshacer.', 'warning');
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/products/${item.id}`);
    toast('Producto eliminado', 'success');
    await loadProducts();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar', 'error');
  } finally {
    loading.value = false;
  }
}

onMounted(async () => {
  await Promise.all([loadProducts(), loadMarcas()]);
});
</script>

<template>
  <AppLayout title="Gestionar Productos">
    <LoadingOverlay :show="loading" />

    <div class="flex gap-2 justify-start">
      <PrimaryButton @click="openCreate = true; resetImage()">
        REGISTRAR PRODUCTO
      </PrimaryButton>

      <router-link
        to="/admin/marcas"
        class="inline-flex items-center p-1.5 bg-gray-800 border border-transparent rounded-md font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150"
      >
        MARCAS
      </router-link>
    </div>

    <!-- Filters -->
    <div class="mt-3">
      <div class="w-full flex flex-wrap gap-2 mb-2">
        <div class="w-full max-w-sm">
          <InputLabel value="Buscar producto" />
          <TextInput v-model="search" class="w-full block" />
        </div>

        <div v-if="marcas.length > 0" class="w-full max-w-xs">
          <InputLabel value="Filtrar marca" />
          <SelectInput v-model="searchmarca" class="w-full">
            <option value="">SELECCIONAR...</option>
            <option v-for="item in marcas" :key="item.id" :value="item.id">
              {{ item.name }}
            </option>
          </SelectInput>
        </div>
      </div>

      <!-- Table -->
      <div class="w-full">
        <DataTable>
          <template #thead>
            <tr>
              <th>DESCRIPCIÓN PRODUCTO</th>
              <th>MARCA</th>
              <th>DIRECCION IP</th>
              <th>DIRECCION MAC</th>
              <th>PRECIO COMPRA</th>
              <th>STOCK</th>
              <th></th>
            </tr>
          </template>
          <template #tbody>
            <tr v-if="products.length === 0">
              <td colspan="7" class="text-center py-4 text-gray-500">No se encontraron productos.</td>
            </tr>
            <tr v-for="item in products" :key="item.id">
              <td class="flex gap-1">
                <img
                  v-if="item.image"
                  :src="item.image"
                  alt=""
                  class="w-24 h-24 flex-shrink-0 object-cover rounded overflow-hidden"
                />
                <p class="flex-1 w-full">{{ item.name }}</p>
              </td>
              <td class="text-center uppercase w-[100px]">
                {{ item.marca?.name || '-' }}
              </td>
              <td class="text-center">{{ item.ip || '-' }}</td>
              <td class="text-center">{{ item.mac || '-' }}</td>
              <td class="text-center">
                S/. {{ Number(item.pricebuy || 0).toFixed(2) }}
              </td>
              <td class="text-center">
                <p class="block w-full">{{ Number(item.stock || 0).toFixed(0) }} UND</p>
                <span
                  v-if="Number(item.stock || 0) < 1"
                  class="bg-red-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3"
                >
                  AGOTADO
                </span>
                <span
                  v-else
                  class="bg-green-500 inline-block mb-1 text-white text-[10px] p-1 rounded leading-3"
                >
                  DISPONIBLE
                </span>
              </td>
              <td class="text-center">
                <div class="flex items-center justify-center gap-1">
                  <button
                    type="button"
                    @click="edit(item)"
                    title="Editar"
                    class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 block mx-auto">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                  </button>

                  <DangerButton @click="confirmDeleteProduct(item)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                      <path d="M3 6h18" />
                      <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                      <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                      <line x1="10" x2="10" y1="11" y2="17" />
                      <line x1="14" x2="14" y1="11" y2="17" />
                    </svg>
                  </DangerButton>
                </div>
              </td>
            </tr>
          </template>
        </DataTable>
      </div>
    </div>

    <!-- Create Product Modal -->
    <DialogModal :show="openCreate" maxWidth="2xl" @close="openCreate = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">REGISTRAR PRODUCTO</h1>
          <button @click="openCreate = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="saveProduct" class="w-full">
          <div class="w-full relative">
            <div class="w-full text-center">
              <div class="w-full h-60 relative mb-2 shadow-md rounded-xl overflow-hidden bg-gray-50 dark:bg-neutral-900 border border-gray-200 dark:border-neutral-700 flex items-center justify-center">
                <img v-if="imagePreview" :src="imagePreview" class="object-scale-down block w-full h-full" />
                <span v-else class="block w-24 h-24 text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full">
                    <line x1="2" x2="22" y1="2" y2="22" />
                    <path d="M10.41 10.41a2 2 0 1 1-2.83-2.83" />
                    <line x1="13.5" x2="6" y1="13.5" y2="21" />
                    <line x1="18" x2="21" y1="12" y2="15" />
                    <path d="M3.59 3.59A1.99 1.99 0 0 0 3 5v14a2 2 0 0 0 2 2h14c.55 0 1.052-.22 1.41-.59" />
                    <path d="M21 15V5a2 2 0 0 0-2-2H9" />
                  </svg>
                </span>
              </div>

              <div class="w-full flex items-center justify-center gap-2">
                <PrimaryButton v-if="imagePreview" type="button" @click="resetImage">
                  LIMPIAR
                </PrimaryButton>
                <label
                  for="fileInput"
                  class="cursor-pointer text-[10px] inline-flex gap-2 justify-between items-center py-2 px-3 rounded-lg shadow-sm text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 font-semibold tracking-widest"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 7h1a2 2 0 002-2a1 1 0 011-1h6a1 1 0 011 1a2 2 0 002 2h1a2 2 0 012 2v9a2 2 0 01-2 2h-14a2 2 0 01-2-2v-9a2 2 0 012-2z" />
                    <circle cx="12" cy="13" r="3" />
                  </svg>
                  SELECCIONAR IMAGEN
                </label>
                <input id="fileInput" accept="image/*" class="hidden" type="file" @change="handleFileChange" />
              </div>
            </div>
          </div>

          <div class="mt-2">
            <InputLabel value="Nombre / Descripción :" />
            <TextInput v-model="createName" placeholder="Ingrese nombre / descripción..." class="block w-full" />
            <InputError :message="errors.name" />
          </div>

          <div class="w-full mt-2 grid grid-cols-2 gap-2">
            <div>
              <InputLabel value="Modelo :" />
              <TextInput v-model="createModelo" class="block w-full" />
            </div>

            <div>
              <InputLabel value="Marca :" />
              <div class="flex items-start gap-1">
                <SelectInput v-model="createMarcaId" class="flex-1">
                  <option value="">SELECCIONAR MARCA</option>
                  <option v-for="item in marcas" :key="item.id" :value="item.id">
                    {{ item.name }}
                  </option>
                </SelectInput>
                <PrimaryButton type="button" @click="openmarca = !openmarca" class="flex-shrink-0 p-2 h-full">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4">
                    <path d="M5 12h14" /><path d="M12 5v14" />
                  </svg>
                </PrimaryButton>
              </div>
            </div>

            <div v-show="openmarca" class="col-span-2">
              <InputLabel value="Nueva Marca :" />
              <div class="flex items-start gap-1">
                <TextInput v-model="newMarcaName" placeholder="Ingrese nombre de marca..." class="block w-full" />
                <PrimaryButton type="button" @click="saveMarcaInline" class="flex-shrink-0 p-2.5 h-full">
                  GUARDAR MARCA
                </PrimaryButton>
              </div>
            </div>

            <div>
              <InputLabel value="Dirección MAC :" />
              <TextInput v-model="createMac" placeholder="aa:aa:aa:aa" class="block w-full" />
            </div>

            <div>
              <InputLabel value="Dirección IP :" />
              <TextInput v-model="createIp" placeholder="0.0.0.0" class="block w-full" />
            </div>

            <div>
              <InputLabel value="Precio compra :" />
              <TextInput v-model="createPricebuy" placeholder="0.00" class="block w-full" />
            </div>

            <div>
              <InputLabel value="Stock :" />
              <TextInput v-model="createStock" placeholder="0.00" class="block w-full" />
            </div>
          </div>

          <div class="w-full flex pt-4 justify-end">
            <PrimaryButton type="submit" :disabled="loading">
              REGISTRAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>

    <!-- Edit Product Modal -->
    <DialogModal :show="openEdit" maxWidth="xl" @close="openEdit = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">ACTUALIZAR PRODUCTO</h1>
          <button @click="openEdit = false" class="text-gray-500">✕</button>
        </div>
      </template>
      <template #content>
        <form @submit.prevent="updateProduct" class="w-full grid grid-cols-1 gap-2">
          <div>
            <InputLabel value="Nombre / Descripción :" />
            <TextInput v-model="editName" class="block w-full" />
          </div>
          <div class="grid grid-cols-2 gap-2">
            <div>
              <InputLabel value="Modelo :" />
              <TextInput v-model="editModelo" class="block w-full" />
            </div>
            <div>
              <InputLabel value="Marca :" />
              <SelectInput v-model="editMarcaId" class="w-full">
                <option value="">SELECCIONAR MARCA</option>
                <option v-for="item in marcas" :key="item.id" :value="item.id">
                  {{ item.name }}
                </option>
              </SelectInput>
            </div>
            <div>
              <InputLabel value="Dirección MAC :" />
              <TextInput v-model="editMac" class="block w-full" />
            </div>
            <div>
              <InputLabel value="Dirección IP :" />
              <TextInput v-model="editIp" class="block w-full" />
            </div>
            <div>
              <InputLabel value="Precio compra :" />
              <TextInput v-model="editPricebuy" class="block w-full" />
            </div>
            <div>
              <InputLabel value="Stock :" />
              <TextInput v-model="editStock" class="block w-full" />
            </div>
          </div>
          <div class="text-end pt-3">
            <PrimaryButton type="submit" :disabled="loading">
              ACTUALIZAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>
  </AppLayout>
</template>
