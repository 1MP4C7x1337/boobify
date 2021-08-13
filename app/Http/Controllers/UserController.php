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

    public function dashboard($page){
        switch ($page){
            case 'orders':
                $orders = Orders::select('*')->where('user_name', Auth::user()->name)->orderBy('created_at', 'desc')->get();
                return view('user_dash.orders', [
                    'orders' => $orders
                ]);
            case 'chat':
                return redirect('dashboard/chat');
        }
    }
}
