<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Offer;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::where('places_free', '>', 0)->get();
        $offersFull = Offer::where('places_free', '<=', 0)->get();
        $best_offers = Offer::where('places_free', '>', 0)->orderBy('places_free', 'asc')->take(3)->get();
//        $best_offers_images = Offer::where('places_free','>',0)->orderBy('places_free','asc')->take(3)->pluck('images')->toArray();
        $hotels = Hotel::all();

        return view('guest.tours', compact('offers', 'hotels', 'best_offers','offersFull'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Offer::class);
        return view('admin.addoffer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Offer::class);
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale' => '',
            'date_begin'=>'required|date',
            'date_end'  => 'required|date',
            'highlight' => 'required|max:255',
            'body' => 'required|max:1000',
            'places_max' => 'required|max:100',
            'places_free' => 'required|max:100',
            'airport' => 'required|max:255',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
            'image5' => 'required',
            'hotel_id' => 'required|max:255'
        ]);
        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->price = $request->input('price');
        $offer->sale = $request->input('sale');
        $offer->date_begin = $request->input('date_begin');
        $offer->date_end = $request->input('date_end');
        $offer->highlight = $request->input('highlight');
        $offer->body = $request->input('body');
        $offer->places_max = $request->input('places_max');
        $offer->places_free = $request->input('places_free');
        $offer->airport = $request->input('airport');
        $offer->images = json_encode([
            $request->input('image1'),
            $request->input('image2'),
            $request->input('image3'),
            $request->input('image4'),
            $request->input('image5'),
        ],JSON_FORCE_OBJECT);
        $offer->hotel_id = $request->input('hotel_id');
        $offer->save();

        return redirect()->back()->with('success', 'Offer Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('auth.showtours', ['offer' => Offer::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('admin.editoffer', compact('offer'));
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
        if(!($request->input('isBasket'))){
            $this->validate($request, [
                'name' => 'required|max:255',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'sale' => '',
                'date_begin'=>'required|date',
                'date_end'  => 'required|date',
                'highlight' => 'required|max:255',
                'body' => 'required|max:1000',
                'places_max' => 'required|max:100',
                'places_free' => 'required|max:100',
                'airport' => 'required|max:255',
                'image1' => 'required',
                'image2' => 'required',
                'image3' => 'required',
                'image4' => 'required',
                'image5' => 'required',
                'hotel_id' => 'required|max:255'
            ]);
            $offer = Offer::find($id);
            $offer->name = $request->input('name');
            $offer->price = $request->input('price');
            $offer->sale = $request->input('sale');
            $offer->date_begin = $request->input('date_begin');
            $offer->date_end = $request->input('date_end');
            $offer->highlight = $request->input('highlight');
            $offer->body = $request->input('body');
            $offer->places_max = $request->input('places_max');
            $offer->places_free = $request->input('places_free');
            $offer->airport = $request->input('airport');
            $offer->images = json_encode([
                $request->input('image1'),
                $request->input('image2'),
                $request->input('image3'),
                $request->input('image4'),
                $request->input('image5'),
            ],JSON_FORCE_OBJECT);
            //$offer->images = $request->input('images');
            $offer->hotel_id = $request->input('hotel_id');
            $offer->save();
            return redirect()->back()->with('success', 'Offer Updated!');
        }else{
            $this->validate($request, [
                'quantity' => 'required|numeric',
            ]);
            $offer = Offer::find($id);
            $user = Auth::user();

            $basket = Basket::where('user_id',$user->id)->get();

            if($basket->isEmpty()){
//                dd($offer);
                $basket = new Basket;
                $basket->user_id = Auth::id();
                $basket->offer_id = $offer->id;
                $basket->quantity = $request->input('quantity');
                $basket->value = !($offer->sale) ? $request->input('quantity')*$offer->price : $request->input('quantity')*$offer->sale;
                $basket->save();

                $offer->places_free -= $request->input('quantity');
                $offer->save();

                return redirect()->back()->with('success', 'Added to basket!');

            }else{
            $basket = $basket->where('offer_id',$offer->id)->first();
//            dd($basket);
            if($basket){
                $basket->quantity += $request->input('quantity');
                $basket->value += !($offer->sale) ? $request->input('quantity')*$offer->price : $request->input('quantity')*$offer->sale;
                $basket->save();

                $offer->places_free -= $request->input('quantity');
                $offer->save();

                return redirect()->back()->with('success', 'Basked updated!');
            }else{
                $basket = new Basket;
                $basket->user_id = Auth::id();
                $basket->offer_id = $offer->id;
                $basket->quantity = $request->input('quantity');
                $basket->value = !($offer->sale) ? $request->input('quantity')*$offer->price : $request->input('quantity')*$offer->sale;
                $basket->save();

                $offer->places_free -= $request->input('quantity');
                $offer->save();

                return redirect()->back()->with('success', 'Added to basket!');
            }
            }

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

        public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();

        return redirect('/tours')->with('success', 'Tour has been deleted successfully');
    }

}
