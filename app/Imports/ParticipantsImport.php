<?php

namespace App\Imports;

use App\Inscription;
use App\Tournament;
use App\Player;
use App\Team;
use App\Participant;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class ParticipantsImport implements ToModel
{
    private $errors = array();
    public function getErrors(){
        return $this->errors;
    }
    public function resetErrors(){
        $this->errors = array();
    }
    private function getSexString($sex){
        if($sex=='M')
            return 'Male';
        return 'Female';
    }
    /**
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        date_default_timezone_set('America/Mexico_City');

        $participant_name = $row[0];
        $tournament_name = $row[1];
        $tournament_category = $row[2];
        $tournament_competition = $row[3];

        if(empty($participant_name) || 
            empty($tournament_name) || 
            empty($tournament_category) || 
            empty($tournament_competition))
            return null;
            
        $tournament = Tournament::where('name','=',$tournament_name)
                                ->where('category','=',$tournament_category)
                                ->where('competition','=',$tournament_competition)
                                ->first();
        if($tournament == null || empty($tournament)){
            $this->errors[] = 'Tournament: '
                                .$tournament_name.' '
                                .$tournament_category.' '
                                .$tournament_competition
                                .' does not exists in the database';
            return null;
        }
        $user = User::where('name','=',$participant_name)
                        ->first();
        $participant = null;
        if($user != null) // Is a single player
        {
            $participant =  DB::table('users')
                            ->join('players','users.id','=','players.user_id')
                            ->join('participants','players.id','=','participants.player_id')
                            ->where('users.name','=',$participant_name)
                            ->first();
            //We check if we are not trying to register a single player 
            //to a doubles tournament
            if($tournament->competition == 'Doubles') //Doubles tournament
            {
                $this->errors[] = 'Tournament '
                                    .$tournament_name.' '
                                    .$tournament_category.' '
                                    .$tournament_competition
                                    .' is just for doubles and '
                                    .$participant_name
                                    .' is a single player';
                return null;
            }
            //We check if the tournament's and players's sex match
            $player = Player::where('user_id','=',$user->id)
                            ->first();
            $sexString = $this->getSexString($player->sex);
            if($tournament->category != $sexString)
            {
                $this->errors[] = 'Tournament '
                                    .$tournament_name.' '
                                    .$tournament_category.' '
                                    .$tournament_competition
                                    .' is just for '.$tournament->category
                                    .' and '.$participant_name
                                    .' is '.$sexString;
                return null; 
            }
        }
        else //Can be a team
        {
            $participant = DB::table('teams')
                        ->join('participants','teams.id','=','participants.team_id')
                        ->where('teams.name','=', $participant_name)
                        ->first();
            if($participant==null) //It is neither a single player nor a team
            {
                $this->errors[] = $participant_name
                                    .' is neither a team nor a single player registered in the database';
                return null;
            }
            //We check that we are not just adding doubles to a singles tournament
            if($tournament->competition == 'Singles') //Singles tournament
            {
                $this->errors[] = 'Tournament '
                                    .$tournament_name.' '
                                    .$tournament_category.' '
                                    .$tournament_competition
                                    .' is just for singles and '
                                    .$participant_name
                                    .' are a team';
                return null;
            }
            //We check if the tournament's and team's category match
            $team = Team::where('name','=',$participant_name)
                            ->first();
            if($tournament->category != $team->category)
            {
                $this->errors[] = 'Tournament '
                                    .$tournament_name.' '
                                    .$tournament_category.' '
                                    .$tournament_competition
                                    .' is just for '.$tournament->category
                                    .' and '.$participant_name
                                    .' is '.$team->category;
                return null; 
            }
        }
        //It is officialy a participant
        //We check if it is already in the tournament
        $inscription = Inscription::where('participant_id','=',$participant->id)
                                ->where('tournament_id','=',$tournament->id)
                                ->first();
        if($inscription!=null) // It is already in the tournament
        {
            $this->errors[] = $participant_name
                                .' is already registered for the tournament '
                                .$tournament_name.' '
                                .$tournament_category.' '
                                .$tournament_competition;
            return null;
        }
        //We check whether the tournament is not full yet
        $total_inscriptions = Inscription::where('tournament_id','=',$tournament->id)
                                        ->count();
        $maxNumberOfInscriptions = pow(2,$tournament->nRounds);
        if($total_inscriptions >= $maxNumberOfInscriptions){ // The tournament is full
            $this->errors[] = ('Tournament: '.$tournament_name.' '.$tournament_category.' '.$tournament_competition.' is already full to add the player '.$participant_name);
            return null;
        }
        
        //Finally, is a valid candidate to inscription
        return new Inscription([
            'tournament_id'     =>  $tournament->id,
            'participant_id'    =>  $participant->id,
            'created_at'        =>  date("Y-m-d H:i:s"),
            'updated_at'        =>  date("Y-m-d H:i:s"),
        ]);

    }
}
