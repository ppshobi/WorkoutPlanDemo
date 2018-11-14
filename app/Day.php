<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'plans_days';

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function exercises()
    {
        return $this->hasManyThrough(Exercise::class, ExerciseInstance::class);
    }
}
