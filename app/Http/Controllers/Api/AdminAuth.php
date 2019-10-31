<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuth extends Controller
{
    use ApiResponseTrait;
    public $successStatus = 200;

    public function register(Request $request) {
      
        $this->validate($request, [
            'user_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|same:password',
            'store_id' =>'required',
        ]);
        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'store_id' => $request->store_id,
            'user_type' => '0'
        ]);
 
        $token = $user->createToken('ShopManger')->accessToken;
        return $this->apiResponse($token , null , 200);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return $this->apiResponse($token , null , 200);
        } else {
           
            return $this->apiResponse(nulll , "UnAuthorised" , 401);
        }
    }
    


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->apiResponse('Successfully logged out', null , 200);
    }

    public function details()
    {
        return $this->apiResponse(auth()->user(), null , 200);
        
    }
}
