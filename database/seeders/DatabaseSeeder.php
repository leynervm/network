<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'RED CENTER',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call(OltSeeder::class);
        $this->call(SeriepagoSeeder::class);
        $this->call(FormarpaySeeder::class);
        // $this->call(ClientSeeder::class);
        // $this->call(AntenaSeeder::class);
        // $this->call(NetworkSeeder::class);
        // $this->call(ReciboSeeder::class);
        // $this->call(PaymentSeeder::class);
    }
}
