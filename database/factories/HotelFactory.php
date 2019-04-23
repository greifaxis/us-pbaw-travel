<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    $imageURL = 'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('####') . '&hotel';
    return [
        'name' => ucfirst($faker->word()) . ' ' . ucfirst($faker->unique()->firstNameFemale()),
        'body' => $faker->text($maxNbChars = 500, $variableNbWords = true),
        'city' => $faker->unique()->city,
        'country' => $faker->unique()->country,
        'stars' => $faker->biasedNumberBetween($min = 1, $max = 6, $function = 'sqrt'),
//        'image' => $faker->imageUrl($width = 900, $height = 400, 'city'),
        'image' => $imageURL,
    ];
});
