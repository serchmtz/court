<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Set;
use Faker\Generator as Faker;

$factory->define(Set::class, function (Faker $faker) {
    $p1Score=$faker->numberBetween($min = 5, $max = 12);
    return [
        'match_id'=>$faker->randomDigitNotNull,
        'nSet' => $faker->numberBetween($min = 1, $max = 5),
        'player1Score'=> $p1Score,
        'player2Score'=> ($p1Score - 2),
        'tiebreak' => $faker->boolean,
    ];
});
