<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import AppLayout from '../layouts/AppLayout.vue';
import PrimaryButton from '../components/PrimaryButton.vue';
import DangerButton from '../components/DangerButton.vue';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import InputError from '../components/InputError.vue';
import DialogModal from '../components/DialogModal.vue';
import LoadingOverlay from '../components/LoadingOverlay.vue';
import { api } from '../services/api.js';
import { confirmDialog, toast } from '../utils/alerts.js';

const route = useRoute();
const oltId = route.params.id;

const loading = ref(false);
const olt = ref<any>(null);

// Interactive selection state
const sel = ref<number | null>(null); // Selected PON index (0-based)
const hoveredPort = ref<number | null>(null);
const fiberIdx = ref<number | null>(null); // Selected fiber thread index (0-based)

// Modals
const openCreateSpliter = ref(false);
const spliterName = ref('');
const spliterOuts = ref(8);
const spliterAll = ref(false);

const openEditSpliter = ref(false);
const editingSpliter = ref<any>(null);
const editSpliterName = ref('');
const editSpliterDireccion = ref('');
const editSpliterOuts = ref(8);

const openCreateBox = ref(false);
const boxCode = ref('');
const boxName = ref('');
const boxOuts = ref(8);
const boxAll = ref(false);
const targetSpliterId = ref<number | null>(null);
const targetFiberIndex = ref<number | null>(null);

const openEditBox = ref(false);
const editingBox = ref<any>(null);
const editBoxName = ref('');
const editBoxCode = ref('');
const editBoxOuts = ref(8);

const openCreatePort = ref(false);
const targetBoxId = ref<number | null>(null);
const newPortCode = ref('');

const openEditPortModal = ref(false);
const portType = ref<'olt' | 'spliter' | 'boxnav'>('boxnav');
const editingPortId = ref<number | null>(null);
const editingAlias = ref('');
const editingDireccion = ref('');

async function loadOlt() {
  try {
    loading.value = true;
    const res = await api.get(`/olts/${oltId}`);
    olt.value = res.data;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
}

function pickPon(i: number) {
  sel.value = sel.value === i ? null : i;
  fiberIdx.value = null;
}

const currentSpliter = computed(() => {
  if (sel.value === null || !olt.value || !olt.value.spliters) return null;
  return olt.value.spliters[sel.value] || null;
});

const currentBoxnav = computed(() => {
  if (fiberIdx.value === null || !currentSpliter.value || !currentSpliter.value.boxnavs) return null;
  return currentSpliter.value.boxnavs.find((b: any) => Number(b.splitter_port) === Number(fiberIdx.value) + 1) || null;
});

// Splitter CRUD
async function saveSpliter() {
  if (!spliterName.value.trim() && !spliterAll.value) {
    toast('Descripción es obligatoria', 'warning');
    return;
  }
  try {
    loading.value = true;
    await api.post('/spliters', {
      olt_id: oltId,
      name: spliterName.value.trim().toUpperCase() || `SPLITTER-${(olt.value?.spliters?.length || 0) + 1}`,
      outs: spliterOuts.value,
    });
    toast('Splitter registrado con éxito', 'success');
    openCreateSpliter.value = false;
    spliterName.value = '';
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar splitter', 'error');
  } finally {
    loading.value = false;
  }
}

function openEditSpliterModal(spliter: any) {
  editingSpliter.value = spliter;
  editSpliterName.value = spliter.name;
  editSpliterDireccion.value = spliter.direccion || '';
  editSpliterOuts.value = spliter.outs;
  openEditSpliter.value = true;
}

async function updateSpliter() {
  if (!editingSpliter.value) return;
  try {
    loading.value = true;
    await api.put(`/spliters/${editingSpliter.value.id}`, {
      name: editSpliterName.value.trim().toUpperCase(),
      direccion: editSpliterDireccion.value.trim().toUpperCase(),
      outs: editSpliterOuts.value,
    });
    toast('Splitter actualizado con éxito', 'success');
    openEditSpliter.value = false;
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar', 'error');
  } finally {
    loading.value = false;
  }
}

async function deleteSpliter(spliter: any) {
  const confirm = await confirmDialog(
    `¿Desea eliminar splitter ${spliter.name}?`,
    'Se eliminarán también las cajas NAP y puertos vinculados.',
    'question'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/spliters/${spliter.id}`);
    toast('Splitter eliminado', 'success');
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar', 'error');
  } finally {
    loading.value = false;
  }
}

// Boxnav CRUD
function addBoxnav(spliterId: number, fiberIndex: number | null) {
  targetSpliterId.value = spliterId;
  targetFiberIndex.value = fiberIndex !== null ? fiberIndex + 1 : 1;
  boxCode.value = `NAP-${targetFiberIndex.value}`;
  boxName.value = `CAJA NAP ${targetFiberIndex.value}`;
  boxOuts.value = 8;
  openCreateBox.value = true;
}

async function saveBoxnav() {
  if (!targetSpliterId.value) return;
  try {
    loading.value = true;
    await api.post('/boxnavs', {
      spliter_id: targetSpliterId.value,
      splitter_port: targetFiberIndex.value,
      name: boxName.value.trim().toUpperCase(),
      outs: boxOuts.value,
    });
    toast('Caja NAP registrada', 'success');
    openCreateBox.value = false;
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al guardar caja NAP', 'error');
  } finally {
    loading.value = false;
  }
}

function editBox(box: any) {
  editingBox.value = box;
  editBoxName.value = box.name;
  editBoxCode.value = box.name;
  editBoxOuts.value = box.outs;
  openEditBox.value = true;
}

async function updateBox() {
  if (!editingBox.value) return;
  try {
    loading.value = true;
    await api.put(`/boxnavs/${editingBox.value.id}`, {
      name: editBoxName.value.trim().toUpperCase(),
      outs: editBoxOuts.value,
    });
    toast('Caja NAP actualizada', 'success');
    openEditBox.value = false;
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar', 'error');
  } finally {
    loading.value = false;
  }
}

async function deleteBox(boxId: number) {
  const confirm = await confirmDialog(
    'Desea eliminar caja nap seleccionado ?',
    'El registro dejará de estar disponible en la base de datos, incluyendo sus registros vinculados.',
    'question'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/boxnavs/${boxId}`);
    toast('Caja NAP eliminada', 'success');
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar', 'error');
  } finally {
    loading.value = false;
  }
}

