<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;
use App\Match;
use Validator;
use App\Http\Resources\Stat as StatResource;
use App\Http\Controllers\API\BaseController as BaseController;

class StatController extends BaseController
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
            return $this->sendError('Error in database.', 'Match '.$id_match.' does not exists');       
        }
        $validator = Validator::make($request->all(), [
            'acesP1' => ['integer','min:0'],
            'acesP2' => ['integer','min:0'],
            'doubleFaultP1' => ['integer','min:0'],
            'doubleFaultP2' => ['integer','min:0'],
            'firstServicePercentageP1' => ['integer','min:0','max:100'],
            'firstServicePercentageP2' => ['integer','min:0'],
            'servicePointsWonP1' => ['integer','min:0'],
            'servicePointsWonP2' => ['integer','min:0'],
            'tiebreaksWonP1' => ['integer','min:0'],
            'tiebreaksWonP2' => ['integer','min:0'],
            'serverGamesWonP1' => ['integer','min:0'],
            'serverGamesWonP2' => ['integer','min:0'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $stat = Stat::where('match_id','=',$match->id)->first();

        $stat->acesP1 = !is_null($request->acesP1) ? $request->acesP1 : $stat->acesP1;
        $stat->acesP2 = !is_null($request->acesP2) ? $request->acesP2 : $stat->acesP2;
        $stat->doubleFaultP1 = !is_null($request->doubleFaultP1) ? $request->doubleFaultP1 : $stat->doubleFaultP1;
        $stat->doubleFaultP2 = !is_null($request->doubleFaultP2) ? $request->doubleFaultP2 : $stat->doubleFaultP2;
        $stat->firstServicePercentageP1 = !is_null($request->firstServicePercentageP1) ? $request->firstServicePercentageP1 : $stat->firstServicePercentageP1;
        $stat->firstServicePercentageP2 = !is_null($request->firstServicePercentageP2) ? $request->firstServicePercentageP2 : $stat->firstServicePercentageP2;
        $stat->servicePointsWonP1 = !is_null($request->servicePointsWonP1) ? $request->servicePointsWonP1 : $stat->servicePointsWonP1;
        $stat->servicePointsWonP2 = !is_null($request->servicePointsWonP2) ? $request->servicePointsWonP2 : $stat->servicePointsWonP2;
        $stat->tiebreaksWonP1 = !is_null($request->tiebreaksWonP1) ? $request->tiebreaksWonP1 : $stat->tiebreaksWonP1;
        $stat->tiebreaksWonP2 = !is_null($request->tiebreaksWonP2) ? $request->tiebreaksWonP2 : $stat->tiebreaksWonP2;
        $stat->serverGamesWonP1 = !is_null($request->serverGamesWonP1) ? $request->serverGamesWonP1 : $stat->serverGamesWonP1;
        $stat->serverGamesWonP2 = !is_null($request->serverGamesWonP2) ? $request->serverGamesWonP2 : $stat->serverGamesWonP2;
        $stat->updated_at = date("Y-m-d H:i:s");
        $stat->save();

        return $this->sendResponse(new StatResource($stat),'Stats updated successfully.', 200);
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
