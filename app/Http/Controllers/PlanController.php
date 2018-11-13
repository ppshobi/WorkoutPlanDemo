<?php

namespace App\Http\Controllers;

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
        return view('plans.create');
    }

    public function store(Request $request)
    {

    }
}
