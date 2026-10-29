<script setup lang="ts">
import { ref, computed, watch, nextTick, onUnmounted } from 'vue';
import LoadingOverlay from '../../../components/LoadingOverlay.vue';
import DialogModal from '../../../components/DialogModal.vue';
import PrimaryButton from '../../../components/PrimaryButton.vue';
import TextInput from '../../../components/TextInput.vue';
import InputLabel from '../../../components/InputLabel.vue';
import InputError from '../../../components/InputError.vue';
import SelectInput from '../../../components/SelectInput.vue';
import DataTable from '../../../components/DataTable.vue';
import UbigeoSelect from '../../../components/UbigeoSelect.vue';
import { api } from '../../../services/api.js';
import { toast, alert } from '../../../utils/alerts.js';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const emit = defineEmits<{
  (e: 'saved'): void;
}>();

const loading = ref(false);
const open = ref(false);

// Form fields
const client_id = ref<number | null>(null);
const documentValue = ref('');
const name = ref('');
const type = ref('FIBRA'); // Default FIBRA
const olt_id = ref<number | string>('');
const spliter_id = ref<number | string>('');
const boxnav_id = ref<number | string>('');
const portboxnav_id = ref<number | string>('');
const antena_id = ref<number | string>('');
const codigo_slp = ref('');
const telefono = ref('');
const price = ref<number | string>('50.00');
const date = ref(new Date().toISOString().split('T')[0]);
const ubigeo_id = ref<number | string>('');
const direccion = ref('');
const lat = ref('');
const lng = ref('');
const zoom = ref(14);

// Additional equipament
const addequipo = ref(false);
const descripcionequipo = ref('');
const tipoentrega = ref('ALQUILADO');
const priceequipo = ref('0.00');
const mac = ref('');
const equipos = ref<any[]>([]);

// Options lists
const olts = ref<any[]>([]);
const spliters = ref<any[]>([]);
const boxnavs = ref<any[]>([]);
const portboxnavs = ref<any[]>([]);
const antenas = ref<any[]>([]);
const ubigeos = ref<any[]>([]);

// Errors
const errors = ref<Record<string, string>>({});

// Map variables
let map: L.Map | null = null;
let marker: L.Marker | null = null;
const isSearching = ref(false);
const searchQuery = ref('');

const isFibra = computed(() => {
  return type.value === 'FIBRA' || type.value === 'FIBRA+TV' || type.value === 'TV';
});

function toDbType(t: string): string {
  if (t === 'TV') return 'CABLE TELEVISIÓN';
  if (t === 'FIBRA') return 'FIBRA OPTICA';
  if (t === 'FIBRA+TV') return 'FIBRA OPTICA + CABLE TELEVISIÓN';
  if (t === 'SATELITAL') return 'INTERNET SATELITAL';
  return t;
}

async function loadDependencies() {
  try {
    const [oltsRes, antenasRes, ubigeosRes] = await Promise.all([
      api.get('/olts'),
      api.get('/antenas'),
      api.get('/ubigeos'),
    ]);
    olts.value = oltsRes.data || [];
    antenas.value = antenasRes.data || [];
    ubigeos.value = ubigeosRes.data || [];
  } catch (err) {
    console.error(err);
  }
}

// Watchers for cascading dropdowns
watch(olt_id, async (newVal) => {
  spliters.value = [];
  boxnavs.value = [];
  portboxnavs.value = [];
  spliter_id.value = '';
  boxnav_id.value = '';
  portboxnav_id.value = '';
  if (!newVal) return;
  try {
    const res = await api.get(`/spliters?olt_id=${newVal}`);
    spliters.value = res.data || [];
  } catch (err) {
    console.error(err);
  }
});

watch(spliter_id, async (newVal) => {
  boxnavs.value = [];
  portboxnavs.value = [];
  boxnav_id.value = '';
  portboxnav_id.value = '';
  if (!newVal) return;
  try {
    const res = await api.get(`/boxnavs?spliter_id=${newVal}`);
    boxnavs.value = res.data || [];
  } catch (err) {
    console.error(err);
  }
});

