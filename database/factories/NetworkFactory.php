<?php

namespace Database\Factories;

use App\Models\Antena;
use App\Models\Boxnav;
use App\Models\Client;
use App\Models\Network;
use App\Models\Portboxnav;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Network>
 */
class NetworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $client = Client::all()->random();
        $portboxnav = Portboxnav::all()->random();
        // $portboxnav =  $boxnav->portboxnavs()->random();
        $antena = Antena::all()->random();
        $boxnavable = $this->faker->randomElement([$portboxnav, $antena]);

        return [
            'date' => $this->faker->date(),
            'code' => $boxnavable->code . $this->faker->bothify('-####'),
            'descripcion' => $this->faker->text(),
            'datepayment' => $this->faker->date(),
            'datevencimiento' => $this->faker->date(),
            'type' => $this->faker->randomElement([Network::FIBRA, Network::SATELITAL]),
            'price' => $this->faker->numerify('###'),
            'direccion' => $this->faker->streetAddress(),
            'status' => Network::ACTIVO,
            'client_id' => $client->id,
            'networkable_id' => $boxnavable->id,
            'networkable_type' => get_class($boxnavable),
        ];
    }
}
