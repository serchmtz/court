<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App;
use App\Match;
use App\Stat;
use App\Inscription;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Tournament as TournamentResource;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\API\BaseController as BaseController;

class TournamentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$array=array();
        /*$users = Tournament::where('status','active')->get();*/
       /* $tournaments = Tournament::get();
        foreach ($tournaments as $tournament) 
        {
            $array[$tournament->id] = [
                    'name' => $tournament->name,
                    'date' => $tournament->date,
                    'category' => $tournament->category,
                    'competition' => $tournament->competition,
                    'nRounds' => $tournament->nRounds,
                    'location' => $tournament->location,
                    'created_at' => $tournament->created_at,
                    'updated_at' => $tournament->updated_at
            ]; 
        }
        return $this->sendResponse($array, 'Tournaments retrieved successfully.',200);*/
        //$tournaments=Tournament::orderBy('id','DESC')->paginate(3);
        $tournaments = Tournament::all();
        return view('/tournaments/index',compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/tournaments/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'category' => [
                'required',
                'string',
                'max:25', 
                Rule::in(['Male','Female','Mixed'])
            ],
            'competition' => [
                'required', 
                'string',
                'max:25',
                Rule::in(['Singles', 'Doubles'])
            ],
            'nRounds' => ['required', 'int', 'max:11'],
            'location' => ['required','string', 'max:255'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->date = $request->date;
        $tournament->category = $request->category;
        $tournament->competition = $request->competition;
        $tournament->nRounds = $request->nRounds;
        $tournament->location = $request->location;
        $tournament->created_at = date("Y-m-d H:i:s");
        $tournament->updated_at = date("Y-m-d H:i:s");
        $tournament->save();
        return $this->sendResponse(new TournamentResource($tournament),'Tournament created successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return $this->sendResponse(new TournamentResource($tournament), 'Tournament retrieved successfully.',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('/tournaments/update', compact ('tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'date' => ['date', 'date_format:Y-m-d H:i:s'],
            'category' => [
                'string',
                'max:25', 
                Rule::in(['Male','Female','Mixed'])
            ],
            'competition' => [
                'string',
                'max:25',
                Rule::in(['Singles', 'Doubles'])
            ],
            'nRounds' => ['int', 'max:11'],
            'location' => ['string', 'max:255'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $tournament->name = !is_null($request->name) ? $request->name : $tournament->name;
        $tournament->date = !is_null($request->date) ? $request->date : $tournament->date;
        $tournament->category = !is_null($request->category) ? $request->category : $tournament->category;
        $tournament->competition = !is_null($request->competition) ? $request->competition : $tournament->competition;
        $tournament->nRounds = !is_null($request->nRounds) ? $request->nRounds : $tournament->nRounds;
        $tournament->location = !is_null($request->location) ? $request->location : $tournament->location;
        $tournament->updated_at = date("Y-m-d H:i:s");
        $tournament->save();

        return $this->sendResponse(new TournamentResource($tournament), 'Tournament updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //date_default_timezone_set('America/Mexico_City');
        $tournament->delete();
        //$tournamet->updated_at = date("Y-m-d H:i:s");
        //$tournament->save(); 
        return $this->sendResponse([], 'Tournament deleted.',202);
    }
    //--------------------------------//
    //-----------MINE-----------------//
    //--------------------------------//

    /**
     * Get round string 
     * @param int $round
     * @return string 
     */
    public function getRoundString($round){
        $rounds = [
            "first",
            "second",
            "third",
            "fourth",
            "quarters",
            "semifinal",
            "final"
        ];
        return $rounds[count($rounds) - $round];
    }
    /**
     * Sort a tournament's first round matches
     * @param Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function sortmatches(Tournament $tournament){

        //First we check if they were already sorted
        $round_string = $this->getRoundString($tournament->nRounds);
        $matches = Match::where('tournament_id','=',$tournament->id)
                        ->where('round','=',$round_string)
                        ->get();
        // If there are matches of the initial round, return them
        if($matches->count() != 0){
            return $this->sendResponse($matches, 'First round matches already sorted.',200);
        }
        // Sort the initial matches...
        // Take all the players in the inscription
        $inscriptions = Inscription::where('tournament_id','=',$tournament->id)
                                    ->get();
        // Check if there are enough players to sort the init round
        $numPlayers = pow(2,$tournament->nRounds); //Right number of participants
        $realCount = count($inscriptions); //Actual number of participants
        // If they match with each other
        if($realCount < $numPlayers)
        {
            return $this->sendError('Error sorting', 'There are only '.
                                                    $realCount.
                                                    ' players inscripted and must be '.
                                                    $numPlayers);       
        }
        /**
         * They are equal and we can sort properly
         * NOTE: There are never going to be $realCount > $numPlayers
         * because the inscriptions in the excel's import are 
         * validated to avoid this
         */
        // Get an array with all the participants' id
        $participants = [];
        foreach($inscriptions as $inscription){
            $participants[] = $inscription->participant_id;
        }
        //Shuffle the array of participants
        $result = shuffle($participants);

        //Create a match between consecutive participants
        for($i=0;$i<count($participants);$i+=2){
            $new_match = new Match();
            $new_match->tournament_id = $tournament->id;
            $new_match->player1 = $participants[$i];
            $new_match->player2 = $participants[$i+1];
            $new_match->winner_id = null;
            $new_match->round = $this->getRoundString($tournament->nRounds);
            $new_match->started_at = null;
            $new_match->finished_at = null;
            $new_match->abandoned =  0;
            $new_match->excuse = null;
            $new_match->created_at = date("Y-m-d H:i:s");
            $new_match->updated_at = date("Y-m-d H:i:s");
            $new_match->save();
            
            $stat = new Stat();
            $stat->match_id = $new_match->id;
            $stat->acesP1 = 0;
            $stat->acesP2 = 0;
            $stat->doubleFaultP1 =  0;
            $stat->doubleFaultP2 =  0;
            $stat->firstServicePercentageP1 = 0;
            $stat->firstServicePercentageP2 = 0;
            $stat->servicePointsWonP1 = 0;
            $stat->servicePointsWonP2 = 0;
            $stat->tiebreaksWonP1 = 0;
            $stat->tiebreaksWonP2 = 0;
            $stat->serverGamesWonP1 = 0;
            $stat->serverGamesWonP2 = 0;
            $stat->save();

        }
        $new_matches = Match::where('tournament_id','=',$tournament->id)
                            ->get();
        // Return the new sorted matches
        return $this->sendResponse($new_matches, 'First round matches sorted.',200);
    }
    /**
     * Return all the Tournaments raw
     * @return \Illuminate\Http\Response
     */
    public function fetchAll(){
        $array=array();
        $tournaments = Tournament::get();   
        foreach ($tournaments as $tournament) {
            $array[$tournament->id] = [
                'name' => $tournament->name,
                'date'=> $tournament->date,
                'category' => $tournament->category,
                'competition' => $tournament->competition,
                'nRounds' => $tournament->nRounds,
                'location' => $tournament->location,    
                'created_at' => $tournament->created_at,
                'updated_at' => $tournament->updated_at  
            ]; 
        }
        return response()->json($array,200);
    }
}
