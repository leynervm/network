<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Red Center',
                'password' => bcrypt('12345678'),
            ],
        );

        User::updateOrCreate(
            [
                'email' => 'eliceo@gmail.com',
            ],
            [
                'name' => 'Eliceo',
                'password' => bcrypt('12345678'),
            ],
        );
    }
}
