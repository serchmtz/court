<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Match;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {
    $abandonedBool = $faker->boolean;
    return [
        'tournament_id' => $faker->randomDigitNotNull,
        'player1' => $faker->randomDigitNotNull,
        'player2' => $faker->randomDigitNotNull,
        'winner_id' => $faker->randomDigitNotNull,
        'round' => $faker->randomElement($array = array (
            'final',
            'semifinal',
            'quarters',
            'fourth',
            'third',
            'second',
            'first'
        )),
        'started_at' => $faker->iso8601($max = 'now'),
        'finished_at' => $faker->iso8601($max = 'now'),
        'abandoned' => $abandonedBool,
        'excuse' => $abandonedBool==true ? $faker->text($maxNbChars = 50)  : null,
    ];
});
