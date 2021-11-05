<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'company_id' => Company::factory(),
            'company' => $this->faker->word(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
