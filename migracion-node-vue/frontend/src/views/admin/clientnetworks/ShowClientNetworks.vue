<script setup lang="ts">
import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import LoadingOverlay from "../../../components/LoadingOverlay.vue";
import DialogModal from "../../../components/DialogModal.vue";
import PrimaryButton from "../../../components/PrimaryButton.vue";
import DangerButton from "../../../components/DangerButton.vue";
import TextInput from "../../../components/TextInput.vue";
import InputLabel from "../../../components/InputLabel.vue";
import DataTable from "../../../components/DataTable.vue";
import UbigeoSelect from "../../../components/UbigeoSelect.vue";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { Badge } from "@/components/ui/badge";
import { api } from "../../../services/api.js";
import { confirmDialog, toast } from "../../../utils/alerts.js";
import L from "leaflet";
import "leaflet/dist/leaflet.css";

const router = useRouter();

const loading = ref(false);
const networks = ref<any[]>([]);
const total = ref(0);
const page = ref(1);
const lastPage = ref(1);

// Filters
const search = ref("");
const searchtype = ref("");
const searchstatus = ref("");
const searchuser = ref("");
const searchlocation = ref("");

// Options lists for filters
const users = ref<any[]>([]);
const locations = ref<any[]>([]);

// Edit Modal state
const openEdit = ref(false);
const isHydrating = ref(false);
const editingNetwork = ref<any>(null);
const client_id = ref<number | null>(null);
const client_document = ref("");
const client_name = ref("");
const editType = ref("FIBRA");
const edit_olt_id = ref<number | string>("");
const edit_spliter_id = ref<number | string>("");
const edit_boxnav_id = ref<number | string>("");
const edit_portboxnav_id = ref<number | string>("");
const edit_antena_id = ref<number | string>("");
const edit_codigo_slp = ref("");
const edit_telefono = ref("");
const edit_price = ref<number | string>("");
const edit_date = ref("");
const edit_ubigeo_id = ref<number | string>("");
const edit_direccion = ref("");
const edit_lat = ref("");
const edit_lng = ref("");
const edit_zoom = ref(14);

const olts = ref<any[]>([]);
const spliters = ref<any[]>([]);
const boxnavs = ref<any[]>([]);
const portboxnavs = ref<any[]>([]);
const antenas = ref<any[]>([]);
const ubigeos = ref<any[]>([]);

let editMap: L.Map | null = null;
let editMarker: L.Marker | null = null;

async function loadNetworks() {
    try {
        loading.value = true;
        const res = await api.get("/networks", {
            params: {
                search: search.value,
                type: searchtype.value,
                status: searchstatus.value,
                user_id: searchuser.value,
                ubigeo_id: searchlocation.value,
                page: page.value,
                limit: 15,
            },
        });
        networks.value = res.data.data || [];
        total.value = res.data.meta?.total || 0;
        lastPage.value = res.data.meta?.last_page || 1;
    } catch (err) {
        console.error(err);
    } finally {
        loading.value = false;
    }
}

async function loadFilterDependencies() {
    try {
        const [uRes, locRes, oltsRes, antenasRes, ubRes] = await Promise.all([
            api.get("/users"),
            api.get("/ubigeos"),
            api.get("/olts"),
            api.get("/antenas"),
            api.get("/ubigeos"),
        ]);
        users.value = uRes.data || [];
        locations.value = locRes.data || [];
        olts.value = oltsRes.data || [];
        antenas.value = antenasRes.data || [];
        ubigeos.value = ubRes.data || [];
    } catch (err) {
        console.error(err);
    }
}

watch([search, searchtype, searchstatus, searchuser, searchlocation], () => {
    page.value = 1;
    loadNetworks();
});

function formatDate(dateStr: string) {
    if (!dateStr) return "-";
    const d = new Date(dateStr);
    return d
        .toLocaleDateString("es-PE", {
            day: "2-digit",
            month: "short",
            year: "numeric",
        })
        .toUpperCase();
}

function formatPhone(phone: string) {
    if (!phone) return "";
    return phone.replace(/(\d{3})(\d{3})(\d{3})/, "$1 $2 $3");
}

