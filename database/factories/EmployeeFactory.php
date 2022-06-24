<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstNameMale(),   
            'infix' => $this->faker->suffix(),  
            'lastname' => $this->faker->lastName(),            
            'email' => $this->faker->email(),
            'company_id' => Company::all()->random(),   
            'phonenumber' => $this->faker->phoneNumber(),
        ];
    }
}
