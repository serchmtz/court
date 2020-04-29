<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
