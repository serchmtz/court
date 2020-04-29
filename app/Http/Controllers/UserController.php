<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function fetchAll(){
        $array=array();
        $users = User::get();
        foreach ($users as $user) {
            $array[$user->id] = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'role' => $user->role,
                    'password' => $user->password,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at
            ]; 
        }
        return response()->json($array,200);
    }
}
