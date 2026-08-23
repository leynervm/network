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
        Schema::create('ubigeos', function (Blueprint $table) {
            $table->id();
            $table->string('ubigeo_reniec', 6);
            $table->string('ubigeo_inei', 6);
            $table->string('departamento_inei', 100);
            $table->string('departamento', 100);
            $table->string('provincia_inei', 4);
            $table->string('provincia', 100);
            $table->string('distrito', 100);
            $table->string('region', 100);
            // $table->string('macroregion_inei', 100);
            // $table->string('macroregion_minsa', 100);
            // $table->string('iso_3166_2', 6);
            // $table->string('fips', 4);
            $table->string('superficie', 255)->nullable();
            $table->string('altitud', 12)->nullable();
            $table->string('latitud', 255)->nullable();
            $table->string('longitud', 255)->nullable();
            // $table->string('Frontera', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubigeos');
    }
};
