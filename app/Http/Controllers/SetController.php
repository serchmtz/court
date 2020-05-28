<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use App\Match;
class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_match)
    {
        date_default_timezone_set('America/Mexico_City');
        $match = Match::where('id','=',$id_match)->first();
        if($match == null) {
            return $this->sendError('Error in database.', 'Match '.$id_match.' doesn not exists');       
        }
        $validator = Validator::make($request->all(), [
            'sets'    => ['required','array','min:3'],
            'sets.*'  => ['required','array','min:3'],
            'sets.*.nSet' => ['required','integer'],
            'sets.*.player1Score' => ['required','integer'],
            'sets.*.player2Score' => ['required','integer'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $dbSets = Set::where('match_id','=',$match->id)->get();
        foreach($dbSets as $dbSet){
            $dbSet->delete();
        }
        foreach($request->sets as $set)
        {
            $new_set = new Set();
            $new_set->match_id = $match->id;
            $new_set->nSet = $set->nSet;
            $new_set->player1Score = $set->player1Score;
            $new_set->player2Score = $set->player2Score;
            $new_set->tiebreak = false;
            $new_set->created_at = date("Y-m-d H:i:s");
            $new_set->updated_at = date("Y-m-d H:i:s");
            $new_set->save();
        }
        $dbSets = Set::where('match_id','=',$match->id)->get();
        return $this->sendResponse($dbSets,'Sets updated successfully.', 200);
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
    public function fetchAll(){
        
        $array=array();
        $sets = Set::get();
        foreach ($sets as $set) 
        {
            $array[$set->id] = [
                'match_id' => $set->match_id,
                'nSet'=> $set->nSet,
                'player1Score'=> $set->player1Score,
                'player2Score'=> $set->player2Score,
                'tiebreak'=> $set->tiebreak,
                'created_at' => $set->created_at,
                'updated_at' => $set->updated_at    
            ]; 
        }
        return response()->json($array,200);
    }
}
