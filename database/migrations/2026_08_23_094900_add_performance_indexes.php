<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Networks indexes
        $this->addIndexSafely('networks', 'type');
        $this->addIndexSafely('networks', 'ubigeo_id');
        $this->addIndexSafely('networks', 'status');
        $this->addIndexSafely('networks', 'client_id');
        $this->addIndexSafely('networks', 'date');

        // Recibos indexes
        $this->addIndexSafely('recibos', 'date');
        $this->addIndexSafely('recibos', 'month');
        $this->addIndexSafely('recibos', 'network_id');
        $this->addIndexSafely('recibos', 'client_id');
        $this->addIndexSafely('recibos', 'seriepago_id');

        // Clients indexes
        $this->addIndexSafely('clients', 'name');
        $this->addIndexSafely('clients', 'document');

        // Payments indexes
        // 'payments' usa relación polimórfica (paymentable_type, paymentable_id)
        // y no cuenta con recibo_id ni created_at ($timestamps = false).
        $this->addIndexSafely('payments', ['paymentable_type', 'paymentable_id']);
        $this->addIndexSafely('payments', 'date');
        $this->addIndexSafely('payments', 'month');

        // OLT ports single‑column index
        $this->addIndexSafely('olt_ports', 'olt_id');

        // Spliter ports single‑column index
        $this->addIndexSafely('spliter_ports', 'spliter_id');

        // Portboxnavs: indexar solo 'alias' (varchar).
        // 'direccion' es TEXT y en MySQL genera error 1170 si no tiene longitud fija.
        $this->addIndexSafely('portboxnavs', 'alias');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropIndexSafely('networks', 'type');
        $this->dropIndexSafely('networks', 'ubigeo_id');
        $this->dropIndexSafely('networks', 'status');
        $this->dropIndexSafely('networks', 'client_id');
        $this->dropIndexSafely('networks', 'date');

        $this->dropIndexSafely('recibos', 'date');
        $this->dropIndexSafely('recibos', 'month');
        $this->dropIndexSafely('recibos', 'network_id');
        $this->dropIndexSafely('recibos', 'client_id');
        $this->dropIndexSafely('recibos', 'seriepago_id');

        $this->dropIndexSafely('clients', 'name');
        $this->dropIndexSafely('clients', 'document');

        $this->dropIndexSafely('payments', ['paymentable_type', 'paymentable_id']);
        $this->dropIndexSafely('payments', 'date');
        $this->dropIndexSafely('payments', 'month');

        $this->dropIndexSafely('olt_ports', 'olt_id');

        $this->dropIndexSafely('spliter_ports', 'spliter_id');

        $this->dropIndexSafely('portboxnavs', 'alias');
    }

    /**
     * Helper para agregar índices de forma segura e idempotente.
     */
    protected function addIndexSafely(string $table, string|array $columns, ?string $indexName = null): void
    {
        if (!Schema::hasTable($table)) {
            return;
        }

        $columnList = (array) $columns;
        foreach ($columnList as $col) {
            if (!Schema::hasColumn($table, $col)) {
                return;
            }
        }

        $existingIndexes = array_map('strtolower', Schema::getIndexListing($table));
        $expectedName = strtolower($indexName ?? ($table . '_' . implode('_', $columnList) . '_index'));

        if (!in_array($expectedName, $existingIndexes, true)) {
            Schema::table($table, function (Blueprint $tableBlueprint) use ($columns, $expectedName) {
                $tableBlueprint->index($columns, $expectedName);
            });
        }
    }

    /**
     * Helper para eliminar índices de forma segura.
     */
    protected function dropIndexSafely(string $table, string|array $columns, ?string $indexName = null): void
    {
        if (!Schema::hasTable($table)) {
            return;
        }

        $columnList = (array) $columns;
        $existingIndexes = array_map('strtolower', Schema::getIndexListing($table));
        $expectedName = strtolower($indexName ?? ($table . '_' . implode('_', $columnList) . '_index'));

        if (in_array($expectedName, $existingIndexes, true)) {
            Schema::table($table, function (Blueprint $tableBlueprint) use ($expectedName) {
                $tableBlueprint->dropIndex($expectedName);
            });
        }
    }
};
