<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OfferOrder;
use App\Order;
use App\Offer;
use App\OrderStatus;
use Faker\Generator as Faker;

$factory->define(OfferOrder::class, function (Faker $faker) {
    $val = $faker->numberBetween($min = 1, $max = 100);
    if(empty(Order::find($val))){
        $order = factory(Order::class)->create();
    }
    else{
        $order = Order::find($val);
    }
    $offersWithPlaces = Offer::where('places_free','>=','1')->get();

    if($offersWithPlaces->count()>0)
    {
            do
                $offer = $offersWithPlaces->find($faker->biasedNumberBetween($min = 1, $max = $offersWithPlaces->max('id'), $function = 'Faker\Provider\Biased::linearLow'));
            while(empty($offer));
    //TODO OFFER GENERATOR
    $places = $faker->biasedNumberBetween($min = 1, $max = ceil($offer->places_free/4), $function = 'Faker\Provider\Biased::linearLow');

/*    $offer->places_free = $offer->places_free-$places;
    $offer->save();
    $order->total += isset($offer->sale) ? $places*$offer->sale : $places*$offer->price;;
    $order->save();*/

    return [
        'offer_id' => $offer->id,
        'order_id' => $order->id,
        'quantity' => $places,
    ];
    }
    else{
        exit('No offers with empty places');
    }
});
