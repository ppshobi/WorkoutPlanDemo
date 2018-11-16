<?php

namespace App\Http\Controllers;

use App\ExerciseInstance;
use App\Mail\PlanUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $this->sendNotificationMail($request->exercises[0]);

        return ExerciseInstance::where('day_id', $request->dayId)->get();
    }

    public function delete($dayId, $exerciseId)
    {
        return ExerciseInstance::where('day_id', $dayId)->where('exercise_id', $exerciseId)->delete();
    }

    private function sendNotificationMail($exercise)
    {
        if($exercise) {
            $exerciseInstance = ExerciseInstance::where('day_id', $exercise['day_id'])
                                                ->where('exercise_id', $exercise['id'])
                                                ->first();
            if($exerciseInstance) {
                foreach ($exerciseInstance->day->plan->users as $user) {
                    Mail::to($user)
                        ->send(new PlanUpdated($user));
                }
            }
        }

    }
}
