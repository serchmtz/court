<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ParticipantsImport;
use Carbon\Carbon;
use App\Inscription;
use App;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class InscriptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscribir = App\Inscription::all();
        return view('inscriptions.inscription',compact('inscribir'));
    }

    public function subirArchivo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required','file','mimes:xlsx'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $file   =   $request->file('file')->store('public');
        $import =   new ParticipantsImport;
        $import->resetErrors();
        Excel::import($import,$file);
        $errors = $import->getErrors();
        //Para eliminar el archivo despues de usarlo
        Storage::delete($file);
        if(empty($errors)){
            return $this->sendResponse([], 'All inscriptions made succesfully.', 200);
        }
        else{
            return $this->sendError('Inscriptions error.', $errors);       
        }
    }

    
    public function fileupload(Request $request){
        if($request->hasFile('file')) {
            // Upload path
            $destinationPath = 'storage/';
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
            
            // Valid extensions
            $validextensions = array("xls","xlsx");

            // Check extension
            if(in_array(strtolower($extension), $validextensions)){
                // Rename file 
                $fileName = 'participants'.rand(11111, 99999) .'.' . $extension;

                // Uploading file to given path
                $file = $request->file('file')->move($destinationPath, $fileName); 
                
                Excel::import(new ParticipantsImport,$file);
            }
        }
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
        $inscriptions = Inscription::get();
        $array=array();
        $inscriptions = Inscription::get();
        foreach ($inscriptions as $inscription) 
        {
            $array[$inscription->id] = [
                'tournament_id' =>$inscription->tournament_id,
                'participant_id'=> $inscription->participant_id, 
                'created_at' => $inscription->created_at,
                'updated_at' => $inscription->updated_at    
            ]; 
        }
        return response()->json($array,200);
    }
}
