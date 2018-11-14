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
        $exercises = Exercise::all();
        $title = "Workout plan details";
        return view('plans.create', compact('exercises','plan', 'title'));
    }

    public function create()
    {
        $exercises = Exercise::all();
        $title = "Create a new workout plan";
        $plan = Plan::create([
            'name' => 'Unnamed Plan',
            'description'=> '',
            'difficulty' => 1,
        ]);

        return view('plans.create', compact('exercises','plan', 'title'));
    }

    public function update(Request $request, $planId)
    {
        Plan::where('id', $planId)->update([
            'name'        => $request->name,
            'description' => $request->description ?? '',
            'difficulty'  => $request->difficulty,
        ]);
    }
}
