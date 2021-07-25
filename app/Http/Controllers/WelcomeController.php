<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


use carbon\carbon;

class WelcomeController extends Controller
{

    public function welcome(Request $request){
    	dd("Welcome");
    }
}
