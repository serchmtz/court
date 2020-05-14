<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournaments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date','category','competition', 'nRounds','location'
    ];
    public function inscriptions()
    {
        return $this->hasMany('App\Inscription');
    }
    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
