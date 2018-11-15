<?php

namespace App\Observers;

use App\Mail\PlanAssigned;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if($user->plan){
            Mail::to($user->email)->send(new PlanAssigned($user));
        }
    }
}