// Ports handling
function openModalPort(boxId: number) {
  targetBoxId.value = boxId;
  newPortCode.value = `P-${Date.now().toString().slice(-4)}`;
  openCreatePort.value = true;
}

async function savePort() {
  if (!targetBoxId.value) return;
  try {
    loading.value = true;
    await api.post('/boxnavs/ports', {
      boxnav_id: targetBoxId.value,
      code: newPortCode.value.trim().toUpperCase(),
    });
    toast('Puerto creado', 'success');
    openCreatePort.value = false;
    await loadOlt();
  } catch (err: any) {
    // Alternatively auto reload
    await loadOlt();
    openCreatePort.value = false;
  } finally {
    loading.value = false;
  }
}

function editPortboxnav(port: any) {
  portType.value = 'boxnav';
  editingPortId.value = port.id;
  editingAlias.value = port.alias || '';
  editingDireccion.value = port.direccion || '';
  openEditPortModal.value = true;
}

async function savePortDetails() {
  if (!editingPortId.value) return;
  try {
    loading.value = true;
    await api.put(`/boxnavs/ports/${editingPortId.value}`, {
      alias: editingAlias.value.trim().toUpperCase(),
      direccion: editingDireccion.value.trim().toUpperCase(),
    });
    toast('Detalles de puerto guardados', 'success');
    openEditPortModal.value = false;
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al actualizar puerto', 'error');
  } finally {
    loading.value = false;
  }
}

async function deletePortbox(portId: number) {
  const confirm = await confirmDialog(
    '¿Eliminar puerto?',
    'Se desvinculará cualquier conexión activa en este puerto.',
    'warning'
  );
  if (!confirm) return;

  try {
    loading.value = true;
    await api.delete(`/boxnavs/ports/${portId}`);
    toast('Puerto eliminado', 'success');
    await loadOlt();
  } catch (err: any) {
    toast(err.response?.data?.message || 'Error al eliminar puerto', 'error');
  } finally {
    loading.value = false;
  }
}

onMounted(loadOlt);
</script>

