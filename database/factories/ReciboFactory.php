<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Seriepago;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recibo>
 */
class ReciboFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $seriepago = Seriepago::all()->random();
        $amount = $this->faker->numerify('###');
        $numeracion = $this->faker->unique()->numberBetween(1, 200);

        return [
            'date' => $this->faker->date(),
            'seriecompleta' => $seriepago->serie . '-' . $numeracion,
            'month' => $this->faker->date('Y-m'),
            'amount' => $amount,
            'descuento' => 0,
            'total' => $amount,
            'status' => 0,
            'seriepago_id' => $seriepago->id,
            'client_id' => Client::all()->random()->id,
        ];
    }
}
