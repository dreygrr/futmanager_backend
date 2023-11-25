<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atleta>
 */
class AtletaFactory extends Factory
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
            'apelido' => $this->faker->word,
            'dataNascimento' => $this->faker->date,
            'idade' => $this->faker->numberBetween(14, 15),
            'genero' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'posicao' => $this->faker->randomElement(['Atacante', 'Meio-Campo', 'Zagueiro', 'Goleiro']),
            'peso' => $this->faker->randomFloat(2, 50, 100),
            'altura' => $this->faker->randomFloat(2, 1.50, 2.00),
            'nomeUniforme' => $this->faker->word,
            'numeroUniforme' => $this->faker->numberBetween(1, 40),
            'tamanhoUniforme' => $this->faker->randomElement(['P', 'M', 'G']),
            'numeroCalcado' => $this->faker->numberBetween(35, 45),
            'caminhoImagem' => $this->faker->imageUrl(),
            'user_id' => 3,
            'categoria_id' => 4,
            'ativo' => $this->faker->boolean,
        ];
    }
}
