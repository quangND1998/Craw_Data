<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'password' => 'required',
            'DeviceID' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], Response::HTTP_BAD_REQUEST);
        }
        $user = Auth::user();
        $user_data = User::where('id',Auth::user()->id);
        $response = [
            'msg' => 'You are logged in!',
            'token' => $token,
            'user_name' =>$user->name,
            'user' => $user_data
        ];
        return response()->json($response, Response::HTTP_OK);

    }
  
}
