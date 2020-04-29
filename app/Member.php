<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function player()
    {
        return $this->belongsTo('App\Player');
    }
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
