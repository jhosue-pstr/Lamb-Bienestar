<?php

namespace Database\Factories;

use App\Models\Beca;
use App\Models\TipoBeca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beca>
 */
class BecaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Beca::class;
    public function definition(): array
    {
        return [
            'idTipoBeca' => TipoBeca::inRandomOrder()->first()->id, // Asigna un TipoBeca aleatorio
        ];
    }
}
