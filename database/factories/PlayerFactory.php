<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomDigitNotNull,
        'name' => $faker->name,
        'country' => $faker->country,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        'atpPoints' => $faker->numberBetween($min = 1000, $max = 9000),
        'photo' =>$faker->text($maxNbChars = 200),
        'sex' => $faker->randomElement($array = array (
            'M',
            'F',
        )),

    ];
});
