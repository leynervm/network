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
        Schema::create('boxnavs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 12);
            $table->unsignedTinyInteger('outs');
            $table->text('direccion')->nullable();
            $table->char('status', 1)->default(0);
            $table->unsignedBigInteger('spliter_id');
            $table->foreign('spliter_id')->on('spliters')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxnavs');
    }
};
