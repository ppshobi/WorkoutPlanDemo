<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   protected $guarded = [];

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
