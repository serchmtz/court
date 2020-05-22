<?php

namespace App\Imports;

use App\Inscription;
use App\Tournament;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantsImport implements ToModel
{
    /**
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        //Requisito:Ya tiene que ser usuario del sistema
        //Datos del jugador:
        $nombre     =   $row[0];
        $torneo     =   $row[1];

        $id_participant = DB::table('users')
                            ->join('players','users.id','=','players.user_id')
                            ->join('participants','players.id','=','participants.player_id')
                            ->where('users.name','=',$nombre)->value('users.id');
       
        $id_torneo = DB::table('tournaments')->where('name','=',$torneo)->value('id');

        if($id_participant == null  || $id_torneo == null){
            //return('Error, participant '. $nombre .'is not a inscript member');
        }else{
            return new Inscription([
                'tournament_id' =>$id_torneo,
                'participant_id' => $id_participant,
            ]);
        }   
    }
}
