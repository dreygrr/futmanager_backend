<?php

namespace Database\Factories;

use App\Models\AtletaResponsavel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AtletaResponsavelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'atleta_id' => $this->faker->numberBetween(4, 3),
            'responsavel_id' => $this->faker->numberBetween(1, 3)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
