<?php

namespace App\Imports;

use App\Inscription;
use App;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantsImport implements ToModel
{
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
                            ->where('users.name','=',$nombre)->value('users.id');
       
        $id_torneo = DB::table('tournaments')->where('name','=',$torneo)->value('id');

        if($id_participant == null || $id_participant == '0'){
            return('Error, participant '. $nombre .'is not a inscript member');
        }else{
            $row[0]=$id_torneo;
            $row[1]=$id_participant;
            return($row[0]);
            //return $row[0];
            /*
            return new Inscription([
                'tournament_id' => $row[0],
                'participant_id' => $row[1],
            ]);
            */
            DB::table('inscriptions')->insert(
                ['tournament_id' => $id_torneo, 'participant_id' => $id_participant]
            );
            
        }   
    }
}
