<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class ManutencaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descricao' => fake()->regexify('[A-Z]{1}[a-z]{1,10}'),
            'data' => fake()->date(),
            'valor' => fake()->randomFloat(2, 0, 10000),
            'id_veiculo' => fake()->numberBetween(1, 6),
        ];
    }
}
