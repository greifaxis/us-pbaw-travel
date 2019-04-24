<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OfferOrder;
use App\Order;
use App\Offer;
use Faker\Generator as Faker;

$factory->define(OfferOrder::class, function (Faker $faker) {

    $offersWithPlaces = Offer::where('places_free','>=','1')->count();

    if($offersWithPlaces<=0)
    {
    do
    $offer = Offer::all()->random();
    while($offer->places_free <= 0);

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
