<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Appointment::class, 30)->create()
            ->each(function ($appointment) {
                $medicationIds = \App\Medication::inRandomOrder()
                    ->take(random_int(1, 4))
                    ->pluck('id')
                    ->all();

                $appointment->medications()->attach($medicationIds);
            });
    }
}
