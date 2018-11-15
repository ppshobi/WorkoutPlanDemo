<?php

namespace App\Providers;

use App\Day;
use App\Plan;
use App\User;
use App\ExerciseInstance;
use App\Observers\DayObserver;
use App\Observers\PlanObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\ExerciseInstanceObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Plan::observe(PlanObserver::class);
        Day::observe(DayObserver::class);
        ExerciseInstance::observe(ExerciseInstanceObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
