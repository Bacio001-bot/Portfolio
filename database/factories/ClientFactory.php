<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstNameMale(),   
            'infix' => $this->faker->suffix(),  
            'lastname' => $this->faker->lastName(),
            'phonenumber' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetName().' '.$this->faker->buildingNumber(),
            'postcode' => '5066AX',
        ];
    }
}
