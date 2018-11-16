<?php

namespace App\Observers;

use App\Plan;
use App\Mail\PlanUpdated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PlanObserver
{
    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Plan  $plan
     * @return void
     */
    public function updated(Plan $plan)
    {
        foreach ($plan->users as $user) {
            Mail::to($user)
                ->send(new PlanUpdated($user));
        }
    }
}
