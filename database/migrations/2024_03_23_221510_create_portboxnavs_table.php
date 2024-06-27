<?php

use App\Models\Portboxnav;
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
        Schema::create('portboxnavs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->char('status', 1)->default(Portboxnav::DISPONIBLE);
            $table->unsignedBigInteger('boxnav_id');
            $table->foreign('boxnav_id')->on('boxnavs')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portboxnavs');
    }
};
