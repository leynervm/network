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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('code', 12)->unique()->nullable();
            $table->string('portnumber')->nullable();
            $table->text('descripcion');
            $table->string('type');
            $table->unsignedDecimal('price', 12, 2);
            $table->text('direccion');
            $table->char('status', 1)->default(0);
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('ubigeo_id')->nullable();
            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreign('ubigeo_id')->on('ubigeos')->references('id');
            $table->unsignedBigInteger('networkable_id')->nullable();
            $table->string('networkable_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('networks');
    }
};
