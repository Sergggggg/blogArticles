<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'article' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'user_id' => rand(1, 9),
        ];
    }
}
