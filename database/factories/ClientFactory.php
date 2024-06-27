<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'document' => $this->faker->randomNumber(8, true),
            'name' => $this->faker->name(),
            'direccion' => $this->faker->streetAddress(),
            'ubigeo_id' => null
        ];
    }
}
