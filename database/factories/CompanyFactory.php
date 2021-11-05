<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'email' => $this->faker->email(),
            'logo' => 'http://lorempixel.com/400/200/abstract/',
            'website' => $this->faker->url(),
        ];
    }
}
