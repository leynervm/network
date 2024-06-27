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
        Schema::create('seriepagos', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned();
            $table->string('descripcion');
            $table->char('serie', 4)->unique();
            $table->unsignedInteger('contador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seriepagos');
    }
};
