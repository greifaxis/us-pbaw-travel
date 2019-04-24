<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        return view('user.profile');
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
        $user = Auth::user();
        return view('user.profile', compact('user'));
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
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'firstName' => 'required|string|max:255,firstName,' . Auth::id(),
            'lastName' => 'required|string|max:255,lastName,' . Auth::id(),
            'company' => 'nullable|string|max:255',
            'nipnum' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255,phone,' . Auth::id(),
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->email = $request->get('email');
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->company = $request->get('company');
        $user->nipnum = $request->get('nipnum');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->save();

        return redirect('/user')->with('success', 'Profile updated!');
//                    Rule::unique('users')->ignore($user->id)
        /*        $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->password = $request->get('password');
                $user->firstName = $request->get('firstName');
                $user->lastName = $request->get('lastName');
                $user->company = $request->get('company');
                $user->nipnum = $request->get('nipnum');
                $user->phone = $request->get('phone');
                $user->address = $request->get('address');
                $user->save();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Profile updated!');
    }
}
