<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OfferOrder;
use App\Order;
use App\Offer;
use Faker\Generator as Faker;

$factory->define(OfferOrder::class, function (Faker $faker) {

    $offersWithPlaces = Offer::where('places_free','>=','1');

    if($offersWithPlaces->count()<=0)
    {
    $offer = $offersWithPlaces->random();
    $order = Order::all()->random();
    $places = $faker->biasedNumberBetween($min = 0, $max = $offer->places_free, $function = 'Faker\Provider\Biased::linearLow');

    return [
        'offer_id' => $offer->id,
        'order_id' => $order->id,
        'places' => $places,
    ];
    }
    else{
        exit('No offers with empty places');
    }
});
