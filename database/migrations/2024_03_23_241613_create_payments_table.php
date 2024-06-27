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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->char('month', 7);
            $table->unsignedDecimal('amount', 12, 2);
            $table->string('codetransferencia')->nullable();
            $table->text('detalle')->nullable();
            $table->unsignedTinyInteger('formapay_id');
            $table->foreign('formapay_id')->on('formapays')->references('id');
            $table->unsignedInteger('paymentable_id');
            $table->string('paymentable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
