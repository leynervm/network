<?php

namespace Database\Seeders;

use App\Models\Formapay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormarpaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formapay::create([
            'name' => 'EFECTIVO'
        ]);

        Formapay::create([
            'name' => 'TRANSFERENCIA',
            'type' => Formapay::TRANSFERENCIA
        ]);

        Formapay::create([
            'name' => 'YAPE',
            'type' => Formapay::TRANSFERENCIA
        ]);
    }
}
