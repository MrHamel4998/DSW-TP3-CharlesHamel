<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             => fake()->text(50),
            'release_year'      => fake()->year(),
            'length'            => fake()->numberBetween(100, 999),
            'description'       => fake()->text(100),
            'rating'            => fake()->text(5),
            'special_features'  => fake()->text(200),
            'image'             => fake()->text(40)
        ];
    }
}


