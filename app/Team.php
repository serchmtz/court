<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function members()
    {
        return $this->hasMany('App\Member');
    }
    public function participant()
    {
        return $this->hasOne('App\Participant');
    }
}
