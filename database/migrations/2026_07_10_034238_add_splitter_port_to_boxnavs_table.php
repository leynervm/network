<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('boxnavs', function (Blueprint $table) {
            $table->unsignedInteger('splitter_port')->nullable()->after('spliter_id');
        });

        // Populate existing boxnavs
        $spliters = \App\Models\Spliter::with('boxnavs')->get();
        foreach ($spliters as $spliter) {
            foreach ($spliter->boxnavs as $index => $boxnav) {
                $port = $index + 1;
                $codeParts = explode('-', $boxnav->code);
                $lastPart = end($codeParts);
                if (is_numeric($lastPart) && (int)$lastPart >= 1 && (int)$lastPart <= $spliter->outs) {
                    $port = (int)$lastPart;
                }
                \Illuminate\Support\Facades\DB::table('boxnavs')
                    ->where('id', $boxnav->id)
                    ->update(['splitter_port' => $port]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boxnavs', function (Blueprint $table) {
            $table->dropColumn('splitter_port');
        });
    }
};
