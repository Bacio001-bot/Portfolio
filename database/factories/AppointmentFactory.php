<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'agenda_id' => Agenda::factory(),
            'client_id' => Client::factory(),
            'treatment_id' => Treatment::factory(),
        ];
    }
}
