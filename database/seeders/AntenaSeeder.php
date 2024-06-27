<?php

namespace Database\Seeders;

use App\Models\Antena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antenas = Antena::factory(5)->create();
    }
}
