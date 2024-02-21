<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    

    public function index(){

        $user = User::all();

        return response()->json($user);

    }
}
