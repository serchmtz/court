<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App;

class TeamController extends Controller
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

    public function detalle($id)
    {
        $federacion = App\Team::all();
        $torneo = App\Tournament::findOrFail($id);
        return view('teams',compact('torneo','federacion'));
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
        $teams = Team::get();  
        foreach ($teams as $team) {
            $array[$team->id] = [
                'name' => $team->name,
                'category'=>$team->category,
                'atpPoints'=>$team->atpPoints,      
                'created_at' => $team->created_at,
                'updated_at' => $team->updated_at  
            ]; 
        }
        return response()->json($array,200);
    }
}