<template>
  <AppLayout :title="olt ? olt.name : 'Cargando OLT...'">
    <LoadingOverlay :show="loading" />

    <div v-if="olt">
      <!-- OLT RACK CHASSIS (Theme Adaptive) -->
      <div class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200 overflow-hidden mb-6">
        <!-- Faceplate -->
        <div class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0"></div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 shrink-0 text-gray-600 dark:text-gray-300">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
            </svg>
            <span class="text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300">
              {{ olt.name }}
            </span>
            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-green-500/10 dark:bg-green-950/50 border border-green-500/30 text-green-600 dark:text-green-400">
              <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
              {{ olt.outs }} PORTS
            </span>
          </div>
          <div class="flex items-center gap-2">
            <span class="text-[7px] text-gray-500 dark:text-neutral-700 tracking-widest hidden sm:block">OLT·RACK·1U</span>
            <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(57,216,115,.8)]"></div>
            <div class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0"></div>
          </div>
        </div>

        <!-- Ports Panel -->
        <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200">
          <div class="text-[8px] text-gray-400 dark:text-neutral-600 tracking-widest mb-1 uppercase flex items-center justify-between flex-wrap gap-2">
            <div>
              // PON INTERFACES ──
              <span class="text-gray-500 dark:text-neutral-500">
                {{ sel !== null ? `PUERTO PON ${sel + 1} SELECCIONADO` : 'SELECCIONA UN PUERTO' }}
              </span>
              <span v-if="sel !== null && olt.spliters && olt.spliters[sel]" class="text-blue-600 dark:text-blue-400 font-bold ml-2">
                [ {{ olt.spliters[sel].name }} ]
                <span v-if="olt.spliters[sel].direccion" class="text-gray-400 dark:text-neutral-500 font-normal ml-1">
                  - {{ olt.spliters[sel].direccion }}
                </span>
              </span>
            </div>
          </div>

          <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
            <div
              v-for="p in olt.outs"
              :key="p"
              @click="pickPon(p - 1)"
              @mouseenter="hoveredPort = p"
              @mouseleave="hoveredPort = null"
              class="pon-card rounded-lg relative group overflow-hidden"
              :class="{
                'selected': sel === p - 1,
                'hovered-card-state': hoveredPort === p
              }"
            >
              <span
                class="port-title-meta truncate w-full block text-center px-1"
                :title="olt.spliters && olt.spliters[p - 1] ? olt.spliters[p - 1].name : `PON-${String(p).padStart(2, '0')}`"
              >
                {{ olt.spliters && olt.spliters[p - 1] ? olt.spliters[p - 1].name : `PON-${String(p).padStart(2, '0')}` }}
              </span>
              <div class="jack-hardware-plate mt-0.5">
                <div class="hardware-jack-cavity">
                  <div class="jack-gold-pins"></div>
                </div>
                <div class="jack-status-led" :class="{ 'led-blink-active': sel === p - 1 }"></div>
              </div>
              <span class="font-mono text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold">
                {{ sel === p - 1 ? 'ACT' : 'IDL' }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Button Registrar Splitter -->
      <div v-if="olt.outs - (olt.spliters?.length || 0) > 0" class="mb-4">
        <PrimaryButton @click="openCreateSpliter = true">
          REGISTRAR SPLITER
        </PrimaryButton>
      </div>

      <!-- Section Divider -->
      <div class="flex items-center gap-3 my-5 font-mono text-[8px] font-bold tracking-[.15em] uppercase text-gray-400 dark:text-neutral-500 transition-colors duration-200">
        <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
        <span>SPLITTERS PLC · CAJAS NAP</span>
        <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
      </div>

      <!-- SPLITTER SECTION -->
      <div v-if="sel === null" class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-300 dark:border-[#2a2e3a] rounded-xl p-7 text-center text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200">
        [ SELECCIONA UN PUERTO PON PARA VER SU SPLITTER ]
      </div>

      <div v-else-if="currentSpliter">
        <!-- Splitter Chassis (Theme Adaptive) -->
        <div class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200 overflow-hidden mb-4">
          <!-- Faceplate -->
          <div class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
            <div class="flex items-center gap-2 flex-wrap">
              <div class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0"></div>
              <span class="text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300">
                {{ currentSpliter.name }}
              </span>
              <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-green-50 dark:bg-[#f0c94a]/10 border border-green-200 dark:border-[#f0c94a]/30 text-green-600 dark:text-green-400 transition-colors duration-200">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                PLC 1:{{ currentSpliter.outs }}
              </span>
              <span v-if="currentSpliter.direccion" class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-blue-50 dark:bg-blue-950/40 border border-blue-200 dark:border-blue-800/40 text-blue-600 dark:text-blue-400 transition-colors duration-200">
                {{ currentSpliter.direccion }}
              </span>
            </div>

            <div class="flex items-center gap-1.5 flex-wrap">
              <button
                v-if="(currentSpliter.boxnavs?.length || 0) < currentSpliter.outs"
                @click="addBoxnav(currentSpliter.id, fiberIdx)"
                class="px-2 py-1 rounded text-[9px] font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors"
              >
                + NAP
              </button>
              <button
                @click="openEditSpliterModal(currentSpliter)"
                class="p-1.5 rounded bg-white dark:bg-neutral-800/80 border border-gray-300 dark:border-neutral-700 text-[#f0a54a] hover:bg-gray-100 dark:hover:bg-neutral-750 transition-colors"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
              </button>
              <button
                @click="deleteSpliter(currentSpliter)"
                class="p-1.5 rounded bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-900/50 text-[#e63946] hover:bg-red-100 dark:hover:bg-red-950/50 transition-colors"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                  <path d="M10 12V17" /><path d="M14 12V17" /><path d="M4 7H20" /><path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" /><path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Rail -->
          <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200">
            <div class="text-[8px] text-gray-400 dark:text-neutral-600 tracking-widest mb-3 uppercase flex items-center justify-between flex-wrap gap-2">
              <div>
                // HILOS DE FIBRA ──
                <span class="text-gray-500 dark:text-neutral-500">
                  {{ fiberIdx !== null ? `HILO ${fiberIdx + 1} SELECCIONADO` : 'SELECCIONA UN HILO' }}
                </span>
              </div>
            </div>

            <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
              <div
                v-for="f in currentSpliter.outs"
                :key="f"
                @click="fiberIdx = fiberIdx === f - 1 ? null : f - 1"
                class="splitter-port rounded-lg relative group overflow-hidden"
                :class="{
                  'selected': fiberIdx === f - 1
                }"
              >
                <span class="port-title-meta truncate w-full block text-center px-1">
                  {{
                    currentSpliter.boxnavs?.find((b: any) => Number(b.splitter_port) === f)?.name ||
                    `H-${String(f).padStart(2, '0')}`
                  }}
                </span>
                <div class="jack-hardware-plate mt-0.5">
                  <div class="hardware-jack-cavity">
                    <div class="jack-gold-pins"></div>
                  </div>
                  <div
                    class="jack-status-led"
                    :class="{
                      'led-blink-active': fiberIdx === f - 1 || currentSpliter.boxnavs?.some((b: any) => Number(b.splitter_port) === f)
                    }"
                  ></div>
                </div>
                <span class="text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold">
                  {{ currentSpliter.boxnavs?.some((b: any) => Number(b.splitter_port) === f) ? 'NAP' : 'LIB' }}
                </span>
              </div>
            </div>
          </div>

          <div class="flex items-center px-4 py-2 border-t border-gray-200 dark:border-[#2a2e3a]/40 bg-gray-100 dark:bg-neutral-950/40 transition-colors duration-200">
            <span class="text-[7px] text-gray-500 dark:text-neutral-700 tracking-widest uppercase">
              SPLITTER PLC 1:{{ currentSpliter.outs }} · {{ currentSpliter.boxnavs?.length || 0 }} NAP REGISTRADAS
            </span>
          </div>
        </div>

        <!-- NAP BOX SECTION -->
        <div v-if="fiberIdx !== null">
          <!-- Section Divider -->
          <div class="flex items-center gap-3 my-4 text-[8px] font-bold tracking-[.15em] uppercase text-gray-400 dark:text-neutral-500 transition-colors duration-200">
            <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
            <span>CAJA NAP</span>
            <div class="flex-1 h-[1px] bg-gray-300 dark:bg-neutral-800"></div>
          </div>

          <div v-if="currentBoxnav">
            <!-- NAP Box Chassis (Theme Adaptive) -->
            <div class="bg-gradient-to-b from-[#f9fafb] via-[#f3f4f6] to-[#e5e7eb] dark:from-[#1e2229] dark:via-[#13151a] dark:to-[#1a1d24] border-2 border-gray-300 dark:border-[#2a2e3a] rounded-[14px] shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.7)] transition-all duration-200">
              <!-- Faceplate -->
              <div class="bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 dark:from-[#0f1114] dark:via-[#1a1d24] dark:to-[#0f1114] rounded-t-[12px] relative flex items-center justify-between gap-3 flex-wrap px-4 py-2.5 transition-colors duration-200">
                <div class="flex items-center gap-2">
                  <div class="w-2 h-2 rounded-full bg-gradient-to-br from-[#e5e7eb] to-[#9ca3af] dark:from-[#9aa3b0] dark:to-[#4b5563] shadow-[0_1px_2px_rgba(0,0,0,0.2)] dark:shadow-[0_1px_2px_rgba(0,0,0,0.6)] shrink-0"></div>
                  <span class="text-[11px] font-black tracking-widest uppercase text-gray-600 dark:text-gray-300">
                    {{ currentBoxnav.name }}
                  </span>
                  <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-[.08em] uppercase bg-emerald-50 dark:bg-[#39d873]/10 border border-emerald-200 dark:border-[#39d873]/30 text-emerald-600 dark:text-[#39d873] transition-colors duration-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#39d873] animate-pulse"></span>
                    {{ currentBoxnav.outs }} PUERTOS
                  </span>
                </div>

                <div class="flex items-center gap-1.5 flex-wrap">
                  <button
                    v-if="(currentBoxnav.portboxnavs?.length || 0) < currentBoxnav.outs"
                    @click="openModalPort(currentBoxnav.id)"
                    class="px-2 py-1 rounded text-[9px] font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors"
                  >
                    + PUERTO
                  </button>
                  <button
                    @click="editBox(currentBoxnav)"
                    class="p-1.5 rounded bg-white dark:bg-neutral-800/80 border border-gray-300 dark:border-neutral-700 text-[#f0a54a] hover:bg-gray-100 dark:hover:bg-neutral-750 transition-colors"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                  </button>
                  <button
                    @click="deleteBox(currentBoxnav.id)"
                    class="p-1.5 rounded bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-900/50 text-[#e63946] hover:bg-red-100 dark:hover:bg-red-950/50 transition-colors"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                      <path d="M10 12V17" /><path d="M14 12V17" /><path d="M4 7H20" /><path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" /><path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Rail with RJ45 ports -->
              <div class="bg-gray-50 dark:bg-[#0d0f12] p-2 transition-colors duration-200">
                <div class="grid grid-cols-[repeat(auto-fill,minmax(72px,1fr))] gap-1">
                  <div
                    v-for="port in currentBoxnav.portboxnavs || []"
                    :key="port.id"
                    class="relative group"
                  >
                    <div
                      class="rj45-jack rounded-lg relative group overflow-hidden"
                      :class="{ 'connected': port.network }"
                    >
                      <span class="port-title-meta truncate w-full block text-center px-1" :title="port.alias || port.code">
                        {{ port.alias || port.code }}
                      </span>
                      <div class="jack-hardware-plate mt-0.5">
                        <div class="hardware-jack-cavity">
                          <div class="jack-gold-pins"></div>
                        </div>
                        <div class="jack-status-led"></div>
                      </div>
                      <span class="text-[9px] mt-1 text-gray-500 dark:text-gray-400 font-bold">
                        {{ port.network ? 'ACT' : 'LIB' }}
                      </span>

                      <!-- Slide-up Edit Button -->
                      <button
                        type="button"
                        @click.stop="editPortboxnav(port)"
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-200 ease-out w-[90%] py-1 rounded-md bg-white dark:bg-neutral-900 border border-orange-500/40 dark:border-orange-500/30 shadow-sm text-center flex items-center justify-center text-orange-600 dark:text-orange-400 opacity-0 group-hover:opacity-100 group-hover:translate-y-[-4px] cursor-pointer z-20"
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                      </button>
                    </div>

                    <!-- Disconnect Button -->
                    <button
                      type="button"
                      @click="deletePortbox(port.id)"
                      class="absolute top-0 right-0 w-4 h-4 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-[#e63946] text-white text-[8px] font-bold shadow-md hover:bg-red-600 z-10"
                    >
                      ✕
                    </button>

                    <!-- Client Tooltip -->
                    <div
                      v-if="port.network && port.network.client"
                      class="absolute bottom-full mb-2 w-52 p-2 rounded-lg shadow-2xl opacity-0 pointer-events-none group-hover:opacity-100 transition-all z-50 backdrop-blur-md bg-white/95 dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 text-left left-1/2 -translate-x-1/2"
                    >
                      <div class="flex items-center gap-1.5 pb-1 mb-1 border-b border-green-600 dark:border-neutral-600">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-600 animate-ping"></span>
                        <span class="text-[8px] font-bold tracking-wider text-green-600">
                          CLIENTE CONECTADO
                        </span>
                      </div>
                      <p class="font-bold text-xs text-gray-900 dark:text-white truncate">
                        {{ port.network.client.name }}
                      </p>
                      <p class="text-[9px] mt-0.5 text-gray-500 dark:text-gray-400">
                        DOC: <span class="text-gray-900 dark:text-white font-bold">{{ port.network.client.document }}</span>
                      </p>
                      <p v-if="port.network.telefono" class="text-[9px] text-gray-500 dark:text-gray-400">
                        TEL: <span class="text-gray-900 dark:text-white font-bold">{{ port.network.telefono }}</span>
                      </p>
                      <p v-if="port.alias" class="text-[9px] text-gray-500 dark:text-gray-400">
                        ALIAS: <span class="text-gray-900 dark:text-white font-bold">{{ port.alias }}</span>
                      </p>
                      <p v-if="port.direccion" class="text-[9px] text-gray-500 dark:text-gray-400">
                        DIR: <span class="text-gray-900 dark:text-white font-bold">{{ port.direccion }}</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Bottom Rail -->
              <div class="flex items-center px-4 py-2 border-t border-gray-200 dark:border-[#2a2e3a]/40 bg-gray-100 dark:bg-neutral-950/40 rounded-b-[12px] transition-colors duration-200">
                <span class="text-[7px] text-gray-500 dark:text-neutral-700 tracking-widest uppercase">
                  CAJA NAP · {{ currentBoxnav.portboxnavs?.length || 0 }}/{{ currentBoxnav.outs }} PUERTOS OCUPADOS
                </span>
              </div>
            </div>
          </div>

          <!-- Empty Boxnav on hilo -->
          <div v-else class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-350 dark:border-[#2a2e3a] rounded-xl p-7 text-center text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200 flex flex-col items-center justify-center gap-3">
            <span>[ NO HAY CAJA NAP EN ESTE HILO ]</span>
            <button
              v-if="(currentSpliter.boxnavs?.length || 0) < currentSpliter.outs"
              @click="addBoxnav(currentSpliter.id, fiberIdx)"
              class="px-2.5 py-1 rounded text-[9px] font-bold tracking-wider bg-[#39d873]/10 border border-[#39d873]/30 text-[#39d873] hover:bg-[#39d873]/20 transition-colors"
            >
              + REGISTRAR CAJA NAP EN ESTE HILO
            </button>
          </div>
        </div>
      </div>

      <!-- No spliters -->
      <div v-else-if="olt.spliters?.length === 0" class="bg-white dark:bg-[#0d0f12] border border-dashed border-gray-350 dark:border-[#2a2e3a] rounded-xl p-7 text-center text-[10px] text-gray-500 dark:text-[#3a3f4a] tracking-[.12em] transition-colors duration-200">
        [ SIN SPLITTERS REGISTRADOS EN ESTE OLT ]
      </div>

      <!-- CRUD MODALS -->
      <!-- Create Spliter Modal -->
      <DialogModal :show="openCreateSpliter" maxWidth="xl" @close="openCreateSpliter = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">REGISTRAR SPLITER</h1>
            <button @click="openCreateSpliter = false" class="text-gray-500 hover:text-gray-700">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="saveSpliter" class="w-full grid grid-cols-1 gap-2">
            <div v-show="!spliterAll" class="w-full">
              <InputLabel value="Descripción" />
              <TextInput v-model="spliterName" class="w-full block" />
            </div>
            <div class="w-full grid lg:grid-cols-2 gap-2">
              <div class="w-full">
                <InputLabel value="N° salidas" />
                <TextInput v-model="spliterOuts" type="number" min="1" step="1" class="w-full block" />
              </div>
            </div>
            <div>
              <label class="inline-flex items-center gap-1">
                <input type="checkbox" v-model="spliterAll" class="rounded border-gray-300" />
                <span class="text-xs">USAR DATOS PARA TODAS LAS SALIDAS</span>
              </label>
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">REGISTRAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Edit Spliter Modal -->
      <DialogModal :show="openEditSpliter" maxWidth="xl" @close="openEditSpliter = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR SPLITER</h1>
            <button @click="openEditSpliter = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="updateSpliter" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full">
              <InputLabel value="Descripción" />
              <TextInput v-model="editSpliterName" class="w-full block" />
            </div>
            <div class="w-full">
              <InputLabel value="Dirección / Ubicación Específica" />
              <textarea
                v-model="editSpliterDireccion"
                rows="3"
                class="border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 rounded-lg shadow-sm w-full block text-xs"
              ></textarea>
            </div>
            <div class="w-full">
              <InputLabel value="N° salidas" />
              <TextInput v-model="editSpliterOuts" type="number" min="1" step="1" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">ACTUALIZAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Create Boxnav Modal -->
      <DialogModal :show="openCreateBox" maxWidth="xl" @close="openCreateBox = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">REGISTRAR CAJA NAP</h1>
            <button @click="openCreateBox = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="saveBoxnav" class="w-full grid grid-cols-1 gap-2">
            <div v-show="!boxAll" class="w-full">
              <InputLabel value="Código" />
              <TextInput v-model="boxCode" maxlength="12" class="w-full block" />
            </div>
            <div v-show="!boxAll" class="w-full">
              <InputLabel value="Nombre / Dirección de CAJA NAP" />
              <TextInput v-model="boxName" class="w-full block" />
            </div>
            <div class="w-full">
              <InputLabel value="Puertos" />
              <TextInput v-model="boxOuts" type="number" min="1" step="1" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">REGISTRAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Edit Boxnav Modal -->
      <DialogModal :show="openEditBox" maxWidth="xl" @close="openEditBox = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">ACTUALIZAR CAJA NAP</h1>
            <button @click="openEditBox = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="updateBox" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full">
              <InputLabel value="Nombre / Dirección de CAJA NAP" />
              <TextInput v-model="editBoxName" class="w-full block" />
            </div>
            <div class="w-full">
              <InputLabel value="Puertos" />
              <TextInput v-model="editBoxOuts" type="number" min="1" step="1" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">ACTUALIZAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Create Port Modal -->
      <DialogModal :show="openCreatePort" maxWidth="xl" @close="openCreatePort = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px]">REGISTRAR PUERTO NAP</h1>
            <button @click="openCreatePort = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="savePort" class="w-full grid grid-cols-1 gap-2">
            <div class="w-full">
              <InputLabel value="Código Puerto" />
              <TextInput v-model="newPortCode" maxlength="12" class="w-full block" />
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">REGISTRAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>

      <!-- Edit Port Details Modal -->
      <DialogModal :show="openEditPortModal" maxWidth="xl" @close="openEditPortModal = false">
        <template #title>
          <div class="w-full flex items-center justify-between">
            <h1 class="font-semibold text-[10px] uppercase">
              EDITAR DETALLES DE PUERTO / HILO
              <span class="text-blue-500">CAJA NAP</span>
            </h1>
            <button @click="openEditPortModal = false" class="text-gray-500">✕</button>
          </div>
        </template>
        <template #content>
          <form @submit.prevent="savePortDetails" class="w-full grid grid-cols-1 gap-3">
            <div class="w-full">
              <InputLabel value="Alias / Nombre" />
              <TextInput v-model="editingAlias" placeholder="Ej. TRONCAL PRINCIPAL A" class="w-full block" />
            </div>
            <div class="w-full">
              <InputLabel value="Dirección / Ubicación Específica" />
              <textarea
                v-model="editingDireccion"
                placeholder="Ej. POSTE 4, ESQUINA AV. BRASIL"
                rows="3"
                class="border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 rounded-lg shadow-sm w-full block text-xs"
              ></textarea>
            </div>
            <div class="text-end">
              <PrimaryButton type="submit" :disabled="loading">GUARDAR</PrimaryButton>
            </div>
          </form>
        </template>
      </DialogModal>
    </div>
  </AppLayout>
</template>
