<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function participant1()
    {
        return $this->belongsTo('App\Participant', 'player1');
    }
    public function participant2()
    {
        return $this->belongsTo('App\Participant', 'player2');
    }
    public function winner()
    {
        return $this->belongsTo('App\Participant', 'winner_id');
    }
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
    public function sets()
    {
        return $this->hasMany('App\Set');
    }
    public function stat()
    {
        return $this->hasOne('App\Stat');
    }
}
