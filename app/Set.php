<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function match()
    {
        return $this->belongsTo('App\Match');
    }
}
