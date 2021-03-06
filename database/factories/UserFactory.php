<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'role' => $faker->randomElement($array = array (
            'Global Admin',
            'Tournament Manager',
            'Secretary',
            'Player',
            'Results Capturer'
        )),
        'email_verified_at' => date("Y-m-d H:i:s"),
        'status' =>$faker->randomElement($array = array (
            'active',
            'inactive'
        )),
        'password' => '12345678', 
        'remember_token' => Str::random(10),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];
});
