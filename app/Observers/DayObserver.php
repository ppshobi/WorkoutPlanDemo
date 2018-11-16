<?php

namespace App\Observers;

use App\Day;
use App\Mail\PlanUpdated;
use Illuminate\Support\Facades\Mail;

class DayObserver
{
    /**
     * Handle the day "updated" event.
     *
     * @param  \App\Day  $day
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
