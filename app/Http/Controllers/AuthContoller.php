<?php

namespace App\Http\Controllers;

use \stdClass;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthContoller extends Controller
{
    //THIS FUNCTION IS TO REGISTER USERS AND RETURN TOKEN ACCESS

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
        ->json(['data'=> $user,'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    //THIS FUNCTION IS FOR LOGIN USER AND RETURN UPDATE TOKEN ACCESS

    public function login(Request $request)
    {

        if(!Auth::attempt($request->only('email','password'))){
            
            return response()
            ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json([
            'message' => 'Hi '. $user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
            ]);

    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Cambiar el estado de todos los tokens de acceso del usuario a false
        $user->token->updateToken(function ($token) {
            $token->update(['experies_at' => 'inactivo']);
        });

        return response()->json(['message' => 'Logged out successfully']);
    }


    
}
