<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseInstance extends Model
{
    protected $guarded = [];

    protected $appends = ['name'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function getNameAttribute()
    {
        return $this->exercise->name;
    }
}
