<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,

        'sns_number' => $faker->unique()->numerify('#########'),
        'birth_date' => $faker->dateTimeBetween('-90 years', '-1 year')->format('Y-m-d'),
    ];
});
