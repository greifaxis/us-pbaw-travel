<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsed
     */
    public function index()
    {
        dd(Auth::user());
        $hotels = Hotel::orderBy('name', 'asc')->get();
        return view('pages.hotels', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Hotel::class);
        return view('admin.addhotel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Hotel::class);
        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'stars' => 'required',
            'image' => '',
            'body' => 'required|max:1000'
        ]);
        $hotel = new Hotel;
        $hotel->name = $request->input('name');
        $hotel->city = $request->input('city');
        $hotel->country = $request->input('country');
        $hotel->stars = $request->input('stars');
        $hotel->image = $request->input('image');
        $hotel->body = $request->input('body');
        $hotel->save();

        return redirect('/hotels/create')->with('success', 'Hotel Added!');
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
        $hotel = Hotel::find($id);
        return view('admin.edithotel', compact('hotel'));
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
//              $this->authorize('create', Hotel::class);

                $this->validate($request, [
                    'name' => 'required|max:255',
                    'city' => 'required|max:255',
                    'country' => 'required|max:255',
                    'stars' => 'required',
                    'image' => '',
                    'body' => 'required|max:1000'
                ]);

                $hotel = Hotel::find($id);
                $hotel->name = $request->get('name');
                $hotel->city = $request->get('city');
                $hotel->country = $request->get('country');
                $hotel->stars = $request->get('stars');
                $hotel->image = $request->get('image');
                $hotel->body = $request->get('body');
                $hotel->save();

                return redirect()-> route("hotels.edit", $id)-> with('success', 'Hotel has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect('/hotels')->with('success', 'Hotel has been deleted successfully');
    }
}
