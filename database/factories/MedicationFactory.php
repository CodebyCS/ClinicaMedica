<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medication;
use Faker\Generator as Faker;

$factory->define(Medication::class, function (Faker $faker) {
    $activeIngredients = [
        'Paracetamol',
        'Ibuprofeno',
        'Amoxicilina',
        'Omeprazol',
        'Metformina',
        'Atorvastatina',
        'Loratadina',
        'Diclofenac',
    ];

    return [
        'name' => ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3),
        'active_ingredient' => $faker->randomElement($activeIngredients),
        'laboratory_id' => \App\Laboratory::inRandomOrder()->first()->id,
    ];
});
