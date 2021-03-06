<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Day::where('plan_id', $request->plan_id)
                  ->with('exercises')
                  ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Day::create([
            'plan_id' => $request->plan_id,
            'name' => 'Day ' . (Day::where('plan_id', $request->plan_id)->count() + 1),
            'order' => 1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Day::find($id)->update(['name' => $request->name]);
        return response('Success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::find($id);
        $day->exercises()->delete();
        $day->delete();

        return response('Deleted Successfully', 200);
    }
}