function isFibra(t: string) {
    if (!t) return false;
    const upper = t.trim().toUpperCase();
    return (
        upper === "FIBRA" ||
        upper === "FIBRA+TV" ||
        upper === "TV" ||
        upper === "FIBRA OPTICA" ||
        upper === "FIBRA OPTICA + CABLE TELEVISIÓN" ||
        upper === "FIBRA OPTICA + CABLE TELEVISION" ||
        upper === "CABLE TELEVISIÓN" ||
        upper === "CABLE TELEVISION"
    );
}

function normalizeType(t: string | null | undefined): string {
    if (!t) return "FIBRA";
    const upper = t.trim().toUpperCase();
    if (
        upper === "TV" ||
        upper === "CABLE TELEVISIÓN" ||
        upper === "CABLE TELEVISION"
    ) {
        return "TV";
    }
    if (
        upper === "FIBRA+TV" ||
        upper === "FIBRA OPTICA + CABLE TELEVISIÓN" ||
        upper === "FIBRA OPTICA + CABLE TELEVISION"
    ) {
        return "FIBRA+TV";
    }
    if (upper === "SATELITAL" || upper === "INTERNET SATELITAL") {
        return "SATELITAL";
    }
    if (upper === "FIBRA" || upper === "FIBRA OPTICA") {
        return "FIBRA";
    }
    return "FIBRA";
}

function toDbType(t: string): string {
    if (t === "TV") return "CABLE TELEVISIÓN";
    if (t === "FIBRA") return "FIBRA OPTICA";
    if (t === "FIBRA+TV") return "FIBRA OPTICA + CABLE TELEVISIÓN";
    if (t === "SATELITAL") return "INTERNET SATELITAL";
    return t;
}

async function toggleStatus(item: any) {
    const isSusp = item.status === "2";
    const actionText = isSusp
        ? "¿Reconectar este servicio?"
        : "¿Suspender este servicio?";
    const confirm = await confirmDialog("Confirmar", actionText, "warning");
    if (!confirm) return;

    try {
        loading.value = true;
        await api.put(`/networks/${item.id}/toggle-status`);
        toast(
            isSusp ? "Servicio reconectado" : "Servicio suspendido",
            "success",
        );
        await loadNetworks();
    } catch (err: any) {
        toast(
            err.response?.data?.message || "Error al cambiar estado",
            "error",
        );
    } finally {
        loading.value = false;
    }
}

async function edit(item: any) {
    try {
        loading.value = true;
        isHydrating.value = true;

        // Obtener datos frescos del backend con todas sus relaciones cargadas
        let net = item;
        try {
            const freshRes = await api.get(`/networks/${item.id}`);
            if (freshRes.data) {
                net = freshRes.data;
            }
        } catch (e) {
            console.warn(
                "No se pudo refrescar desde endpoint show, usando item:",
                e,
            );
        }

        editingNetwork.value = net;
        client_id.value = net.client?.id || null;
        client_document.value = net.client?.document || "";
        client_name.value = net.client?.name || "";
        editType.value = normalizeType(net.type);
        edit_codigo_slp.value = net.codigo_slp || "";
        edit_telefono.value = net.telefono || "";
        edit_price.value =
            net.price !== null && net.price !== undefined ? net.price : "";
        edit_date.value = net.date ? net.date.split("T")[0] : "";
        edit_ubigeo_id.value = net.ubigeo_id || "";
        edit_direccion.value = net.direccion || "";
        edit_lat.value = net.latitude ? String(net.latitude) : "";
        edit_lng.value = net.longitude ? String(net.longitude) : "";
        edit_zoom.value = net.zoom || 14;

        // Limpiar selectores previos antes de hidratar
        spliters.value = [];
        boxnavs.value = [];
        portboxnavs.value = [];
        edit_olt_id.value = "";
        edit_spliter_id.value = "";
        edit_boxnav_id.value = "";
        edit_portboxnav_id.value = "";
        edit_antena_id.value = "";

        if (isFibra(net.type)) {
            if (net.networkable && net.networkable.boxnav) {
                const box = net.networkable.boxnav;
                const spliter = box.spliter;
                const olt = spliter?.olt;

                if (olt?.id) {
                    edit_olt_id.value = olt.id;
                    const sRes = await api.get(`/spliters?olt_id=${olt.id}`);
                    spliters.value = sRes.data || [];
                }

                if (spliter?.id) {
                    edit_spliter_id.value = spliter.id;
                    const bRes = await api.get(
                        `/boxnavs?spliter_id=${spliter.id}`,
                    );
                    boxnavs.value = bRes.data || [];
                }

                if (box?.id) {
                    edit_boxnav_id.value = box.id;
                    const currentBox = boxnavs.value.find(
                        (b) => String(b.id) === String(box.id),
                    );
                    if (currentBox && currentBox.portboxnavs) {
                        portboxnavs.value = currentBox.portboxnavs;
                    }
                }

                if (net.networkable?.id) {
                    edit_portboxnav_id.value = net.networkable.id;
                }
            }
        } else {
            edit_antena_id.value = net.networkable_id || "";
        }

        openEdit.value = true;
        setTimeout(() => {
            isHydrating.value = false;
            initEditMap();
        }, 350);
    } catch (err: any) {
        console.error(err);
        toast("Error al recuperar los datos para editar", "error");
    } finally {
        loading.value = false;
    }
}

