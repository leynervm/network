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
        Schema::create('spliters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 4);
            $table->unsignedInteger('outs');
            $table->text('direccion')->nullable();
            $table->unsignedBigInteger('olt_id');
            $table->foreign('olt_id')->on('olts')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spliters');
    }
};
