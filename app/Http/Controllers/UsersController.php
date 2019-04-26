<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Order;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {$query->where('role', 'user');})->get();
        $admins = User::whereHas('role', function ($query) {$query->where('role', 'admin');})->get();
        $orders = Order::with('offers')->get();

        return view('admin.showusers',compact('users','admins','orders'));
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
        $roles = Role::all()->pluck('description','role')->toArray();
        $user = User::find($id);
        $isOwner = $user->id == Auth::id() ? true : false;
        return view('user.profile', compact('user','roles','isOwner'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'firstName' => 'required|string|max:255,firstName,' . $id,
            'lastName' => 'required|string|max:255,lastName,' . $id,
            'company' => 'nullable|string|max:255',
            'nipnum' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255,phone,' . $id,
            'address' => 'required|string|max:255',
            'role' => 'required'
        ]);

        $user = User::find($id);

        $user->email = $request->get('email');
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->company = $request->get('company');
        $user->nipnum = $request->get('nipnum');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->role_id = Role::where('role',$request->get('role'))->first()->id;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
//                    Rule::unique('users')->ignore($user->id)
        /*        $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->passwords = $request->get('password');
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
        Auth::logout();
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
}
