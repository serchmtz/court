<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'team_id' => $faker->randomDigitNotNull,
        'player_id' => $faker->randomDigitNotNull,
    ];
});
