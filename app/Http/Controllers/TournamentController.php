<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
class TournamentController extends Controller
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
