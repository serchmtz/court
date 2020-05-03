<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $array=array();
        $users = User::where('status','active')->get();
        foreach ($users as $user) 
        {
            $array[$user->id] = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'role' => $user->role,
                    'status' => $user->status,
                    'password' => $user->password,
                    'email_verified_at' =>$user->email_verified_at,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at
            ]; 
        }
        return response()->json($array,200);
    }
 
    public function show(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ],200);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->status = 'active';
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->email_verified_at = null;
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'password' => $user->password,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ], 201);
    }

    public function update(Request $request, User $user)
    {
        date_default_timezone_set('America/Mexico_City');
        $user->name = !is_null($request->name) ? $request->name : $user->name;
        $user->email = !is_null($request->email) ? $request->email : $user->email;
        $user->phone = !is_null($request->phone) ? $request->phone : $user->phone;
        $user->role = !is_null($request->role) ? $request->role : $user->role;
        $user->status = !is_null($request->status) ? $request->status : $user->status;
        $user->password = !is_null($request->password) ? Hash::make($request->password) : $user->password;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ], 200);
    }

    public function delete(User $user)
    {
        date_default_timezone_set('America/Mexico_City');
        $user->status = 'inactive';
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save(); 
        return response()->json([
            'message' => 'User deleted'
        ], 202);
    }

    //|--------------------------------------|
    //|----------------Mine------------------|
    //|--------------------------------------|
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
    
}
