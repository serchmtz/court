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
        $sex        =   $row[1];
        $pais       =   $row[2];
        $cumpleaños =   $row[3];
        $atpPoints  =   $row[4];
        $photo      =   $row[5];
        $torneo     =   $row[6];
        $nombre_fed  = $row[7];//necesito rerornar el nombre de la federacion

        $id_user = DB::table('users')->where('name','=',$nombre)->value('id');

        DB::table('Players')->insert([
            'user_id'   =>  $id_user,
            'country'   =>  $pais,
            'birthday'  =>  $cumpleaños,
            'atpPoints' =>  $atpPoints,
            'photo'     =>  $photo,
            'sex'       =>  $sex,
           ]);

        $id_player = DB::table('users')
                            ->join('players','users.id','=','players.user_id')
                            ->where('users.name','=',$nombre)->value('users.id');
        
        $id_team = DB::table('Teams')->where('name','=',$nombre_fed)->value('id');

        DB::table('Members')->insert([
            'team_id'    =>  $id_team,
            'player_id'  =>  $id_player,
        ]);

        DB::table('Participants')->insert([
            'team_id'   =>  $id_team,
            'player_id' =>  $id_player,
        ]);
        //Para realizar la inscripcion:
       

        $id_participant = DB::table('users')
                            ->join('players','users.id','=','players.user_id')
                            ->join('participants','players.id','=','participants.player_id')
                            ->where('users.name','=',$nombre)->value('users.id');
       
        $id_torneo = DB::table('tournaments')->where('name','=',$torneo)->value('id');

        if($nombre == null || $id_user == '0'){
            //return('Error, participant '. $nombre .'is not a inscript member');
        }else{
            return new Inscription([
                'tournament_id' =>$id_torneo,
                'participant_id' => $id_participant,
            ]);
        }   
    }
}
