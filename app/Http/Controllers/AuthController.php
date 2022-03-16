<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //check email
        $user = User::where('email', $request['email'])->first();

        if (!$user)
            return response(['message'=>'Email Not Found!'], 201);

        //check password
        if (!Hash::check($request['password'], $user->password)) {
            return response(['message'=>'Wrong Password'], 202);
        }
        
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt',$token,60);
        $response = [
            'user' => $user,
            // 'token'=>$token
        ];
        return response($response, 200)->withCookie($cookie);
    }
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                // 'token' => $token
            ];

            return response($response, 200);
        } catch (Throwable $e) {
            return response("Email Found", 209);
        }
    }

    public function logout(Request $request)
    {
        $cookie = cookie()->forget('jwt');
        Auth::logout();

        return response()->json('Successfully logged out')->withCookie($cookie);
    }

    public function test()
    {
        return response(['has_user'=>Auth::hasUser(),'name'=>Auth::user()],201);
    }

    public function user()
    {
        return response('hahahahah',200);
        return Auth::user();
    }
}
