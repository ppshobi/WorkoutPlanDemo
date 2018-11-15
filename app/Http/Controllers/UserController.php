<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')->with([
           'users' =>  User::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('user.create')->with([
            'plans' => Plan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'plan_id'    => $request->plan_id,
            'password'   => Hash::make('secret'),
        ]);

        session()->flash('alert-success', 'User Created Successfully');
        return redirect('/users');
    }

    public function update(Request $request, $userId)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
        ]);

        User::where('id', $userId)->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'plan_id'    => $request->plan_id,
        ]);

        session()->flash('alert-success', 'User Updated Successfully');
        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('user.edit')->with([
            'user' => $user,
            'plans' => Plan::all(),
        ]);
    }
    public function show(User $user)
    {

    }

    public function destroy(Request $request, $user)
    {
        User::destroy([$user]);
        session()->flash('alert-success', 'User Deleted Successfully');
        return redirect()->back();
    }
}
