<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
