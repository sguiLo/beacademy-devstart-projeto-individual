<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'photo' => fake()->image('public/storage/jogadores', 640, 480, null, true),
            'birth_date' => fake()->dateTimeThisCentury()->format('d-m-Y'),
            'shirt' => fake()->numberBetween(1, 20),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'position' => fake()->randomElement(['Goleiro', 'Defensor', 'Meio-campista', 'Atacante']),
            'salary' => fake()->randomNumber(8),
        ];
    }
}
