<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App;

class PlayerController extends Controller
{
    public function index(){
        $jugador = App\Player::all();
        return view('players',compact('jugador'));
    }

    public function fetchAll(){
        $array=array();
        $players = Player::get();
        
        foreach ($players as $player) 
        {
            $array[$player->id] = [
                'user_id' => $player->user_id,
                'country'=>$player->country,
                'atpPoints'=> $player->atpPoints ,
                'birthday' => $player->birthday,
                'photo'=> $player->photo,
                'sex'=>$player->sex,
                'user' => $player->user,
                'created_at' => $player->created_at,
                'updated_at' => $player->updated_at    
            ]; 
        }
        return response()->json($array,200);
    }
}
