<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;
class StatController extends Controller
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
        $stats = Stat::get();
        foreach ($stats as $stat) 
        {
            $array[$stat->id] = [
                'match_id' => $stat->match_id,
                'acesP1'=> $stat->acesP1,
                'acesP2'=> $stat->acesP2,
                'doubleFaultP1'=> $stat->doubleFaultP1,
                'doubleFaultP2'=> $stat->doubleFaultP2,
                'firstServicePercentageP1'=> $stat->firstServicePercentageP1,
                'firstServicePercentageP2'=> $stat->firstServicePercentageP2,
                'servicePointsWonP1'=> $stat->servicePointsWonP1,
                'servicePointsWonP2'=> $stat->servicePointsWonP2,
                'tiebreaksWonP1'=> $stat->tiebreaksWonP1,
                'tiebreaksWonP2'=> $stat->tiebreaksWonP2,
                'serverGamesWonP1'=> $stat->serverGamesWonP1,
                'serverGamesWonP2'=> $stat->serverGamesWonP2,
                'created_at' => $stat->created_at,
                'updated_at' => $stat->updated_at   
            ]; 
        }
        return response()->json($array,200);
    }
}
