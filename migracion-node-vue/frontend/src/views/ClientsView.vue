<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import DialogModal from '../components/DialogModal.vue';
import { Button } from '@/components/ui/button';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import { Badge } from '@/components/ui/badge';
import {
  Table,
  TableHeader,
  TableBody,
  TableHead,
  TableRow,
  TableCell,
} from '@/components/ui/table';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';
import { useAuthStore } from '../stores/auth.js';

const auth = useAuthStore();
const clients = ref<any[]>([]);
const total = ref(0);
const page = ref(1);
const search = ref('');
const loading = ref(true);

const isModalOpen = ref(false);
const isEditing = ref(false);
const queryingSunat = ref(false);

const form = ref({
  id: 0,
  document: '',
  name: '',
  direccion: '',
  ubigeo_id: null as number | null,
});

async function loadClients() {
  try {
    loading.value = true;
    const res = await api.get('/clients', {
      params: { search: search.value, page: page.value, limit: 15 },
    });
    clients.value = res.data.data;
    total.value = res.data.meta.total;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

// Consulta automática RENIEC / SUNAT al completar 8 u 11 dígitos
async function handleConsultarDocumento() {
  const doc = form.value.document.trim();
  if (doc.length !== 8 && doc.length !== 11) return;

  try {
    queryingSunat.value = true;
    const res = await api.get(`/clients/consulta/${doc}`);
    if (res.data) {
      if (res.data.nombre_o_razon_social) {
        form.value.name = res.data.nombre_o_razon_social;
      }
      if (res.data.direccion_completa) {
        form.value.direccion = res.data.direccion_completa;
      }
      toast('Datos obtenidos de SUNAT/RENIEC con éxito', 'success');
    }
  } catch (err: any) {
    toast(err.response?.data?.message || 'No se pudo consultar el documento', 'error');
  } finally {
    queryingSunat.value = false;
  }
}

function openCreateModal() {
  isEditing.value = false;
  form.value = {
    id: 0,
    document: '',
    name: '',
    direccion: '',
    ubigeo_id: null,
  };
  isModalOpen.value = true;
}

function openEditModal(client: any) {
  isEditing.value = true;
  form.value = {
    id: client.id,
    document: client.document,
    name: client.name,
    direccion: client.direccion || '',
    ubigeo_id: client.ubigeo_id || null,
  };
  isModalOpen.value = true;
}

async function handleSave() {
  if (!form.value.document || !form.value.name) {
    toast('Documento y Nombre son requeridos', 'warning');
    return;
  }

  try {
    if (isEditing.value) {
      await api.put(`/clients/${form.value.id}`, form.value);
      toast('Cliente actualizado con éxito', 'success');
    } else {
      await api.post('/clients', form.value);
      toast('Cliente registrado con éxito', 'success');
    }
    isModalOpen.value = false;
    await loadClients();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar cliente', 'error');
  }
}

async function handleDelete(client: any) {
  const result = await confirmDialog(`¿Eliminar cliente ${client.name}?`, 'El cliente será archivado en la papelera.');
  if (result.isConfirmed) {
    try {
      await api.delete(`/clients/${client.id}`);
      toast('Cliente eliminado', 'success');
      await loadClients();
    } catch (err: any) {
      toast(err.response?.data?.message || 'Error al eliminar cliente', 'error');
    }
  }
}

watch(search, () => {
  page.value = 1;
  loadClients();
});

onMounted(loadClients);
</script>

<template>
  <AppLayout>
    <div class="space-y-4">
      <!-- Header -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-card text-card-foreground p-4 rounded-xl border border-border shadow-sm gap-3">
        <div>
          <h1 class="text-xs font-bold text-foreground uppercase tracking-wider">
            Directorio de Clientes
          </h1>
          <p class="text-[11px] text-muted-foreground">
            Total registrados: {{ total }} clientes con contrato de servicio.
          </p>
        </div>

        <div class="flex items-center gap-2">
          <TextInput
            v-model="search"
            type="text"
            placeholder="Buscar por DNI o Nombre..."
            class="w-56"
          />
          <Button
            v-if="auth.hasPermission('admin.clients.create')"
            @click="openCreateModal"
            class="h-9 px-3 text-xs font-bold uppercase tracking-wider gap-1.5"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            NUEVO CLIENTE
          </Button>
        </div>
      </div>

      <!-- Clients Table -->
      <div class="bg-card text-card-foreground rounded-xl border border-border shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
          <Table class="w-full text-left text-xs">
            <TableHeader>
              <TableRow class="bg-muted/50 border-b border-border">
                <TableHead class="py-2.5 px-3 font-semibold uppercase">Documento</TableHead>
                <TableHead class="py-2.5 px-3 font-semibold uppercase">Nombre / Razón Social</TableHead>
                <TableHead class="py-2.5 px-3 font-semibold uppercase">Dirección</TableHead>
                <TableHead class="py-2.5 px-3 text-center font-semibold uppercase">Conexiones</TableHead>
                <TableHead class="py-2.5 px-3 text-right font-semibold uppercase">Acciones</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              <TableRow v-if="loading">
                <TableCell colspan="5" class="text-center py-6 text-muted-foreground">
                  Cargando clientes...
                </TableCell>
              </TableRow>
              <TableRow v-else-if="clients.length === 0">
                <TableCell colspan="5" class="text-center py-6 text-muted-foreground">
                  No se encontraron clientes registrados.
                </TableCell>
              </TableRow>
              <TableRow v-for="client in clients" :key="client.id" class="hover:bg-muted/50 transition-colors">
                <TableCell class="py-2.5 px-3 font-mono font-bold">{{ client.document }}</TableCell>
                <TableCell class="py-2.5 px-3 font-semibold">{{ client.name }}</TableCell>
                <TableCell class="py-2.5 px-3 text-muted-foreground">{{ client.direccion || '---' }}</TableCell>
                <TableCell class="py-2.5 px-3 text-center">
                  <Badge variant="secondary" class="text-[10px] font-bold">
                    {{ client.networks?.length || 0 }}
                  </Badge>
                </TableCell>
                <TableCell class="py-2.5 px-3 text-right">
                  <div class="inline-flex gap-1">
                    <Button
                      v-if="auth.hasPermission('admin.clients.edit')"
                      @click="openEditModal(client)"
                      variant="ghost"
                      size="sm"
                      class="h-7 w-7 p-0 text-amber-500 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-950/30"
                      title="Editar"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                    </Button>
                    <Button
                      v-if="auth.hasPermission('admin.clients.delete')"
                      @click="handleDelete(client)"
                      variant="ghost"
                      size="sm"
                      class="h-7 w-7 p-0 text-destructive hover:text-destructive hover:bg-destructive/10"
                      title="Eliminar"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </Button>
                  </div>
                </TableCell>
              </TableRow>
            </TableBody>
          </Table>
        </div>
      </div>

      <!-- Modal Cliente -->
      <DialogModal :show="isModalOpen" maxWidth="md" @close="isModalOpen = false">
        <template #title>
          <div class="flex items-center justify-between w-full">
            <h1 class="font-semibold text-xs uppercase">{{ isEditing ? 'ACTUALIZAR CLIENTE' : 'NUEVO CLIENTE' }}</h1>
            <Button
              type="button"
              variant="ghost"
              size="sm"
              @click="isModalOpen = false"
              class="h-7 w-7 p-0 text-muted-foreground"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </Button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="handleSave" class="space-y-3">
            <div>
              <InputLabel value="Documento (DNI / RUC)" />
              <div class="flex gap-2">
                <TextInput
                  v-model="form.document"
                  type="text"
                  required
                  placeholder="Ingrese 8 u 11 dígitos"
                  class="font-mono"
                  @blur="handleConsultarDocumento"
                />
                <Button
                  type="button"
                  variant="secondary"
                  size="sm"
                  @click="handleConsultarDocumento"
                  :disabled="queryingSunat"
                  class="text-xs font-semibold whitespace-nowrap"
                >
                  {{ queryingSunat ? 'Consultando...' : 'Buscar SUNAT' }}
                </Button>
              </div>
            </div>

            <div>
              <InputLabel value="Nombre Completo / Razón Social" />
              <TextInput v-model="form.name" type="text" required class="uppercase" />
            </div>

            <div>
              <InputLabel value="Dirección Fiscal / Domicilio" />
              <TextInput v-model="form.direccion" type="text" class="uppercase" />
            </div>

            <div class="pt-2 flex justify-end gap-2">
              <Button type="button" variant="outline" size="sm" @click="isModalOpen = false" class="text-xs font-semibold">
                CANCELAR
              </Button>
              <Button type="submit" size="sm" class="text-xs font-bold uppercase">
                GUARDAR
              </Button>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>
  </AppLayout>
</template>
