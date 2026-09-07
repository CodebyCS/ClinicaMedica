<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Doctor;
use App\Patient;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [

        'appointment_date' => $faker->dateTimeBetween('-6 months', '+6 months'),

        // Notas clínicas fictícias
        'clinical_notes' => $faker->paragraph(3),

        //Escolhe um medico ja guardado na base de dados
        'doctor_id' => Doctor::inRandomOrder()->first()->id,

        //Escolhe um paciente ja guardado na base de dados
        'patient_id' => Patient::inRandomOrder()->first()->id,

    ];
});
