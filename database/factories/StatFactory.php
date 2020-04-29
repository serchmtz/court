<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stat;
use Faker\Generator as Faker;

$factory->define(Stat::class, function (Faker $faker) {
    return [
        'match_id'=> $faker->randomDigitNotNull,
        'acesP1'=> $faker->numberBetween($min = 1, $max = 10),
        'acesP2'=> $faker->numberBetween($min = 1, $max = 10),
        'doubleFaultP1'=> $faker->numberBetween($min = 1, $max = 5),
        'doubleFaultP2'=> $faker->numberBetween($min = 1, $max = 5),
        'firstServicePercentageP1'=> $faker->numberBetween($min = 10, $max = 90),
        'firstServicePercentageP2'=> $faker->numberBetween($min = 10, $max = 90),
        'servicePointsWonP1'=> $faker->numberBetween($min = 10, $max = 20),
        'servicePointsWonP2'=> $faker->numberBetween($min = 10, $max = 20),
        'tiebreaksWonP1'=> $faker->numberBetween($min = 1, $max = 10),
        'tiebreaksWonP2'=> $faker->numberBetween($min = 1, $max = 10),
        'serverGamesWonP1'=> $faker->numberBetween($min = 1, $max = 10),
        'serverGamesWonP2'=> $faker->numberBetween($min = 1, $max = 10),
    ];
});
