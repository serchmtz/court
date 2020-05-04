<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
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
   
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->status = 'active';
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        $success['token'] =  $user->createToken('courtApp')->accessToken;
        $user_data = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'password' => $user->password,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ];
        $success['user'] =  $user_data;
        return $this->sendResponse($success, 'User registered successfully.',201);
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $user_data = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role,
                'status' => $user->status,
                'password' => $user->password,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ];
            $success['user'] =  $user_data;
            return $this->sendResponse($success, 'User login successfully.',200);
        } 
        else{ 
            return $this->sendError('Unauthorized.', ['error'=>'The email or password does not match our credentials']);
        } 
    }
    public function logout()
    {
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->revoke();
            Auth::user()->oauthacesstokens()->delete();
            return $this->sendResponse([], 'User logout successfully.',202);
        }
    }
    public function authUser(){
        return Auth::user();
    }
}
