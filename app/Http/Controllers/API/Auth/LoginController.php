<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->get('*'));
        }

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();
        
        return response()->json( [ 
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString()
        ] );
    }

    public function logout()
    {
        $user = \Auth::user()->token();
        $user->revoke();
        
        return response()->json([
            'status'    => 200,
            'message'   => 'Logout Successfully!',
        ]);
    }

    public function profile()
    {
        return response()->json([
            'data'  => [
                [
                    'name'      =>  auth()->user()->name,
                    'gender'    =>  gender(auth()->user()->gender),
                    'phone'     =>  auth()->user()->phone,
                    'email'     =>  auth()->user()->email,
                ]
            ]
        ]);
    }
}
