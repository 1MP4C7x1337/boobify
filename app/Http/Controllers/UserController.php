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
                $orders = Orders::select('*')->where('model_name', Auth::user()->name)->orderBy('created_at', 'desc')->get();
                return view('model_dash.orders', [
                    'orders' => $orders
                ]);
            case 'earnings':
                return view('model_dash.earnings');
            case 'services':
                $services = Service::select('*')->where('name', Auth::user()->name)->get();

                return view('model_dash.services', [
                    'services' => $services
                ]);
            case 'chat':
                return redirect('dashboard/chat');
        }
    }
}
