<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function fetchAll()
    {
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
    public function index()
    {
        /*$array=array();
        $users = User::all();
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
        }*/
        $users = User::all();
        return response()->json($users,200);
    }
 
    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->remember_token =$request->remember_token;
        $user->email_verified_at = $request->email_verified_at;
        $user->save();
        //dd($user);
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'password' => $user->password,
            'remember_token'=>$user->remember_token,
            'email_verified_at' =>$user->email_verified_at,
        ], 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
    
}
