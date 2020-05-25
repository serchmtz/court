<?php

namespace App\Imports;

use App\Inscription;
use App\Tournament;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Http\Controllers\API\BaseController as BaseController;

class ParticipantsImport implements ToModel
{
    protected $noregister=array();
    protected $tournamentNoRegister=array();
    protected $inscriptionsRegistered=array();

    /**
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function getNoRegister()
    {
        return $this->noregister;
    }

    public function setNoRegister($user)
    {
        $noregister[]=$user;
    }

    public function getTournamentNoRegister()
    {
        return $this->tournamentNoRegister;
    }

    public function setTournamentNoRegister($tournament)
    {
        $tournamentNoRegister[]   =   $tournament;
    }

    public function getInscriptions()
    {
        return $this->inscriptionsRegistered;
    }

    public function setInscriptions($register)
    {
        $inscriptionsRegistered[] = $register;
    }

    public function model(array $row)
    {
        date_default_timezone_set('America/Mexico_City');

        //Requisito:Ya tiene que ser usuario del sistema
        //Datos del jugador:

        $participante       =   $row[0];
        $torneo             =   $row[1];
        $categoria          =   $row[2];
        $competicion        =   $row[3];

        $id_participant =   DB::table('users')
                                ->join('players','users.id','=','players.user_id')
                                ->join('participants','players.id','=','participants.player_id')
                                ->where('users.name','=',$participante)->value('participants.id');

        $id_team        =   DB::table('teams')
                                ->join('participants','teams.id','=','participants.team_id')
                                ->where('teams.name','=', $participante)->value('participants.id');
        
        $id             =   ($id_participant != null && $id_team == null) ? $id_participant:$id_team;
       
        $id_torneo      =   DB::table('tournaments')->where('name','=',$torneo)->value('id');

        $inscript       =   DB::table('inscriptions')->where('participant_id','=',$id)
                                                    ->where('tournament_id','=',$id_torneo)
                                                    ->value('id');
    
        if($id == null){//Si el participante no existe
            $noregister[]   =   $participante;
            return null;
        }else if($id_torneo == null){ //Si el torneo no está registrado
            $tournamentNoRegister[] =   $torneo;
            return null;
        }else if(!empty($inscript)){
            $inscriptionsRegistered[]   =   $participante;
            return null;
        }else{
            return new Inscription([
                'tournament_id'     =>  $id_torneo,
                'participant_id'    =>  $id_participant,
                'created_at'        =>  date("Y-m-d H:i:s"),
                'updated_at'        =>  date("Y-m-d H:i:s"),
            ]);
        }   
    }
}
