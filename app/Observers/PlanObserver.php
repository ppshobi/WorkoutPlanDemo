<?php

namespace App\Observers;

use App\Mail\PlanAssigned;
use App\Mail\PlanUpdated;
use App\User;
use Illuminate\Support\Facades\Mail;

class PlanObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
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
