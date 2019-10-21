<?php

namespace App\Http\Controllers;

use App\OfferOrder;
use App\Order;
use Illuminate\Http\Request;
use App\Basket;
use App\Offer;
use Illuminate\Support\Facades\Auth;

class BasketsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $baskets = Basket::where('user_id', Auth::id())->get();

        return view('user.basket', compact('baskets', 'user'));
    }

    public function destroy($id)
    {
        $basket = Basket::find($id);
        $offer = Offer::find($basket->offer_id);
        $offer->places_free += $basket->quantity;
        $offer->save();
        $basket->delete();
        $baskets = Basket::where('user_id', Auth::id())->get();
        $user = Auth::user();

        return view('user.basket', compact('baskets', 'user'));
    }

    public function checkout(Request $request)    {
        if (Basket::where('user_id', Auth::id())->get()->isNotEmpty()) {
            $this->validate($request, [
                'firstNameBilling' => 'required|string|max:255,firstName',
                'lastNameBilling' => 'required|string|max:255,lastName',
                'companyBilling' => 'nullable|string|max:255',
                'nipnumBilling' => 'nullable|string|max:255',
                'phoneBilling' => 'required|string|max:255,phone',
                'addressBilling' => 'required|string|max:255',
                'messageBilling' => 'nullable|max:1000',
                'isDefaultBilling' => 'nullable|max:2'
            ]);
            $order = new Order();
            $order->user_id = Auth::id();
            $order->status_id = 2;
            $order->is_paid = false;
            $order->user_message = $request->get('messageBilling');
            $order->billing_default = $request->get('isDefaultBilling') ? true : false;
            $order->billing_firstName = $request->get('firstNameBilling');
            $order->billing_lastName = $request->get('lastNameBilling');
            $order->billing_company = $request->get('companyBilling');
            $order->billing_nipnum = $request->get('nipnumBilling');
            $order->billing_phone = $request->get('phoneBilling');
            $order->billing_address = $request->get('addressBilling');
            $order->placed_at = date('Y-m-d H:i:s');
            $order->save();
            while (Basket::where('user_id', Auth::id())->get()->isNotEmpty()) {
                $basket = Basket::where('user_id', Auth::id())->first();
                $offerorder = new OfferOrder();
                $offerorder->offer_id = $basket->offer_id;
                $offerorder->order_id = $order->id;
                $offerorder->quantity = $basket->quantity;
                $offerorder->value = $basket->value;
                $offerorder->save();
                $basket->delete();
            }
            $offers = $order->offers()->get();
            return view('user.checkout', compact('order', 'offers'))->with('success', 'Order placed!');
        } else {
            return redirect()->back()->with('error', 'Your basket is empty!');
        }
    }
}
