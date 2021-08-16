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
    /*Render search page */
    public function search(Request $request){
        $result = User::where('role', 'model')->where('name', 'like', "%$request->search%")->get();
        return view('search', [
            'result' => $result
        ]);
    }
    /**
     * Show user online status.
     *
     */
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }
}
