# Migración 1:1 de Sistema de Redes: Laravel/Livewire/PostgreSQL -> Node.js/Vue/TypeORM

Este repositorio contiene la migración completa, fiel e independiente (1:1) del sistema de Gestión de Clientes, Redes de Telecomunicaciones (FTTH y Satelital), Cobranzas y Pagos Yape (EMVCo MPM).

---

## 1. Arquitectura del Proyecto

```
./migracion-node-vue/
├── backend/                       # API RESTful en Node.js + TypeScript
│   ├── src/
│   │   ├── config/                # AppDataSource TypeORM (PostgreSQL)
│   │   ├── controllers/           # Controladores API RESTful (Auth, OLTs, Clientes, etc.)
│   │   ├── database/              # Seeder inicial (Permisos Spatie, Roles, Admin)
│   │   ├── entities/              # 22 Entidades TypeORM mapeadas 1:1 con Eloquent
│   │   ├── middlewares/           # Autenticación JWT y validación de permisos can()
│   │   ├── routes/                # Enrutador API (/api/...)
│   │   └── utils/                 # EMVCo QR Service (Yape/Plin), Helpers, DNI/RUC
│   ├── package.json
│   ├── tsconfig.json
│   └── .env
└── frontend/                      # SPA en Vue 3 (Composition API / <script setup>)
    ├── src/
    │   ├── assets/                # Tailwind CSS idéntico
    │   ├── components/            # DialogModal (<x-dialog-modal>) y componentes UI
    │   ├── layouts/               # AppLayout con Sidebar responsivo (w-14 / w-52)
    │   ├── router/                # Vue Router con Guards de Permisos
    │   ├── services/              # Cliente Axios con interceptor SweetAlert2
    │   ├── stores/                # Pinia: useAuthStore y useNavStore (Dark/Light)
    │   ├── utils/                 # SweetAlert2 (Toasts y Diálogos idénticos)
    │   └── views/                 # Vistas 1:1 de los 14 módulos de Livewire
    ├── package.json
    ├── vite.config.ts
    ├── tailwind.config.js
    └── index.html
```

---

## 2. Requisitos Previos

- **Node.js:** Versión 18.x o 20.x o superior (Probado en Node v22.17.0).
- **npm:** Versión 9.x o superior.
- **PostgreSQL:** Servidor PostgreSQL corriendo con la base de datos `network`.

---

## 3. Instalación y Puesta en Marcha

### 3.1 Backend (Node.js + Express + TypeORM)

1. Ingresar al directorio del backend:
   ```bash
   cd migracion-node-vue/backend
   ```
2. Instalar dependencias:
   ```bash
   npm install
   ```
3. Configurar variables de entorno en `.env`:
   ```env
   PORT=4000
   NODE_ENV=development

   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=network
   DB_USERNAME=postgres
   DB_PASSWORD=postgres

   JWT_SECRET=network_jwt_secret_token_key_fidelidad_1_a_1
   JWT_EXPIRES_IN=7d
   FRONTEND_URL=http://localhost:5173
   ```
4. (Opcional) Ejecutar el Seeder inicial de base de datos:
   ```bash
   npm run seed
   ```
   *Crea los usuarios administradores `admin@gmail.com` y `eliceo@gmail.com` con contraseña `12345678`, y todos los permisos del sistema idénticos a `PermissionSeeder.php`.*

5. Compilar TypeScript:
   ```bash
   npm run build
   ```
6. Iniciar en modo desarrollo o producción:
   ```bash
   npm run dev    # Modo desarrollo con recarga en caliente (tsx watch)
   npm start      # Modo producción ejecutando dist/index.js
   ```

---

### 3.2 Frontend (Vue 3 + Vite + Tailwind CSS)

1. Ingresar al directorio del frontend:
   ```bash
   cd migracion-node-vue/frontend
   ```
2. Instalar dependencias:
   ```bash
   npm install
   ```
3. Compilar para producción (validación de tipado):
   ```bash
   npm run build
   ```
4. Iniciar el servidor de desarrollo Vite:
   ```bash
   npm run dev
   ```
   *Disponible en: `http://localhost:5173`*

---

## 4. Tabla de Paridad 1:1

