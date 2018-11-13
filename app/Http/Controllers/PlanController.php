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
        return view('plans.create', compact('exercises'));
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
