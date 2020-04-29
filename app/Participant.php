<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    public function player()
    {
        return $this->belongsTo('App\Player');
    }
    public function inscriptions()
    {
        return $this->hasMany('App\Inscription');
    }
    public function players1()
    {
        return $this->hasMany('App\Match', 'player1');
    }
    public function players2()
    {
        return $this->hasMany('App\Match', 'player2');
    }
    public function matchesWon()
    {
        return $this->hasMany('App\Match', 'winner_id');
    }
}
