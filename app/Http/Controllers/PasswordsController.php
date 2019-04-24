<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PasswordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        return view('user.password', compact('user'));
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
        if (!(Hash::check($request->get('password_current'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Wrong current password!");
        }
        if (strcmp($request->get('password'), $request->get('password_current')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New password same as current!");
        }

        $this->validate($request, [
            'password_current' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255|same:password',
            'password_confirmed' => 'required|string|min:8|max:255|same:password',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect()->route('user.show', Auth::id())->with("success", "Password changed successfully!");
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
