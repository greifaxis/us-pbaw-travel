<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $hotels = Hotel::orderBy('name','asc')->paginate(5);
        return view('pages.contact');
//            'hotels'=>$hotels,
//            'hotelsFirst'=>$hotelsFirst
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.contact');
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'email' => 'required|email|max:255',
            'areacode' => 'nullable|digits:2',
            'phone' => 'nullable|digits:9',
            'body' => 'required|max:1000'
        ]);
        $contact = new Contact;
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->phone = '+' . $request->input('areacode') . $request->input('phone');
        $contact->body = $request->input('body');
        $contact->save();

        return redirect()->back()->with('success', 'Message Send');
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
