<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'placa' => fake()->unique()->regexify('[A-Z]{3}[0-9]{1}[A-Z]{1}[0-9]{2}'),
            'modelo' => fake()->regexify('[A-Z]{1}[a-z]{1,10}'),
            'marca' => fake()->randomElement(['Chevrolet', 'Fiat', 'Ford', 'Honda', 'Hyundai', 'Jeep', 'Kia', 'Mitsubishi', 'Nissan', 'Peugeot', 'Renault', 'Toyota', 'Volkswagen']),
            'cor' => fake()->randomElement(['Branco', 'Preto', 'Prata', 'Vermelho', 'Azul', 'Verde', 'Amarelo', 'Cinza', 'Marrom', 'Rosa', 'Laranja', 'Roxo']),
            'versao' => fake()->numberBetween(1990, 2021),
            'id_user' => fake()->numberBetween(1, 2),
        ];
    }
}
