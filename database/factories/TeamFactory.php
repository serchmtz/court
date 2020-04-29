<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'atpPoints' => $faker->numberBetween($min = 1000, $max = 9000),
        'category' => $faker->randomElement($array = array (
            'Male',
            'Female',
            'Mixed'
        )),
    ];
});
