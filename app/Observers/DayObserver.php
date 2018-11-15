<?php

namespace App\Observers;

use App\Mail\PlanUpdated;
use Illuminate\Support\Facades\Mail;

class DayObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(Day $day)
    {
        foreach ($day->plan->users as $user) {
            Mail::to($user)
                ->send(new PlanUpdated($user));
        }
    }
}
