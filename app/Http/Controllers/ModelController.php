<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ModelController extends Controller
{

    public function index($page){
        // if ($page=='orders'){
        //     return view('model_dash.orders');
        // }

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

    public function create_service(Request $request){
        $validated = $request->validate([
            'service_name' => 'required',
            'service_desc' => 'required',
            'price' => ['required', 'int']
        ]);
        Service::create([
            'name' => Auth::user()->name,
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc,
            'price' => $request->price
        ]);
        return redirect()->back();
        
    }

    public function delete_service($id){
        Service::where('id', $id)->delete();
        return redirect()->back();
    }

}
