<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
class MatchController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}