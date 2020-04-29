<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
class PlayerController extends Controller
{
    public function fetchAll(){
        $players = Player::get();
        return response()->json($players,200);
    }
}
