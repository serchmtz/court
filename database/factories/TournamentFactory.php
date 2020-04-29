<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tournament;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'date' => $faker->iso8601($max = 'now'),
        'category' => $faker->randomElement($array = array (
            'Male',
            'Female',
            'Mixed'
        )),
        'competition' => $faker->randomElement($array = array (
            'Singles',
            'Doubles'
        )),
        'nRounds' => $faker->numberBetween($min = 4, $max = 6),
        'location' => $faker->city,                             
    ];
});
