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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('modelo')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->unsignedDecimal('pricebuy', 18, 2)->nullable();
            $table->unsignedDecimal('pricesale', 18, 2)->nullable();
            $table->string('unit', 5)->nullable();
            $table->unsignedDecimal('stock', 18, 2);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->on('marcas')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
