<?php

namespace Database\Seeders;

use App\Models\FinishedAppointment;
use Illuminate\Database\Seeder;

class FinishedAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FinishedAppointment::factory()->count(5)->create();
    }
}
