<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atleta>
 */
class ResponsavelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomeCompleto' => $this->faker->name,
            'dataNascimento' => $this->faker->date,
            'cpf' => $this->faker->numberBetween(14, 15),
            'rg' => $this->faker->numberBetween(14, 15),
            'user_id' => 3,
            'ativo' => $this->faker->boolean
        ];
    }
}
