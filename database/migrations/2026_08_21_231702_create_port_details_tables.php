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
        Schema::create('olt_ports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('olt_id');
            $table->unsignedInteger('port_number');
            $table->string('alias')->nullable();
            $table->text('direccion')->nullable();
            $table->foreign('olt_id')->references('id')->on('olts')->cascadeOnDelete();
            $table->unique(['olt_id', 'port_number']);
        });

        Schema::create('spliter_ports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spliter_id');
            $table->unsignedInteger('port_number');
            $table->string('alias')->nullable();
            $table->text('direccion')->nullable();
            $table->foreign('spliter_id')->references('id')->on('spliters')->cascadeOnDelete();
            $table->unique(['spliter_id', 'port_number']);
        });

        Schema::table('portboxnavs', function (Blueprint $table) {
            $table->string('alias')->nullable();
            $table->text('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portboxnavs', function (Blueprint $table) {
            $table->dropColumn(['alias', 'direccion']);
        });
        Schema::dropIfExists('spliter_ports');
        Schema::dropIfExists('olt_ports');
    }
};
