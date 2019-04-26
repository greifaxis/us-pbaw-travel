<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use App\User;
use App\OrderStatus;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user = User::whereHas('role', function ($query) {$query->where('role', 'user');})->get()->random();

    $date_begin = $faker->dateTimeBetween($startDate = '-90 days', $endDate = 'now');
    $date_end_begin = clone $date_begin;
    $date_end_begin = $date_end_begin->modify('+30 minutes');
    $date_end_end = clone $date_end_begin;
    $date_end_end = $date_end_end->modify('+2 days');
    $date_end = $faker->dateTimeBetween($startDate = $date_end_begin, $endDate = $date_end_end);

    $statusId = $faker->biasedNumberBetween($min = 1, $max = OrderStatus::all()->max('id'), $function = 'Faker\Provider\Biased::linearLow');

    return [
        'billing_default' => true,
        'billing_firstName' => $user->firstName,
        'billing_lastName' => $user->lastName,
        'billing_company' => $user->company,
        'billing_nipnum' => $user->nipnum,
        'billing_phone' => $user->phone,
        'billing_address' => $user->address,
        'is_paid' => $statusId == 2 ? $faker->boolean(75) : ($statusId == 3 || $statusId == 6 ? true : false),
        'user_id' => $user->id,
        'status_id' => $statusId,
        'user_message' => $faker->optional(0.5)->text($maxNbChars = 500, $variableNbWords = true),
        'admin_answer' => $statusId >=3 ? $faker->optional(0.5)->text($maxNbChars = 255, $variableNbWords = true) : null,
        'placed_at' => $statusId >=2 ? $date_begin : null,
        'finished_at' =>  $statusId >=3 ? $date_end : null,
    ];
});
