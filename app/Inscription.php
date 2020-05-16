<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tournament_id', 'participant_id'];

    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
