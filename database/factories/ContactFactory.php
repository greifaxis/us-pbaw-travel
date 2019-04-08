<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'email' => $faker->safeEmail,
        'phone' => $faker->optional()->numerify('+###########'),
        'body' => $faker->text($maxNbChars = 200, $variableNbWords = true),
    ];
});