watch(edit_olt_id, async (newVal) => {
    if (isHydrating.value || !openEdit.value) return;
    edit_spliter_id.value = "";
    edit_boxnav_id.value = "";
    edit_portboxnav_id.value = "";
    spliters.value = [];
    boxnavs.value = [];
    portboxnavs.value = [];
    if (!newVal) return;
    try {
        const res = await api.get(`/spliters?olt_id=${newVal}`);
        spliters.value = res.data || [];
    } catch (err) {
        console.error(err);
    }
});

watch(edit_spliter_id, async (newVal) => {
    if (isHydrating.value || !openEdit.value) return;
    edit_boxnav_id.value = "";
    edit_portboxnav_id.value = "";
    boxnavs.value = [];
    portboxnavs.value = [];
    if (!newVal) return;
    try {
        const res = await api.get(`/boxnavs?spliter_id=${newVal}`);
        boxnavs.value = res.data || [];
    } catch (err) {
        console.error(err);
    }
});

watch(edit_boxnav_id, (newVal) => {
    if (isHydrating.value || !openEdit.value) return;
    edit_portboxnav_id.value = "";
    portboxnavs.value = [];
    if (!newVal) return;
    const box = boxnavs.value.find((b) => String(b.id) === String(newVal));
    if (box && box.portboxnavs) {
        portboxnavs.value = box.portboxnavs;
    }
});

watch(editType, (newType) => {
    if (isHydrating.value || !openEdit.value) return;
    if (!isFibra(newType)) {
        edit_olt_id.value = "";
        edit_spliter_id.value = "";
        edit_boxnav_id.value = "";
        edit_portboxnav_id.value = "";
        spliters.value = [];
        boxnavs.value = [];
        portboxnavs.value = [];
    } else {
        edit_antena_id.value = "";
    }
});

function initEditMap() {
    const container = document.getElementById("map-edit");
    if (!container) return;

    if (editMap) {
        editMap.off();
        editMap.remove();
        editMap = null;
    }

    const defaultLat = edit_lat.value ? parseFloat(edit_lat.value) : -12.046374;
    const defaultLng = edit_lng.value ? parseFloat(edit_lng.value) : -77.042793;

    const osm = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        { maxZoom: 19 },
    );
    editMap = L.map("map-edit", {
        center: [defaultLat, defaultLng],
        zoom: edit_zoom.value || 14,
        layers: [osm],
    });

    const redIcon = new L.Icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png",
        shadowUrl:
            "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    });

    editMarker = L.marker([defaultLat, defaultLng], {
        icon: redIcon,
        draggable: true,
    }).addTo(editMap);

    editMarker.on("dragend", () => {
        if (editMarker) {
            const pos = editMarker.getLatLng();
            edit_lat.value = pos.lat.toString();
            edit_lng.value = pos.lng.toString();
        }
    });

    editMap.on("click", (e: L.LeafletMouseEvent) => {
        edit_lat.value = e.latlng.lat.toString();
        edit_lng.value = e.latlng.lng.toString();
        if (editMarker) editMarker.setLatLng(e.latlng);
    });
}

