<?php

namespace App\Http\Controllers;

use App\Offer;
use App\OfferOrder;
use App\OrderStatus;
use App\User;
use Illuminate\Http\Request;


class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $admins = Role::with('users')->where('role','admin')->get();

/*        $admins = User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->pluck('email')->toArray();
        */

        $admins = OrderStatus::all();
        $admins = $admins->max('id');

//        dd(json_decode($admins));
//        dd($admins);

//        $offers1 = Offer::where('places_free','>=','1')->get();

        $offers = Offer::all()->sum('places_max');
        $offersWithPlaces = Offer::all()->sum('places_free');
        $ordersSum = OfferOrder::all()->sum('quantity');

        return view('guest.database', compact('admins','offers','offersWithPlaces','ordersSum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}