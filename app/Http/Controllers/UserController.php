<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\Models\User;

class UserController extends Controller
{

    /*Render loading page */
    public function index()
    {
        $models = User::select('*')->where('role', 'model')->get();
        return view('index', [
            'models' => $models
        ]);
    }

    public function dashboard(){
        
    }
}
