<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
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
