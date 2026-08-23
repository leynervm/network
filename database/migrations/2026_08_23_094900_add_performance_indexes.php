<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Networks indexes
        Schema::table('networks', function (Blueprint $table) {
            $table->index('type');
            $table->index('ubigeo_id');
            $table->index('status');
            $table->index('client_id');
            $table->index('date');
        });

        // Recibos indexes
        Schema::table('recibos', function (Blueprint $table) {
            $table->index('date');
            $table->index('month');
            $table->index('network_id');
            $table->index('client_id');
            $table->index('seriepago_id');
        });

        // Clients indexes (optional but helpful)
        Schema::table('clients', function (Blueprint $table) {
            $table->index('name');
            $table->index('document');
        });

        // Payments indexes
        Schema::table('payments', function (Blueprint $table) {
            $table->index('recibo_id');
            $table->index('created_at');
        });

        // OLT ports single‑column index
        Schema::table('olt_ports', function (Blueprint $table) {
            $table->index('olt_id');
        });

        // Spliter ports single‑column index
        Schema::table('spliter_ports', function (Blueprint $table) {
            $table->index('spliter_id');
        });

        // Portboxnavs optional searchable columns
        Schema::table('portboxnavs', function (Blueprint $table) {
            $table->index('alias');
            $table->index('direccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('networks', function (Blueprint $table) {
            $table->dropIndex(['type']);
            $table->dropIndex(['ubigeo_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['client_id']);
            $table->dropIndex(['date']);
        });

        Schema::table('recibos', function (Blueprint $table) {
            $table->dropIndex(['date']);
            $table->dropIndex(['month']);
            $table->dropIndex(['network_id']);
            $table->dropIndex(['client_id']);
            $table->dropIndex(['seriepago_id']);
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['document']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['recibo_id']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('olt_ports', function (Blueprint $table) {
            $table->dropIndex(['olt_id']);
        });

        Schema::table('spliter_ports', function (Blueprint $table) {
            $table->dropIndex(['spliter_id']);
        });

        Schema::table('portboxnavs', function (Blueprint $table) {
            $table->dropIndex(['alias']);
            $table->dropIndex(['direccion']);
        });
    }
};