watch(boxnav_id, (newVal) => {
  portboxnavs.value = [];
  portboxnav_id.value = '';
  if (!newVal) return;
  const box = boxnavs.value.find((b) => String(b.id) === String(newVal));
  if (box && box.portboxnavs) {
    portboxnavs.value = box.portboxnavs;
  }
});

watch(open, async (isOpen) => {
  if (isOpen) {
    errors.value = {};
    await loadDependencies();
    setTimeout(() => {
      initMap();
    }, 350);
  } else {
    destroyMap();
  }
});

watch(documentValue, () => {
  client_id.value = null;
});

async function buscar() {
  const cleanDoc = documentValue.value ? documentValue.value.replace(/\D/g, '').trim() : '';
  if (!cleanDoc) {
    errors.value.document = 'El número de documento es obligatorio';
    return;
  }
  if (cleanDoc.length !== 8 && cleanDoc.length !== 11) {
    errors.value.document = 'El documento debe tener 8 (DNI) u 11 (RUC) dígitos';
    return;
  }
  errors.value.document = '';

  try {
    loading.value = true;
    const res = await api.get(`/clients/consulta/${cleanDoc}`);
    if (res.data && res.data.success) {
      const clientName = res.data.name || res.data.data?.name || res.data.data?.nombre_o_razon_social || '';
      const clientId = res.data.client_id || res.data.data?.client_id || res.data.data?.id || null;
      const clientDir = res.data.direccion || res.data.data?.direccion || '';
      const clientUbigeo = res.data.ubigeo_id || res.data.data?.ubigeo_id || null;

      name.value = clientName;
      client_id.value = clientId;
      if (clientDir && !direccion.value) direccion.value = clientDir;
      if (clientUbigeo && !ubigeo_id.value) ubigeo_id.value = clientUbigeo;

      toast('Cliente: ' + clientName, 'success');
      errors.value.name = '';
    } else {
      toast(res.data?.mensaje || 'Documento no registrado. Ingrese los nombres manualmente.', 'info');
      client_id.value = null;
    }
  } catch (err: any) {
    const errorMsg = err.response?.data?.mensaje || err.response?.data?.message || 'No se pudo consultar el documento. Ingrese los nombres manualmente.';
    toast(errorMsg, 'warning');
    client_id.value = null;
  } finally {
    loading.value = false;
  }
}

function saveequipament() {
  if (!descripcionequipo.value.trim()) {
    errors.value.descripcionequipo = 'Descripción requerida';
    return;
  }
  equipos.value.push({
    id_equipo: Date.now().toString(),
    descripcionequipo: descripcionequipo.value.trim(),
    tipoentrega: tipoentrega.value,
    priceequipo: priceequipo.value || '0.00',
    mac: mac.value.trim(),
  });
  descripcionequipo.value = '';
  mac.value = '';
  priceequipo.value = '0.00';
  errors.value.descripcionequipo = '';
}

function deleteEquipo(id: string) {
  equipos.value = equipos.value.filter((e) => e.id_equipo !== id);
}

// Leaflet map handling
function initMap() {
  const container = document.getElementById('map-create');
  if (!container) return;

  destroyMap();

  const defaultLat = lat.value ? parseFloat(lat.value) : -12.046374;
  const defaultLng = lng.value ? parseFloat(lng.value) : -77.042793;
  const initialZoom = zoom.value ? parseInt(String(zoom.value), 10) : 14;

  const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap',
  });
  const satellite = L.tileLayer(
    'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
    { maxZoom: 19, attribution: '© Esri' }
  );
  const topo = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    attribution: '© OpenTopoMap',
  });

  map = L.map('map-create', {
    center: [defaultLat, defaultLng],
    zoom: initialZoom,
    layers: [osm],
    attributionControl: false,
  });

  L.control
    .layers({
      Calles: osm,
      Satélite: satellite,
      Relieve: topo,
    })
    .addTo(map);

  const redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
  });

  marker = L.marker([defaultLat, defaultLng], {
    icon: redIcon,
    draggable: true,
  }).addTo(map);

  marker.on('dragend', () => {
    if (marker) {
      const pos = marker.getLatLng();
      lat.value = pos.lat.toString();
      lng.value = pos.lng.toString();
    }
  });

  map.on('click', (e: L.LeafletMouseEvent) => {
    lat.value = e.latlng.lat.toString();
    lng.value = e.latlng.lng.toString();
    if (marker) {
      marker.setLatLng(e.latlng);
    }
  });

  map.on('zoomend', () => {
    if (map) zoom.value = map.getZoom();
  });

  setTimeout(() => {
    if (map) {
      map.invalidateSize();
      if (!lat.value || !lng.value) {
        locateMe();
      }
    }
  }, 100);
}

