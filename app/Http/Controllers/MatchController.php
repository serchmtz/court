<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\Match as MatchResource;
use App\Http\Controllers\API\BaseController as BaseController;
class MatchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::get();
        return $this->sendResponse($matches->load('stat',
                                                'sets',
                                                'participant1.player.user',
                                                'participant1.team.members.player.user',
                                                'participant2.player.user',
                                                'participant2.team.members.player.user',
                                                'winner.player.user',
                                                'winner.team.members.player.user'
                                            ),
                                 'Matches retrieved successfully.',200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'tournament_id' => ['required', 'integer', 'exists:tournaments,id'],
            'player1' => ['required', 'integer', 'exists:participants,id'],
            'player2' => ['required','integer','exists:participants,id'],
            'winner_id' => ['integer','exists:participants,id'],
            'round' => [
                'required', 
                'string',
                Rule::in(
                [
                    'final',
                    'semifinal',
                    'quarters',
                    'fourth',
                    'third',
                    'second',
                    'first'
                ])
            ],
            'started_at' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'finished_at' => ['required', 'date', 'date_format:Y-m-d H:i:s','after:started_at'],
            'abandoned' => ['boolean'],
            'excuse' => ['required_if:abandoned,true','string','max:50'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $new_match = new Match();
        $new_match->tournament_id = $request->tournament_id;
        $new_match->player1 = $request->player1;
        $new_match->player2 = $request->player2;
        $new_match->winner_id = !is_null($request->winner_id) ? $request->winner_id : null;
        $new_match->round = $request->round;
        $new_match->started_at = $request->started_at;
        $new_match->finished_at = $request->finished_at;
        $new_match->abandoned = !is_null($request->abandoned) ? $request->abandoned : 0;
        $new_match->excuse = !is_null($request->excuse) ? $request->excuse : null;
        $new_match->created_at = date("Y-m-d H:i:s");
        $new_match->updated_at = date("Y-m-d H:i:s");
        $new_match->save();
        return $this->sendResponse(new MatchResource($new_match),'Match created successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return $this->sendResponse($match->load('stat',
                                                'sets',
                                                'participant1.player.user',
                                                'participant1.team.members.player.user',
                                                'participant2.player.user',
                                                'participant2.team.members.player.user',
                                                'winner.player.user',
                                                'winner.team.members.player.user'
                                            ), 'Match retrieved successfully.',200);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //We stablish the time zone to avoid other datatimes
        date_default_timezone_set('America/Mexico_City');
        //We validate the request's fields
        $validator = Validator::make($request->all(), [
            'tournament_id' => ['integer', 'exists:tournaments,id'],
            'player1' => ['integer', 'exists:participants,id'],
            'player2' => ['integer','exists:participants,id'],
            'winner_id' => ['integer','exists:participants,id'],
            'round' => [
                'string',
                Rule::in(
                [
                    'final',
                    'semifinal',
                    'quarters',
                    'fourth',
                    'third',
                    'second',
                    'first'
                ])
            ],
            'started_at' => ['date', 'date_format:Y-m-d H:i:s'],
            'finished_at' => ['date', 'date_format:Y-m-d H:i:s','after:started_at'],
            'abandoned' => ['boolean'],
            'excuse' => ['required_if:abandoned,true','string','max:50'],
        ]);
        /**
         * If the validation fails we return the errors with a
         * 404 status code
         */
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        /**
         * Assign the new fields to the requested match
         * taking care of whether they were past in 
         * the request or not
         */
        $match->tournament_id = !is_null($request->tournament_id) ? $request->tournament_id : $match->tournament_id;
        $match->player1 = !is_null($request->player1) ? $request->player1 : $match->player1;
        $match->player2 = !is_null($request->player2) ? $request->player2 : $match->player2;
        $match->winner_id = !is_null($request->winner_id) ? $request->winner_id : $match->winner_id;
        $match->round = !is_null($request->round) ? $request->round : $match;
        $match->started_at = !is_null($request->started_at) ? $request->started_at : $match->started_at;
        $match->finished_at = !is_null($request->finished_at) ? $request->finished_at : $match->finished_at;
        $match->abandoned = !is_null($request->abandoned) ? $request->abandoned : 0;
        $match->excuse = !is_null($request->excuse) ? $request->excuse : null;
        $match->updated_at = date("Y-m-d H:i:s"); //Update the updated_at field with now()
        $match->save(); //Save the updated match

        /**
         * Check if the current tournament round
         * is done and in that case, we create the next matches
         * for the following round
         */
        $round_finished = isRoundFinished($match);
        /**
         * If the current tournament round is done 
         * and is not the final match...
         * */ 
        if($round_finished && $match->round!="final"){ 
            createNextRoundMatches($match); //Create the next matches
        }
        return $this->sendResponse(new MatchResource($match),'Match updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //---------------------------------//
    //------------MINE-----------------//
    //---------------------------------//
    /**
     * Return all matches raw
     * @return \Illuminate\Http\Response
     */
    public function fetchAll()
    {
        $array=array();
        $matches = Match::get();
        foreach ($matches as $match) 
        {
            $array[$match->id] = [
                'tournament_id' => $match->tournament_id,
                'player1'=>$match->player1,
                'player2'=> $match->player2,
                'winner_id' => $match->winner_id,
                'round' => $match->round,
                'started_at' =>$match->started_at,
                'finished_at' =>$match->finished_at,
                'abandoned' => $match->abandoned,
                'excuse' => $match->excuse,
                'created_at' => $match->created_at,
                'updated_at' => $match->updated_at    
            ]; 
        }
        return response()->json($array,200);
    }
    /**
     * Validate if all matches in a tournament round are finished
     * based on a match's round
     * @param Match $match
     * @return boolean
     */
    public function isRoundFinished(Match $match){
        //Get all the matches in the same tournament's round 
        $matches = Match::where('round','=',$match->round)
                        ->where('tournament_id','=',$match->tournament_id)
                        ->get();
        foreach($matches as $match_){ 
            //If a match is not done yet, return false
            if($match_->finished_at == null && $match_->winner_id==null) 
                return false;
        }
        
        //If all the matches are done, then we return true
        return true;
    }
    /**
     * Return the next round string
     * @param String $round
     * @return String
     */
    public function getNextRound($round){
        $rounds = [
            "first",
            "second",
            "third",
            "fourth",
            "quarters",
            "semifinal",
            "final"
        ];
        return $rounds[array_search($round,$rounds)+1];
    }
    /**
     * Create the next round matches
     * @param Match $match
     * @return void
     */
    public function createNextRoundMatches(Match $match){
        //Get all the matches in the same tournament's round 
        $matches = Match::where('round','=',$match->round)
                        ->where('tournament_id','=',$match->tournament_id)
                        ->orderBy('id')
                        ->get();
        for($i=0;$i<count($matches);$i+=2){
            $new_match = new Match();
            $new_match->tournament_id = $match->tournament_id;
            $new_match->player1 = $matches[$i]->winner_id;
            $new_match->player2 = $matches[$i+1]->winner_id;;
            $new_match->winner_id = null;
            $new_match->round = getNextRound($match->round);
            $new_match->started_at = null;
            $new_match->finished_at = null;
            $new_match->abandoned =  0;
            $new_match->excuse = null;
            $new_match->created_at = date("Y-m-d H:i:s");
            $new_match->updated_at = date("Y-m-d H:i:s");
            $new_match->save();
        }
    }
}
