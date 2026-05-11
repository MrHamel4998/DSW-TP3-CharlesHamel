<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CriticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score'     => fake()->randomFloat(1, 0, 100),
            'comment'   => fake()->text(100),
            'film_id'   => fake()->numberBetween(1,100)
        ];
    }
}