function destroyMap() {
  if (map) {
    map.off();
    map.remove();
    map = null;
  }
  marker = null;
}

function updateFromInput() {
  const newLat = parseFloat(lat.value);
  const newLng = parseFloat(lng.value);
  if (!isNaN(newLat) && !isNaN(newLng) && map && marker) {
    marker.setLatLng([newLat, newLng]);
    map.setView([newLat, newLng], map.getZoom());
  }
}

async function searchPlace() {
  if (!searchQuery.value.trim()) return;
  try {
    isSearching.value = true;
    const res = await fetch(
      `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(searchQuery.value)}&countrycodes=pe&limit=1`
    );
    const data = await res.json();
    if (data && data.length > 0) {
      const pLat = parseFloat(data[0].lat);
      const pLon = parseFloat(data[0].lon);
      lat.value = pLat.toString();
      lng.value = pLon.toString();
      if (marker && map) {
        marker.setLatLng([pLat, pLon]);
        map.setView([pLat, pLon], 17);
      }
    } else {
      alert('Ubicación no encontrada', 'No se encontraron resultados para la búsqueda.', 'warning');
    }
  } catch (err) {
    console.error(err);
    alert('Error de red', 'Hubo un problema al buscar la ubicación.', 'error');
  } finally {
    isSearching.value = false;
  }
}

function locateMe() {
  if ('geolocation' in navigator) {
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        lat.value = pos.coords.latitude.toString();
        lng.value = pos.coords.longitude.toString();
        if (marker && map) {
          marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
          map.setView([pos.coords.latitude, pos.coords.longitude], 17);
        }
      },
      () => {
        // Ignored or handled gracefully
      },
      { enableHighAccuracy: true, timeout: 5000, maximumAge: 0 }
    );
  }
}

async function save() {
  errors.value = {};
  if (!documentValue.value.trim()) {
    errors.value.document = 'El documento es requerido.';
  }
  if (!name.value.trim()) {
    errors.value.name = 'El nombre del cliente es requerido.';
  }
  if (isFibra.value && !portboxnav_id.value) {
    errors.value.portboxnav_id = 'Debe seleccionar un puerto NAP.';
  }
  if (!isFibra.value && !antena_id.value) {
    errors.value.antena_id = 'Debe seleccionar una antena.';
  }
  if (Object.keys(errors.value).length > 0) return;

  try {
    loading.value = true;

    // 1. Obtener o crear el cliente
    let clientId: number | null = client_id.value;
    const cleanDoc = documentValue.value.replace(/\D/g, '').trim();

    if (!clientId) {
      const clientRes = await api.get(`/clients?search=${cleanDoc}`);
      const found = clientRes.data.data?.find((c: any) => (c.document || '').trim() === cleanDoc);
      if (found) {
        clientId = found.id;
      } else {
        const newClientRes = await api.post('/clients', {
          document: cleanDoc,
          name: name.value.trim().toUpperCase(),
          direccion: direccion.value.trim().toUpperCase(),
          ubigeo_id: ubigeo_id.value || null,
        });
        clientId = newClientRes.data.data?.id || newClientRes.data.id;
      }
    }

    // 2. Guardar Network
    const networkPayload = {
      date: date.value,
      type: toDbType(type.value),
      descripcion: null,
      codigo_slp: codigo_slp.value ? codigo_slp.value.trim() : null,
      telefono: telefono.value ? telefono.value.trim() : null,
      price: price.value || 0,
      direccion: direccion.value ? direccion.value.trim().toUpperCase() : '',
      client_id: clientId,
      ubigeo_id: ubigeo_id.value || null,
      networkable_id: isFibra.value ? portboxnav_id.value : antena_id.value,
      latitude: lat.value ? parseFloat(lat.value) : null,
      longitude: lng.value ? parseFloat(lng.value) : null,
      zoom: zoom.value || 14,
    };

    const netRes = await api.post('/networks', networkPayload);
    const newNetworkId = netRes.data.data.id;

    // 3. Guardar equipos adicionales si existen
    if (addequipo.value && equipos.value.length > 0) {
      for (const eq of equipos.value) {
        await api.post('/equipos', {
          network_id: newNetworkId,
          descripcion: eq.descripcionequipo,
          type: eq.tipoentrega,
          price: parseFloat(eq.priceequipo) || 0,
          mac: eq.mac || null,
        });
      }
    }

    toast('Cliente internet registrado con éxito', 'success');
    open.value = false;
    emit('saved');
  } catch (err: any) {
    console.error(err);
    alert('Error', err.response?.data?.message || 'Error al guardar registro', 'error');
  } finally {
    loading.value = false;
  }
}

