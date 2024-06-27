<?php

namespace Database\Seeders;

use App\Models\Seriepago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriepagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seriepago::create([
            'descripcion' => 'BOLETA DE VENTA',
            'serie' => 'B001',
            'contador' => 0,
        ]);

        Seriepago::create([
            'descripcion' => 'FACTURA DE VENTA',
            'serie' => 'F001',
            'contador' => 0,
        ]);
    }
}
