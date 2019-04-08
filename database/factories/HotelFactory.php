<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->company,
        'body' => $faker->text($maxNbChars = 500, $variableNbWords = true),
        'city' => $faker->city,
        'country' => $faker->country,
        'stars' => $faker->biasedNumberBetween($min = 1, $max = 6, $function = 'sqrt'),
        'image' => $faker->imageUrl($width = 900, $height = 400, 'city')
    ];
});
