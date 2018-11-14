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
           'users' =>  User::paginate(10),
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
            'email'      => 'required|email',
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
    public function show(User $user)
    {

    }
}
