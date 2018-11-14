<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function show(Plan $plan)
    {
        dd($plan);
    }

    public function create()
    {
        $exercises = Exercise::all();

        $plan = Plan::create([
            'name' => 'Unnamed Plan',
            'description'=> '',
            'difficulty' => 1,
        ]);

        return view('plans.create', compact('exercises','plan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
        ]);

        $plan = (new Plan)->fill($request->all());
        $plan->save();

        session()->flash('success', 'Plan Saved Successfully');
        return redirect('plans');
    }
}
