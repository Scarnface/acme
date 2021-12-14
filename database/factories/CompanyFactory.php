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
            'name' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->email(),
            'logo' => 'logos\logoipsum-logo-8.svg',
            'website' => 'https://' . $this->faker->unique()->domainName(),
        ];
    }
}
