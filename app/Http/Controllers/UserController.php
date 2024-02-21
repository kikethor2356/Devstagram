<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
   

    public function profile()
    {
        $user = Auth::user();
        // Devolver el usuario con el token de acceso en la respuesta JSON
        return response()->json($user);
    }

    

    
}
