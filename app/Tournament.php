<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function inscriptions()
    {
        return $this->hasMany('App\Inscription');
    }
    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
