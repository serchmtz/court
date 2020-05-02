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
        $users = User::where('status','active');
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
        return response()->json($users,200);
    }
 
    public function show(User $user)
    {
        if (User::where('id', $user->id)->exists()) 
        {
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role,
                'status' => $user->status,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ],200);
        }
        else
        {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
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
        if (User::where('id', $user->id)->exists()) 
        {
            $userToModify = User::find($user->id);
            $userToModify->name = !is_null($request->name) ? $request->name : $userToModify->name;
            $userToModify->email = !is_null($request->email) ? $request->email : $userToModify->email;
            $userToModify->phone = !is_null($request->phone) ? $request->phone : $userToModify->phone;
            $userToModify->role = !is_null($request->role) ? $request->role : $userToModify->role;
            $userToModify->status = !is_null($request->status) ? $request->status : $userToModify->status;
            $userToModify->password = !is_null($request->password) ? $request->password : $userToModify->password;
            $userToModify->updated_at = date("Y-m-d H:i:s");
            $userToModify->update();
            return response()->json([
                'id' => $userToModify->id,
                'name' => $userToModify->name,
                'email' => $userToModify->email,
                'phone' => $userToModify->phone,
                'role' => $userToModify->role,
                'status' => $userToModify->status,
                'email_verified_at' => $userToModify->email_verified_at,
                'created_at' => $userToModify->created_at,
                'updated_at' => $userToModify->updated_at
            ], 200);
        }
        else{
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function delete(User $user)
    {
        if(User::where('id', $user->id)->exists()) 
        {
            $user = User::find($user->id);
            $user->status = 'inactive';
            $user->updated_at = date("Y-m-d H:i:s");
            $user->update();
            
            return response()->json([
              "message" => "User deleted"
            ], 204);
        } 
        else 
        {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
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
    public static function respondNotFound(string $msg = null)
    {
        $error['status_code'] = 404;
        if (!!$msg) {
            $error['message'] = $msg;
        }

        return response(compact('error'), 404);
    }
    
}
