<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->date('vencimiento');
            $table->string('seriecompleta', 13)->unique();
            $table->char('month', 7);
            $table->unsignedDecimal('amount', 12, 2);
            $table->unsignedDecimal('descuento', 12, 2);
            $table->unsignedDecimal('total', 12, 2);
            $table->char('status', 1)->default(0);
            $table->unsignedTinyInteger('seriepago_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('network_id')->nullable();
            $table->foreign('seriepago_id')->on('seriepagos')->references('id');
            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreign('network_id')->on('networks')->references('id')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibos');
    }
};
