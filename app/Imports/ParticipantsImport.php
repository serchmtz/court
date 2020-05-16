<?php

namespace App\Imports;

use App\Inscription;
use App;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class ParticipantsImport implements ToModel
{
    //protected $fillable = [‘tournament_id’, ‘participant_id’];
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $torneo = $row[0];
        $nombre = $row[1];
        $id_participant = DB::table('users')
                            ->join('players','users.id','=','players.user_id')
                            ->join('participants','players.id','=','participants.player_id')
                            ->select('users.id')->where('users.name','=',$nombre)->get();
        $id_torneo = DB::table('tournaments')->select('id')->where('name','=',$torneo)->get();

        $row[0]=$torneo;
        $row[1]=$nombre;
        
        return new Inscription([
            'tournament_id' => $row[0],
            'participant_id' => $row[1],
        ]);
        
    }
}
