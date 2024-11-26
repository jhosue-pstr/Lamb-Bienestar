<?php

namespace Database\Factories;

use App\Models\EconomiaFamiliar;
use App\Models\Gasto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EconomiaFamiliar>
 */
class EconomiaFamiliarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = EconomiaFamiliar::class;

     public function definition()
     {
         return [
             'dependeEconomicamente' => $this->faker->word,
             'cuantosAportan' => $this->faker->numberBetween(1, 5),
             'quienesAportan' => $this->faker->word,
           //  'idGasto' => Gasto::factory(),  // Genera un gasto con la fábrica de Gasto
         ];
     }
}
