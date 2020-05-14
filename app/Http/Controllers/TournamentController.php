<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Http\Resources\Tournament as TournamentResource;
class TournamentController extends Controller
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
        $tournaments=Tournament::orderBy('id','DESC')->paginate(3);
        return view('/tournaments/index',compact('tournaments'));
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
        $tournaments=Tournament::find($id);
        return  view('tournament.show',compact('tournaments'));
        //return $this->sendResponse(new TournamentResource($tournament), 'Tournament retrieved successfully.',200);
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
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            /*'date' => [''],*/
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
            'location' => ['string', 'max:50'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $tournament->name = !is_null($request->name) ? $request->name : $tournament->name;
        $tournament->category = !is_null($request->category) ? $request->category : $tournament->category;
        $tournament->competition = !is_null($request->competition) ? $request->competition : $tournament->competition;
        $tournament->nRounds = !is_null($request->nRounds) ? $request->nRounds : $tournament->nRounds;
        $tournament->location = !is_null($request->location) ? Hash::make($request->location) : $tournament->location;
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
        date_default_timezone_set('America/Mexico_City');
        $tournament->delete();
        $tournamet->updated_at = date("Y-m-d H:i:s");
        $tournament->save(); 
        return $this->sendResponse([], 'Tournament deleted.',202);
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
