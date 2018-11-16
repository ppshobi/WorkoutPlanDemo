<?php

namespace App\Http\Controllers;

use App\ExerciseInstance;
use Illuminate\Http\Request;

class ExerciseInstanceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->exercises as $exercise) {
            ExerciseInstance::updateOrCreate([
                'day_id'      => $exercise['day_id'],
                'exercise_id' => $exercise['id'],
            ],[
                'order' => 1,
                'duration' => $exercise['duration'],
            ]);
        }

        return ExerciseInstance::where('day_id', $request->dayId)->get();
    }

    public function delete($dayId, $exerciseId)
    {
        return ExerciseInstance::where('day_id', $dayId)->where('exercise_id', $exerciseId)->delete();
    }
}