async function update() {
    if (!editingNetwork.value) return;
    try {
        loading.value = true;
        const selectedNetworkableId = isFibra(editType.value)
            ? edit_portboxnav_id.value
            : edit_antena_id.value;

        if (!edit_date.value) {
            toast("La fecha de alta es requerida", "warning");
            return;
        }

        if (!selectedNetworkableId) {
            toast(
                isFibra(editType.value)
                    ? "Debe seleccionar un puerto de caja NAP"
                    : "Debe seleccionar una antena",
                "warning",
            );
            return;
        }

        if (client_id.value && client_name.value) {
            await api.put(`/clients/${client_id.value}`, {
                name: client_name.value.trim().toUpperCase(),
            });
        }

        await api.put(`/networks/${editingNetwork.value.id}`, {
            client_name: client_name.value
                ? client_name.value.trim().toUpperCase()
                : undefined,
            date: edit_date.value,
            type: toDbType(editType.value),
            codigo_slp: edit_codigo_slp.value
                ? edit_codigo_slp.value.trim()
                : null,
            telefono: edit_telefono.value ? edit_telefono.value.trim() : null,
            price: parseFloat(String(edit_price.value)) || 0,
            direccion: edit_direccion.value
                ? edit_direccion.value.trim().toUpperCase()
                : null,
            ubigeo_id: edit_ubigeo_id.value || null,
            networkable_id: selectedNetworkableId,
            latitude: edit_lat.value ? parseFloat(edit_lat.value) : null,
            longitude: edit_lng.value ? parseFloat(edit_lng.value) : null,
            zoom: edit_zoom.value || 14,
        });

        toast("Cliente internet actualizado con éxito", "success");
        openEdit.value = false;
        await loadNetworks();
    } catch (err: any) {
        toast(err.response?.data?.message || "Error al actualizar", "error");
    } finally {
        loading.value = false;
    }
}

async function confirmDeleteNetwork(item: any) {
    const confirm = await confirmDialog(
        "¿Eliminar servicio?",
        `Se eliminará el servicio ${item.code} de ${item.client?.name || ""}. Esta acción no se puede deshacer.`,
        "warning",
    );
    if (!confirm) return;

    try {
        loading.value = true;
        await api.delete(`/networks/${item.id}`);
        toast("Servicio eliminado correctamente", "success");
        await loadNetworks();
    } catch (err: any) {
        toast(err.response?.data?.message || "Error al eliminar", "error");
    } finally {
        loading.value = false;
    }
}

function exportExcel() {
    window.open(
        `${api.defaults.baseURL}/reports/networks?format=excel`,
        "_blank",
    );
}

function exportPdf() {
    window.open(
        `${api.defaults.baseURL}/reports/networks?format=pdf`,
        "_blank",
    );
}

defineExpose({
    loadNetworks,
});

onMounted(async () => {
    await Promise.all([loadNetworks(), loadFilterDependencies()]);
});
</script>

