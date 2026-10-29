# Estandarización de Base de Datos con TypeORM y Migraciones Versionadas

**Proyecto:** Sistema de Gestión de Redes (Migración 1:1 de Laravel a Node.js/TypeScript/PostgreSQL)  
**Fecha:** 2026-10-23  
**Stack Backend:** Node.js v22.17.0, TypeScript 5.6.3, Express 4.21.1, TypeORM 0.3.20, PostgreSQL 16  

---

## 1. Resumen de la Arquitectura y Diagnóstico Inicial

### 1.1 Estado Previo
- El proyecto utilizaba TypeORM con `synchronize: false`, pero la creación del esquema se había ejecutado inicialmente mediante un archivo de migración con consultas SQL en texto plano (`queryRunner.query("CREATE TABLE...")`).
- Los cambios estructurales posteriores (como volver anulable la columna `descripcion` en `networks`) se habían aplicado directamente sobre PostgreSQL mediante sentencias manuales de base de datos sin un archivo de migración versionado que respaldara el cambio en el repositorio de control de versiones.
- Las entidades Olt.ts, Spliter.ts, Permission.ts y Product.ts presentaban pequeñas discrepancias de tipado respecto a las columnas reales creadas en PostgreSQL (ej. `smallint` vs `integer`, `varchar(12)` vs `char(4)`).

---

## 2. Cambios Implementados

1. **Estandarización de la CLI de TypeORM con `tsx` (NodeNext / ESM):**
   - Se configuraron los comandos oficiales de TypeORM adaptados al entorno ESM y compilación nativa en TypeScript usando `tsx`.
2. **Índice y Registro Centralizado de Migraciones:**
   - Creación de `src/database/migrations/index.ts` para registrar y exportar todas las clases de migración ordenadas por timestamp.
3. **Migración Versionada Declarativa:**
   - Creación de `1710000000001-MakeNetworksDescripcionNullable.ts` utilizando la API de TypeORM (`queryRunner.changeColumn`, `TableColumn`).
   - Implementación de reversibilidad garantizada (`down`) que sanea datos existentes (`UPDATE ... WHERE IS NULL`) antes de restablecer la restricción `NOT NULL`.
4. **Sincronización y Ajuste Fino de Entidades:**
   - Corrección de tipos de columna, valores predeterminados y decoradores para reflejar exactamente la base de datos PostgreSQL.

---

## 3. Entidades Modificadas

| Entidad | Archivo | Modificación Realizada |
| :--- | :--- | :--- |
| **Network** | `src/entities/Network.ts` | `@Column({ type: 'text', nullable: true }) descripcion: string \| null;` |
| **Olt** | `src/entities/Olt.ts` | `code: char(4) unique nullable`, `outs: int` (ajustado de smallint) |
| **Spliter** | `src/entities/Spliter.ts` | `code: varchar(4)`, `outs: int` (ajustado de smallint) |
| **Permission**| `src/entities/Permission.ts` | Agregada columna `@UpdateDateColumn() updated_at: Date \| null;` |
| **Product** | `src/entities/Product.ts` | Normalizado `stock` con precisión decimal estándar |

---

## 4. Migraciones Versionadas del Proyecto

1. `1710000000000-InitialDatabaseMigration`:
   - Estado: **Ejecutada ([X])**
   - Propósito: Definición inicial del esquema de 22 tablas, índices y llaves foráneas.
2. `1710000000001-MakeNetworksDescripcionNullable`:
   - Estado: **Ejecutada ([X])**
   - Propósito: Permite valores nulos en `networks.descripcion` mediante la API `queryRunner.changeColumn(..., new TableColumn({ isNullable: true }))`.
   - Método `down()`: Totalmente reversible con sanitización previa de registros nulos.

---

## 5. Comandos de Trabajo Configurados en `package.json`

| Comando | Acción | Descripción |
| :--- | :--- | :--- |
| `npm run migration:status` | Consulta de estado | Muestra si hay migraciones pendientes de forma rápida. |
| `npm run migration:show` | Detalle de migraciones | Lista cada migración con su estado de ejecución `[X]` o `[ ]`. |
| `npm run migration:run` | Ejecución | Aplica todas las migraciones pendientes en estricto orden cronológico. |
| `npm run migration:revert` | Reversión | Deshace la última migración ejecutada invocando su método `down()`. |
| `npm run migration:generate -- src/database/migrations/<Nombre>` | Generación | Compara entidades con la base de datos y genera la migración diferencial. |
| `npm run migration:create -- src/database/migrations/<Nombre>` | Creación en blanco | Crea una plantilla de migración vacía para lógica declarativa personalizada. |
| `npm run db:verify` | Verificación | Conteo de registros en las 22 tablas activas de la base de datos. |

---

## 6. Resultados de Verificación y Compilación

- **Prueba de Reversión (`npm run migration:revert`):**  
  `✅ Migración revertida exitosamente.` -> Exit Code: 0.
- **Prueba de Aplicación (`npm run migration:run`):**  
  `✅ Se ejecutaron exitosamente 1 migraciones: - MakeNetworksDescripcionNullable1710000000001` -> Exit Code: 0.
- **Estado de Migraciones (`npm run typeorm migration:show`):**  
  `[X] 1 InitialDatabaseMigration1710000000000`  
  `[X] 2 MakeNetworksDescripcionNullable1710000000001` -> Exit Code: 0.
- **Verificación de Datos (`npm run db:verify`):**  
  Las 22 tablas se encuentran íntegras y los datos de clientes, redes, cajas NAP y puertos se conservan al 100%.
- **Compilación TypeScript Backend (`npm run build` en backend):**  
  `Exit Code: 0` (0 errores de compilación).
- **Compilación Frontend (`npm run build` en frontend):**  
  `Exit Code: 0` (161 módulos transformados sin errores).

---

## 7. Políticas de Esquema y Buenas Prácticas

1. **Prohibición de `synchronize: true`:**  
   Queda terminantemente desactivado tanto en desarrollo como en producción (`synchronize: false`).
2. **Prohibición de SQL manual para DDL:**  
   No se ejecutarán sentencias `CREATE TABLE`, `ALTER TABLE`, `DROP TABLE`, `ALTER COLUMN` manualmente sobre PostgreSQL.
3. **Flujo Obligatorio de Modificación de Esquema:**
   1. Modificar o crear la entidad en `src/entities/`.
   2. Generar o escribir la migración en `src/database/migrations/` utilizando `Table`, `TableColumn`, `TableIndex`, `TableForeignKey` o `queryRunner.changeColumn` / `queryRunner.addColumn`.
   3. Registrar la migración en `src/database/migrations/index.ts`.
   4. Ejecutar y validar `npm run migration:run`.
   5. Probar reversibilidad con `npm run migration:revert` y re-aplicar.
