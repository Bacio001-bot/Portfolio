<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'notes' => $this->faker->text(),
            'date' => $this->faker->dateTimeBetween($startDate = '-1 days', $endDate = '+3 days'),
            'time' => $this->faker->time(),

        ];
    }
}