onUnmounted(() => {
  destroyMap();
});
</script>

<template>
  <div>
    <!-- Full viewport elegant loading overlay -->
    <LoadingOverlay :show="loading" />

    <PrimaryButton @click="open = true">
      REGISTRAR CLIENTE INTERNET
    </PrimaryButton>

    <DialogModal :show="open" maxWidth="3xl" @close="open = false">
      <template #title>
        <div class="w-full flex items-center justify-between">
          <h1 class="font-semibold text-[10px]">REGISTRAR CLIENTE INTERNET</h1>
          <button
            type="button"
            @click="open = false"
            class="rounded-lg text-gray-700 p-2.5 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </template>

      <template #content>
        <form @submit.prevent="save" class="relative w-full grid grid-cols-1 gap-2">
          <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-3">
            <div class="w-full">
              <InputLabel value="Documento cliente" />
              <div class="w-full flex gap-1">
                <TextInput
                  v-model="documentValue"
                  maxlength="11"
                  @keydown.enter.prevent="buscar"
                  class="w-full flex-1 block"
                />
                <PrimaryButton
                  type="button"
                  @click="buscar"
                  :disabled="loading"
                  class="text-white !px-2 flex-shrink-0 !p-1.5"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 block mx-auto">
                    <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" />
                  </svg>
                </PrimaryButton>
              </div>
              <InputError :message="errors.document" />
            </div>

            <div class="w-full md:col-span-2">
              <InputLabel value="Nombres cliente" />
              <TextInput v-model="name" class="w-full block" />
              <InputError :message="errors.name" />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between mb-1">
              <InputLabel value="Tipo servicio" class="mb-0" />
            </div>
            <div class="w-full flex flex-wrap gap-2 transition-all duration-200">
              <div>
                <input class="hidden peer" type="radio" name="type" v-model="type" id="tv" value="TV" />
                <label
                  for="tv"
                  :class="[
                    'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                    type === 'TV'
                      ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                      : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                  ]"
                >
                  TV
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="type" v-model="type" id="fibra" value="FIBRA" />
                <label
                  for="fibra"
                  :class="[
                    'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                    type === 'FIBRA'
                      ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                      : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                  ]"
                >
                  FIBRA
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="type" v-model="type" id="fibra_tv" value="FIBRA+TV" />
                <label
                  for="fibra_tv"
                  :class="[
                    'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                    type === 'FIBRA+TV'
                      ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                      : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                  ]"
                >
                  FIBRA+TV
                </label>
              </div>
              <div>
                <input class="hidden peer" type="radio" name="type" v-model="type" id="satelital" value="SATELITAL" />
                <label
                  for="satelital"
                  :class="[
                    'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                    type === 'SATELITAL'
                      ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                      : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                  ]"
                >
                  SATELITAL
                </label>
              </div>
            </div>
            <InputError :message="errors.type" />
          </div>

          <div v-if="isFibra" class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 transition-all duration-200">
            <!-- PASO 1: OLT -->
            <div>
              <InputLabel value="1. Seleccionar OLT" class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
              <UbigeoSelect
                v-model="olt_id"
                :options="olts"
                :searchable="false"
                placeholder="SELECCIONAR OLT..."
                class="w-full"
              />
              <InputError :message="errors.olt_id" />
            </div>

            <!-- PASO 2: SPLITTER -->
            <div>
              <InputLabel value="2. Seleccionar Splitter" class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
              <UbigeoSelect
                v-model="spliter_id"
                :options="spliters"
                :searchable="true"
                placeholder="SELECCIONAR SPLITTER..."
                class="w-full"
              />
              <InputError :message="errors.spliter_id" />
            </div>

            <!-- PASO 3: CAJA NAP -->
            <div>
              <InputLabel value="3. Seleccionar Caja NAP" class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
              <UbigeoSelect
                v-model="boxnav_id"
                :options="boxnavs"
                :searchable="false"
                placeholder="SELECCIONAR CAJA NAP..."
                class="w-full"
              />
              <InputError :message="errors.boxnav_id" />
            </div>

            <!-- PASO 4: PUERTOS -->
            <div>
              <InputLabel value="4. Seleccionar Puerto" class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5" />
              <UbigeoSelect
                v-model="portboxnav_id"
                :options="portboxnavs"
                :searchable="false"
                placeholder="SELECCIONAR PUERTO..."
                class="w-full"
              />
              <InputError :message="errors.portboxnav_id" />
            </div>
          </div>

          <div v-else class="w-full transition-all duration-200">
            <InputLabel value="Seleccionar Antena (Inalámbrico / Radio)" />
            <UbigeoSelect
              v-model="antena_id"
              :options="antenas"
              :searchable="false"
              placeholder="SELECCIONAR ANTENA..."
              class="w-full block mt-1.5"
            />
            <InputError :message="errors.antena_id" />
          </div>

          <div class="w-full grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4">
            <div class="w-full">
              <InputLabel value="CÓDIGO SLP" />
              <TextInput v-model="codigo_slp" class="w-full block" />
              <InputError :message="errors.codigo_slp" />
            </div>
            <div class="w-full">
              <InputLabel value="Teléfono" />
              <TextInput v-model="telefono" type="number" class="w-full block" />
              <InputError :message="errors.telefono" />
            </div>
            <div class="w-full">
              <InputLabel value="Precio" />
              <TextInput v-model="price" type="number" step="0.01" min="0" class="w-full block" />
              <InputError :message="errors.price" />
            </div>
            <div class="w-full">
              <InputLabel value="Fecha alta" />
              <TextInput v-model="date" type="date" class="w-full block" />
              <InputError :message="errors.date" />
            </div>
          </div>

          <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-2">
            <div class="w-full">
              <InputLabel value="Lugar / Ubigeo" />
              <UbigeoSelect v-model="ubigeo_id" :options="ubigeos" />
              <InputError :message="errors.ubigeo_id" />
            </div>
            <div class="w-full">
              <InputLabel value="Dirección de instalación" />
              <TextInput v-model="direccion" class="w-full block" />
              <InputError :message="errors.direccion" />
            </div>
          </div>

          <!-- Mapa Leaflet -->
          <div class="w-full">
            <InputLabel value="Ubicación en el Mapa" />
            <div>
              <div class="w-full relative rounded-lg overflow-hidden border border-gray-300 dark:border-neutral-700 z-0">
                <div class="absolute top-2 left-[50px] z-[400] w-[200px] sm:w-[250px]">
                  <div class="relative bg-white/95 dark:bg-neutral-800/95 backdrop-blur-sm rounded-lg shadow-md border border-gray-200 dark:border-neutral-600 flex items-center">
                    <input
                      type="text"
                      v-model="searchQuery"
                      @keydown.enter.prevent="searchPlace"
                      class="w-full bg-transparent border-none focus:ring-0 text-[11px] px-3 py-1.5 text-gray-700 dark:text-gray-200 placeholder-gray-400 rounded-l-lg outline-none"
                      placeholder="Buscar lugar..."
                    />
                    <button
                      type="button"
                      @click="searchPlace"
                      class="p-1.5 mr-0.5 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    >
                      <svg v-if="!isSearching" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                      <svg v-else class="animate-spin h-3.5 w-3.5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div id="map-create" class="w-full h-[250px] z-0"></div>

                <div class="absolute bottom-2 right-2 z-[400] flex flex-col gap-1">
                  <button
                    type="button"
                    @click="locateMe"
                    class="bg-white/85 dark:bg-neutral-800 text-gray-800 dark:text-gray-200 p-2 rounded-lg shadow-md hover:bg-gray-50 dark:hover:bg-neutral-700 text-[10px] font-bold flex items-center gap-1 border border-gray-200 dark:border-neutral-600 transition-colors"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 dark:text-red-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                <div class="w-full">
                  <InputLabel value="Latitud" />
                  <TextInput v-model="lat" @input="updateFromInput" class="w-full block text-sm" />
                  <InputError :message="errors.latitude" />
                </div>
                <div class="w-full">
                  <InputLabel value="Longitud" />
                  <TextInput v-model="lng" @input="updateFromInput" class="w-full block text-sm" />
                  <InputError :message="errors.longitude" />
                </div>
              </div>
            </div>
          </div>

          <!-- Switch Agregar Equipo -->
          <div class="w-full flex items-center justify-between p-3 bg-gray-50 dark:bg-neutral-900/60 rounded-xl border border-gray-200 dark:border-neutral-700/60 transition-colors">
            <div class="flex flex-col">
              <span class="text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide">AGREGAR EQUIPO</span>
              <span class="text-[10px] text-gray-500 dark:text-neutral-400">Registrar equipos adicionales al cliente</span>
            </div>
            <label for="addequipo" class="relative inline-flex items-center cursor-pointer shrink-0">
              <input type="checkbox" id="addequipo" class="sr-only peer" v-model="addequipo" />
              <div class="w-10 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer dark:bg-neutral-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-neutral-600 dark:peer-checked:bg-neutral-500 shadow-inner"></div>
            </label>
          </div>

          <div v-show="addequipo" class="w-full grid lg:grid-cols-2 gap-2">
            <div class="lg:col-span-2">
              <InputLabel value="Agregar equipo" />
              <TextInput v-model="descripcionequipo" class="w-full block" />
              <InputError :message="errors.descripcionequipo" />
            </div>

            <div class="w-full">
              <InputLabel value="Tipo entrega" />
              <SelectInput v-model="tipoentrega" class="w-full block">
                <option value="ALQUILADO">EQUIPO ALQUILADO</option>
                <option value="VENDIDO">EQUIPO VENDIDO</option>
              </SelectInput>
            </div>
            <div class="w-full">
              <InputLabel value="Precio" />
              <TextInput v-model="priceequipo" type="number" step="0.01" min="0" class="w-full block" />
            </div>
            <div class="w-full">
              <InputLabel value="MAC" />
              <TextInput v-model="mac" maxlength="8" class="w-full block" />
            </div>
            <div class="lg:col-span-2 text-end">
              <PrimaryButton type="button" @click="saveequipament">
                AGREGAR EQUIPO
              </PrimaryButton>
            </div>
          </div>

          <div v-show="addequipo && equipos.length > 0" class="w-full">
            <DataTable>
              <template #thead>
                <tr>
                  <th>DESCRIPCIÓN DEL EQUIPO</th>
                  <th>TIPO ENTREGA</th>
                  <th>PRECIO</th>
                  <th class="sr-only">OPCIONES</th>
                </tr>
              </template>
              <template #tbody>
                <tr v-for="item in equipos" :key="item.id_equipo">
                  <td class="text-center uppercase">
                    {{ item.descripcionequipo }}
                    <p v-if="item.mac" class="text-[10px]">MAC: {{ item.mac }}</p>
                  </td>
                  <td class="text-center">{{ item.tipoentrega }}</td>
                  <td class="text-center">S/. {{ item.priceequipo }}</td>
                  <td class="text-center">
                    <button
                      type="button"
                      @click="deleteEquipo(item.id_equipo)"
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
                  </td>
                </tr>
              </template>
            </DataTable>
          </div>

          <div class="text-end sticky bottom-0 bg-white dark:bg-neutral-800 pb-4 pt-4 border-t border-gray-200 dark:border-neutral-700/60 z-10">
            <PrimaryButton type="submit" :disabled="loading">
              REGISTRAR
            </PrimaryButton>
          </div>
        </form>
      </template>
    </DialogModal>
  </div>
</template>
