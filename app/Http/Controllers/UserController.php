<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User as UserResource;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\API\BaseController as BaseController;
class UserController extends BaseController
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
        return $this->sendResponse($array, 'Users retrieved successfully.',200);
    }
 
    public function show(User $user)
    {
        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.',200);
    }

    public function update(Request $request, User $user)
    {
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string', 'regex:/^[0-9]{3}[-][0-9]{3}[-][0-9]{4}$/'],
            'role' => [
                'string',
                'max:25', 
                Rule::in(['Global Admin','Player','Secretary','Results Capturer','Tournament Manager'])
            ],
            'password' => ['string', 'min:8'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user->name = !is_null($request->name) ? $request->name : $user->name;
        $user->email = !is_null($request->email) ? $request->email : $user->email;
        $user->phone = !is_null($request->phone) ? $request->phone : $user->phone;
        $user->role = !is_null($request->role) ? $request->role : $user->role;
        $user->password = !is_null($request->password) ? Hash::make($request->password) : $user->password;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.', 200);
    }

    public function destroy(User $user)
    {
        date_default_timezone_set('America/Mexico_City');
        $user->status = 'inactive';
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save(); 
        return $this->sendResponse([], 'User status changed to inactive successfully.',202);
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
    /* public function store(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{3}[-][0-9]{3}[-][0-9]{4}$/'],
            'role' => [
                'required',
                'string',
                'max:25', 
                Rule::in(['Global Admin','Player','Secretary','Results Capturer','Tournament Manager'])
            ],
            'password' => ['required', 'string', 'min:8'],
            'c_password' => ['required','same:password'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
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
        return $this->sendResponse(new UserResource($user),'User created successfully.', 201);
    }*/
    
}
