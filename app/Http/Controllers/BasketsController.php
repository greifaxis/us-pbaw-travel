<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use Illuminate\Support\Facades\Auth;

class BasketsController extends Controller
{
    public function index()
    {
        $baskets = Basket::where('user_id',Auth::id())->get();

//        dd($baskets);

        return view('user.basket', compact('baskets'));

    /*    $offers = Offer::where('places_free', '>', 0)->get();
        $offersFull = Offer::where('places_free', '<=', 0)->get();
        $best_offers = Offer::where('places_free', '>', 0)->orderBy('places_free', 'asc')->take(3)->get();
        $hotels = Hotel::all();

        return view('guest.tours', compact('offers', 'hotels', 'best_offers','offersFull'));*/
    }
}
