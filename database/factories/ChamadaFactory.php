<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chamada>
 */
class ChamadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dataChamada' => $this->faker->date,
            'horaChamada' => $this->faker->time,
            'chamada_tipo_id' => 1,
            'categoria_id' => 1,
            'user_id' => 3,
            'finalizada' => $this->faker->boolean
        ];
    }
}
