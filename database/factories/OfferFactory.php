<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    /*
                $table->bigIncrements('id');
                $table->string('name');
                $table->unsignedDecimal('price');
                $table->unsignedDecimal('sale')->nullable();
                $table->date('date_begin');
                $table->date('date_end');
                $table->string('highlight')->nullable();
                $table->text('body')->nullable();
                $table->unsignedInteger('places_max')->nullable();
                $table->unsignedInteger('places_free')->nullable();
                $table->string('airport')->nullable();
                $table->string('images')->nullable();
                $table->unsignedBigInteger('hotel_id');
                $table->timestamps();
    */
    $price = $faker->randomNumber($nbDigits = 2, $strict = true) * 100 + 99;
    $sale = $faker->boolean($chanceOfGettingTrue = 40) ? $faker->numberBetween($min = $price * 0.5, $max = $price * 0.9) + 0.99 : null;

    $place_max = $faker->numberBetween($min = 20, $max = 80);

    $date_begin = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year');
    $date_end_begin = clone $date_begin;
    $date_end_begin = $date_end_begin->modify('+10 days');
    $date_end_end = clone $date_end_begin;
    $date_end_end = $date_end_end->modify('+30 days');
    $date_end = $faker->dateTimeBetween($startDate = $date_end_begin, $endDate = $date_end_end);

//    $imageURL = 'https://source.unsplash.com/900x400/?sig='.$faker->unique()->numerify('###').'&travel';

    $images = array(
        'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('###') . '&vacation',
        'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('###') . '&trip',
        'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('###') . '&travel',
        'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('###') . '&landscape',
        'https://source.unsplash.com/900x400/?sig=' . $faker->unique()->numerify('###') . '&hotel',
    );

    $hotel = \App\Hotel::inRandomOrder()->first();

    return [
        'name' => $faker->cityPrefix() . ' ' . ucfirst($faker->unique()->word()) . ' ' . $hotel->country,
        'price' => $price,
        'sale' => $sale,
        'date_begin' => $date_begin->format('Y-m-d'),
        'date_end' => $date_end->format('Y-m-d'),
        'highlight' => $faker->sentence($nbWords = 10, $variableNbWords = false),
        'body' => $faker->text($maxNbChars = 800, $variableNbWords = true),
        'places_max' => $place_max,
//        'places_free' => $faker->biasedNumberBetween($min = 0, $max = $place_max - 3, $function = 'Faker\Provider\Biased::linearLow'),
        'places_free' => $place_max,
        'airport' => $faker->randomElement($array = array(
            'Chopin, Warsaw',
            'Lech Walesa, Gdansk',
            'Balice, Krakow',
            'Tempelhof, Berlin',
        )),
        'images' => json_encode($images, JSON_FORCE_OBJECT),
        'hotel_id' => $hotel->id,
    ];
});
