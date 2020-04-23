<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Property::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(5),
        'bedrooms' => $faker->randomNumber(1),
        'bathrooms' => $faker->randomNumber(1),
        'storeys' => $faker->randomNumber(1),
        'garages' => $faker->randomNumber(1),
    ];
});