<template>
    <div>
        <!-- Full viewport elegant loading overlay -->
        <LoadingOverlay :show="loading" />

        <div class="w-full flex flex-wrap gap-2 mb-2">
            <div class="w-full max-w-xs space-y-1">
                <InputLabel value="Buscar cliente" />
                <TextInput
                    v-model="search"
                    placeholder="DNI, nombre o código..."
                    class="w-full text-xs"
                />
            </div>

            <div class="w-full max-w-44 space-y-1">
                <InputLabel value="Tipo servicio" />
                <Select
                    :model-value="searchtype || 'all'"
                    @update:model-value="
                        (val: any) => (searchtype = val === 'all' ? '' : val)
                    "
                >
                    <SelectTrigger
                        class="w-full h-[38px] text-xs bg-background border-border"
                    >
                        <SelectValue placeholder="TODOS" />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectItem value="all">TODOS</SelectItem>
                        <SelectItem value="TV">TV</SelectItem>
                        <SelectItem value="FIBRA">FIBRA</SelectItem>
                        <SelectItem value="FIBRA+TV">FIBRA+TV</SelectItem>
                        <SelectItem value="SATELITAL">SATELITAL</SelectItem>
                    </SelectContent>
                </Select>
            </div>

            <div class="w-full max-w-40 space-y-1">
                <InputLabel value="Estado" />
                <Select
                    :model-value="searchstatus || 'all'"
                    @update:model-value="
                        (val: any) => (searchstatus = val === 'all' ? '' : val)
                    "
                >
                    <SelectTrigger
                        class="w-full h-[38px] text-xs bg-background border-border"
                    >
                        <SelectValue placeholder="TODOS" />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectItem value="all">TODOS</SelectItem>
                        <SelectItem value="0">ACTIVO</SelectItem>
                        <SelectItem value="2">SUSPENDIDO</SelectItem>
                    </SelectContent>
                </Select>
            </div>

            <div class="w-full max-w-44 space-y-1">
                <InputLabel value="Usuario" />
                <Select
                    :model-value="searchuser ? String(searchuser) : 'all'"
                    @update:model-value="
                        (val: any) => (searchuser = val === 'all' ? '' : val)
                    "
                >
                    <SelectTrigger
                        class="w-full h-[38px] text-xs bg-background border-border"
                    >
                        <SelectValue placeholder="TODOS" />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectItem value="all">TODOS</SelectItem>
                        <SelectItem
                            v-for="user in users"
                            :key="user.id"
                            :value="String(user.id)"
                        >
                            {{ user.name }}
                        </SelectItem>
                    </SelectContent>
                </Select>
            </div>

            <div class="w-full max-w-48 space-y-1">
                <InputLabel value="Seleccionar Lugar" />
                <Select
                    :model-value="
                        searchlocation ? String(searchlocation) : 'all'
                    "
                    @update:model-value="
                        (val: any) =>
                            (searchlocation = val === 'all' ? '' : val)
                    "
                >
                    <SelectTrigger
                        class="w-full h-[38px] text-xs bg-background border-border"
                    >
                        <SelectValue placeholder="TODOS LOS LUGARES" />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectItem value="all">TODOS LOS LUGARES</SelectItem>
                        <SelectItem
                            v-for="loc in locations"
                            :key="loc.id"
                            :value="String(loc.id)"
                        >
                            {{ loc.distrito }} - {{ loc.provincia }}
                        </SelectItem>
                    </SelectContent>
                </Select>
            </div>

            <div class="flex items-end gap-2 ml-auto">
                <button
                    type="button"
                    @click="exportExcel"
                    :disabled="loading"
                    class="inline-flex items-center justify-center p-2 bg-emerald-600 dark:bg-emerald-700 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors gap-1 shadow-sm h-[38px] min-h-[38px]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                        />
                    </svg>
                    EXCEL
                </button>
                <DangerButton
                    @click="exportPdf"
                    :disabled="loading"
                    class="inline-flex items-center justify-center h-[38px] min-h-[38px] gap-1 shadow-sm"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                        />
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
                        <th>COD. SERVICIO</th>
                        <th style="min-width: 100px">FECHA ALTA</th>
                        <th style="min-width: 240px" class="text-left">
                            CLIENTE
                        </th>
                        <th style="min-width: 150px">TIPO SERVICIO</th>
                        <th style="min-width: 150px">CONEXIÓN</th>
                        <th style="min-width: 100px">PRECIO</th>
                        <th>ESTADO</th>
                        <th>PROVEEDOR</th>
                        <th>OPCIONES</th>
                    </tr>
                </template>
                <template #tbody>
                    <tr v-if="networks.length === 0">
                        <td colspan="9" class="text-center py-4 text-gray-500">
                            No se encontraron clientes de red.
                        </td>
                    </tr>
                    <tr v-for="item in networks" :key="item.id">
                        <td class="text-center">
                            <router-link
                                :to="`/admin/client-network/${item.id}/show`"
                                class="text-xs inline-flex gap-1 items-center justify-center text-blue-500 hover:text-blue-800 duration-150 transition-colors"
                                title="Ver detalle"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="size-4"
                                >
                                    <path
                                        d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"
                                    />
                                </svg>
                                <span
                                    class="flex-1 flex flex-col gap-1 items-center justify-center"
                                >
                                    <span
                                        v-if="item.codigo_slp"
                                        class="text-[9px] border bg-blue-50 border-blue-300 dark:bg-blue-900/50 dark:border-blue-500 dark:text-blue-100 rounded-lg p-0.5 whitespace-nowrap"
                                    >
                                        {{ item.codigo_slp }}
                                    </span>
                                    {{ item.code }}
                                </span>
                            </router-link>
                        </td>
                        <td class="text-center uppercase w-[100px]">
                            {{ formatDate(item.date) }}
                        </td>
                        <td class="text-left">
                            <p>
                                <span
                                    class="font-bold text-neutral-600 dark:text-neutral-300"
                                >
                                    [{{ item.client?.document }}]
                                </span>
                                {{ item.client?.name }}
                            </p>
                            <p
                                class="text-green-600 dark:text-green-500 flex items-center gap-1 font-medium mt-1"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-3 h-3"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                {{ formatPhone(item.telefono) }}
                            </p>
                            <p
                                class="text-[10px] text-neutral-600 dark:text-neutral-400"
                            >
                                <span v-if="item.direccion">{{
                                    item.direccion
                                }}</span>
                                <span v-if="item.ubigeo">
                                    - {{ item.ubigeo.distrito }} -
                                    {{ item.ubigeo.provincia }}</span
                                >
                            </p>
                        </td>
                        <td class="text-center">{{ item.type }}</td>
                        <td class="text-center">
                            <div v-if="item.networkable">
                                <template v-if="!isFibra(item.type)">
                                    <p class="text-[10px] text-neutral-500">
                                        {{ item.networkable.name }}
                                    </p>
                                    <p>{{ item.networkable.direccion }}</p>
                                </template>
                                <template v-else>
                                    <p class="text-[10px] text-neutral-500">
                                        {{
                                            item.networkable.boxnav?.spliter
                                                ?.olt?.name
                                        }}
                                        »
                                        {{
                                            item.networkable.boxnav?.spliter
                                                ?.name
                                        }}
                                        »
                                        {{ item.networkable.boxnav?.name }}
                                    </p>
                                    <p class="font-medium text-xs">
                                        {{
                                            item.networkable.alias ||
                                            item.networkable.code
                                        }}
                                    </p>
                                </template>
                            </div>
                        </td>
                        <td class="text-center">
                            S/. {{ Number(item.price || 0).toFixed(2) }}
                        </td>
                        <td class="text-center align-middle">
                            <Badge
                                v-if="item.status === '2'"
                                variant="destructive"
                                class="inline-block mb-1 text-[9px] font-bold tracking-wider"
                            >
                                SUSPENDIDO
                            </Badge>
                            <Badge
                                v-else
                                class="bg-emerald-500 hover:bg-emerald-600 dark:bg-emerald-600 inline-block mb-1 text-white text-[9px] font-bold tracking-wider"
                            >
                                ACTIVO
                            </Badge>
                        </td>
                        <td class="text-center align-middle">
                            <span
                                class="text-xs font-semibold text-neutral-700 dark:text-neutral-300"
                            >
                                {{ item.user?.name || "-" }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-1">
                                <PrimaryButton
                                    v-if="item.status === '2'"
                                    @click="toggleStatus(item)"
                                    class="!bg-emerald-600 hover:!bg-emerald-700 dark:!bg-emerald-600 dark:hover:!bg-emerald-500 !text-white !py-1.5 !text-[10px] shadow-sm transition-all"
                                >
                                    RECONECTAR
                                </PrimaryButton>
                                <PrimaryButton
                                    v-else
                                    @click="toggleStatus(item)"
                                    class="!bg-orange-500 hover:!bg-orange-600 dark:!bg-orange-600 dark:hover:!bg-orange-500 !text-white !py-1.5 !text-[10px] shadow-sm transition-all"
                                >
                                    SUSPENDER
                                </PrimaryButton>

                                <button
                                    type="button"
                                    :id="`btn-edit-${item.id}`"
                                    @click="edit(item)"
                                    title="Editar"
                                    class="inline-block p-1 rounded-md text-orange-500 hover:bg-orange-500 hover:text-white duration-150 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor"
                                        class="size-4 block mx-auto"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                        />
                                    </svg>
                                </button>

                                <button
                                    type="button"
                                    :id="`btn-delete-${item.id}`"
                                    @click="confirmDeleteNetwork(item)"
                                    title="Eliminar"
                                    class="inline-block p-1 rounded-md text-red-600 hover:bg-red-600 hover:text-white duration-150 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="size-4 block mx-auto"
                                    >
                                        <path d="M3 6h18" />
                                        <path
                                            d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"
                                        />
                                        <path
                                            d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"
                                        />
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
        <div
            v-if="lastPage > 1"
            class="sticky bottom-2 z-10 w-full mt-4 flex items-center justify-between bg-white dark:bg-neutral-800 p-2 rounded-lg shadow border border-gray-200 dark:border-neutral-700"
        >
            <span class="text-xs text-gray-600 dark:text-gray-400">
                Página {{ page }} de {{ lastPage }} (Total: {{ total }})
            </span>
            <div class="flex items-center gap-1">
                <button
                    :disabled="page <= 1"
                    @click="
                        page--;
                        loadNetworks();
                    "
                    class="px-2.5 py-1 text-xs font-semibold rounded bg-gray-100 dark:bg-neutral-700 disabled:opacity-50"
                >
                    Anterior
                </button>
                <button
                    :disabled="page >= lastPage"
                    @click="
                        page++;
                        loadNetworks();
                    "
                    class="px-2.5 py-1 text-xs font-semibold rounded bg-gray-100 dark:bg-neutral-700 disabled:opacity-50"
                >
                    Siguiente
                </button>
            </div>
        </div>

        <!-- Edit Dialog Modal -->
        <DialogModal :show="openEdit" maxWidth="4xl" @close="openEdit = false">
            <template #title>
                <div class="w-full flex items-center justify-between">
                    <h1 class="font-semibold text-[10px]">
                        ACTUALIZAR CLIENTE INTERNET
                    </h1>
                    <button
                        type="button"
                        @click="openEdit = false"
                        class="rounded-md text-gray-700 p-2 dark:text-gray-400 hover:bg-gray-50 focus:bg-gray-50 dark:hover:bg-neutral-700/40 dark:focus:bg-neutral-700/40 hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-300 dark:focus:text-gray-300 transition-colors ease-in-out duration-150"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="3"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </template>

            <template #content>
                <form
                    @submit.prevent="update"
                    class="w-full grid grid-cols-1 gap-2"
                >
                    <div
                        v-if="client_id"
                        class="w-full grid grid-cols-1 gap-2 md:grid-cols-3"
                    >
                        <div class="w-full space-y-1">
                            <InputLabel value="Documento (DNI/RUC)" />
                            <TextInput
                                v-model="client_document"
                                class="w-full text-xs uppercase"
                                :disabled="true"
                            />
                        </div>
                        <div class="w-full md:col-span-2 space-y-1">
                            <InputLabel
                                value="Nombre del cliente / Razón Social"
                            />
                            <TextInput
                                v-model="client_name"
                                class="w-full text-xs uppercase"
                            />
                        </div>
                    </div>

                    <div>
                        <InputLabel value="Tipo servicio" class="mb-1" />
                        <div class="flex flex-wrap items-center gap-2">
                            <div>
                                <input
                                    class="hidden peer"
                                    type="radio"
                                    name="edittype"
                                    v-model="editType"
                                    id="edit_tv"
                                    value="TV"
                                />
                                <label
                                    for="edit_tv"
                                    :class="[
                                        'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                                        editType === 'TV'
                                            ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                                            : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                                    ]"
                                >
                                    TV
                                </label>
                            </div>
                            <div>
                                <input
                                    class="hidden peer"
                                    type="radio"
                                    name="edittype"
                                    v-model="editType"
                                    id="edit_fibra"
                                    value="FIBRA"
                                />
                                <label
                                    for="edit_fibra"
                                    :class="[
                                        'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                                        editType === 'FIBRA'
                                            ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                                            : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                                    ]"
                                >
                                    FIBRA
                                </label>
                            </div>
                            <div>
                                <input
                                    class="hidden peer"
                                    type="radio"
                                    name="edittype"
                                    v-model="editType"
                                    id="edit_fibra_tv"
                                    value="FIBRA+TV"
                                />
                                <label
                                    for="edit_fibra_tv"
                                    :class="[
                                        'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                                        editType === 'FIBRA+TV'
                                            ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                                            : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                                    ]"
                                >
                                    FIBRA+TV
                                </label>
                            </div>
                            <div>
                                <input
                                    class="hidden peer"
                                    type="radio"
                                    name="edittype"
                                    v-model="editType"
                                    id="edit_satelital"
                                    value="SATELITAL"
                                />
                                <label
                                    for="edit_satelital"
                                    :class="[
                                        'inline-flex items-center cursor-pointer px-3 py-2 border rounded-lg font-semibold text-[10px] uppercase tracking-widest transition ease-in-out duration-150',
                                        editType === 'SATELITAL'
                                            ? 'bg-neutral-800 text-white dark:bg-neutral-200 dark:text-neutral-900 border-neutral-800 dark:border-neutral-200 shadow-xs'
                                            : 'bg-background text-muted-foreground border-border hover:bg-accent hover:text-foreground',
                                    ]"
                                >
                                    SATELITAL
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- FIBER STEP SELECTORS -->
                    <div
                        v-if="isFibra(editType)"
                        class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 transition-all duration-200"
                    >
                        <div>
                            <InputLabel
                                value="1. Seleccionar OLT"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5"
                            />
                            <UbigeoSelect
                                v-model="edit_olt_id"
                                :options="olts"
                                :searchable="false"
                                placeholder="SELECCIONAR OLT..."
                                class="w-full"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="2. Seleccionar Splitter"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5"
                            />
                            <UbigeoSelect
                                v-model="edit_spliter_id"
                                :options="spliters"
                                :searchable="true"
                                placeholder="SELECCIONAR SPLITTER..."
                                class="w-full"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="3. Seleccionar Caja NAP"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5"
                            />
                            <UbigeoSelect
                                v-model="edit_boxnav_id"
                                :options="boxnavs"
                                :searchable="false"
                                placeholder="SELECCIONAR CAJA NAP..."
                                class="w-full"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="4. Seleccionar Puerto"
                                class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1.5"
                            />
                            <UbigeoSelect
                                v-model="edit_portboxnav_id"
                                :options="portboxnavs"
                                :searchable="false"
                                placeholder="SELECCIONAR PUERTO..."
                                class="w-full"
                            />
                        </div>
                    </div>

                    <div v-else class="w-full transition-all duration-200">
                        <InputLabel
                            value="Seleccionar Antena (Inalámbrico / Radio)"
                        />
                        <UbigeoSelect
                            v-model="edit_antena_id"
                            :options="antenas"
                            :searchable="false"
                            placeholder="SELECCIONAR ANTENA..."
                            class="w-full block mt-1.5"
                        />
                    </div>

                    <div
                        class="w-full grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4"
                    >
                        <div class="w-full space-y-1">
                            <InputLabel value="CÓDIGO SLP" />
                            <TextInput
                                v-model="edit_codigo_slp"
                                class="w-full text-xs"
                            />
                        </div>
                        <div class="w-full space-y-1">
                            <InputLabel value="Teléfono" />
                            <TextInput
                                v-model="edit_telefono"
                                type="number"
                                class="w-full text-xs"
                            />
                        </div>
                        <div class="w-full space-y-1">
                            <InputLabel value="Precio" />
                            <TextInput
                                v-model="edit_price"
                                type="number"
                                min="0"
                                step="0.01"
                                class="w-full text-xs"
                            />
                        </div>
                        <div class="w-full space-y-1">
                            <InputLabel value="Fecha alta" />
                            <TextInput
                                v-model="edit_date"
                                type="date"
                                class="w-full text-xs"
                            />
                        </div>
                    </div>

                    <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-2">
                        <div class="w-full space-y-1">
                            <InputLabel value="Lugar / Ubigeo" />
                            <UbigeoSelect
                                v-model="edit_ubigeo_id"
                                :options="ubigeos"
                            />
                        </div>
                        <div class="w-full space-y-1">
                            <InputLabel value="Dirección de instalación" />
                            <TextInput
                                v-model="edit_direccion"
                                class="w-full text-xs"
                            />
                        </div>
                    </div>

                    <!-- Edit Map -->
                    <div class="w-full space-y-1">
                        <InputLabel value="Ubicación en el Mapa" />
                        <div
                            class="w-full h-[220px] rounded-lg border border-border overflow-hidden mt-1"
                        >
                            <div id="map-edit" class="w-full h-full"></div>
                        </div>
                        <div class="w-full grid grid-cols-2 gap-2 mt-2">
                            <TextInput
                                v-model="edit_lat"
                                placeholder="Latitud"
                                class="w-full text-xs"
                            />
                            <TextInput
                                v-model="edit_lng"
                                placeholder="Longitud"
                                class="w-full text-xs"
                            />
                        </div>
                    </div>

                    <div
                        class="text-end pt-3 border-t border-gray-200 dark:border-neutral-700"
                    >
                        <PrimaryButton type="submit" :disabled="loading">
                            GUARDAR CAMBIOS
                        </PrimaryButton>
                    </div>
                </form>
            </template>
        </DialogModal>
    </div>
</template>