### 4.1 Entidades de Base de Datos
| Modelo Laravel | Entidad TypeORM | Tabla en BD | Características Mapeadas |
| :--- | :--- | :--- | :--- |
| `User` | `User` | `users` | Roles Spatie, permissions, password hash |
| `Role` | `Role` | `roles` | `guard_name`, relación pivot `role_has_permissions` |
| `Permission` | `Permission` | `permissions` | `table_name`, `description`, compatibilidad Spatie |
| `Olt` | `Olt` | `olts` | Uppercase hooks, relación `spliters` y `ports` |
| `OltPort` | `OltPort` | `olt_ports` | Alias, dirección, unique `[olt_id, port_number]` |
| `Spliter` | `Spliter` | `spliters` | Relación con OLT, Cajas NAP y puertos |
| `SpliterPort` | `SpliterPort` | `spliter_ports` | Unique `[spliter_id, port_number]` |
| `Boxnav` | `Boxnav` | `boxnavs` | `splitter_port`, relación `portboxnavs` |
| `Portboxnav` | `Portboxnav` | `portboxnavs` | Estados '0' y '1', relación polimórfica |
| `Antena` | `Antena` | `antenas` | Nodos satelitales |
| `Client` | `Client` | `clients` | SoftDeletes (`deleted_at`), índices en `name` y `document` |
| `Network` | `Network` | `networks` | Relación polimórfica (`Portboxnav`/`Antena`), geolocalización, status '0'/'2' |
| `Seriepago` | `Seriepago` | `seriepagos` | Correlativos de facturación |
| `Formapay` | `Formapay` | `formapays` | Métodos de pago |
| `Recibo` | `Recibo` | `recibos` | Vencimiento, serie completa, montos, descuentos |
| `Payment` | `Payment` | `payments` | Polimórfico a Recibo, código de transferencia |
| `Marca` | `Marca` | `marcas` | Catálogo de marcas |
| `Product` | `Product` | `products` | Catálogo de hardware y ONUs |
| `Equipo` | `Equipo` | `equipos` | Dispositivos instalados con dirección MAC |
| `YapeNotification`| `YapeNotification`| `yape_notifications`| Registro webhook de pagos móviles |

### 4.2 Componentes Livewire vs Vistas Vue 3
| Módulo Livewire (Laravel) | Vista Vue 3 | Funcionalidad Clave |
| :--- | :--- | :--- |
| `Admin\Olts\ShowOlts` / `CreateOlt` | `OltsView.vue` + `OltDetailView.vue` | Gestión de OLTs, splitters, puertos y modal |
| `Admin\Clients\ShowClients` | `ClientsView.vue` | Búsqueda reactiva, consulta SUNAT/RENIEC |
| `Admin\Networks\ShowNetworks` | `NetworksView.vue` | Enlaces FTTH/Satelital, toggle de suspensión |
| `AdminController::shownetwork` | `NetworkDetailView.vue` | Vista 360, historial de recibos, mapa Leaflet |
| `Admin\Recibos\ShowRecibos` | `RecibosView.vue` | Emisión individual, masiva, impresión PDF ticket |
| `Admin\Payments\ShowPayments` | `PaymentsView.vue` | Registro de cobros, generador QR EMVCo dinámico |
| `Admin\Reports\*` | `ReportsView.vue` | Reportes estadísticos y exportación Excel (.xlsx) |
| `Admin\Yape\ShowNotifications` | `YapeNotificationsView.vue` | Monitoreo en vivo de notificaciones push |
| `Admin\Users\*` / `Admin\Roles\*` | `UsersView.vue` + `RolesView.vue` | Matriz de permisos Spatie y roles de acceso |

---

## 5. Pruebas de Paridad y Validación

1. **Compilación Backend:** `npm run build` en `migracion-node-vue/backend` finaliza sin errores de TypeScript (código de salida 0).
2. **Compilación Frontend:** `npm run build` en `migracion-node-vue/frontend` (`vue-tsc && vite build`) genera los assets optimizados en `dist/` (código de salida 0).
3. **QR EMVCo BCRP:** Probado con el algoritmo nativo CRC-16/CCITT-FALSE (polinomio 0x1021, valor inicial 0xFFFF), idéntico al estándar de interoperabilidad bancaria de Perú.
4. **SweetAlert2 y Modo Oscuro:** Persistencia en `localStorage` de `theme` ('dark'/'light') y estado del sidebar (`sidebarOpen`), con transiciones CSS idénticas.
