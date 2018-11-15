<?php

namespace App\Observers;

use App\ExerciseInstance;
use App\Mail\PlanUpdated;
use Illuminate\Support\Facades\Mail;

class ExerciseInstanceObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(ExerciseInstance $exerciseInstance)
    {
        foreach ($exerciseInstance->day->plan->users as $user) {
            Mail::to($user)
                ->send(new PlanUpdated($user));
        }
    }
}
