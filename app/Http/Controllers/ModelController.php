<?php

namespace App\Http\Controllers;

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

        $models = User::select('*')->where('role', 'model')->get();
        $model = null;

        foreach ($models as $item){
            if ($item->email == Auth::user()->email){
                $model = $item;
                break;
            }
        }

        switch ($page){
            case 'orders':
                return view('model_dash.orders', [
                    'model' => $model
                ]);
            case 'earnings':
                return view('model_dash.earnings', [
                    'model' => $model
                ]);
            case 'services':
                $services = Service::select('*')->where('name', Auth::user()->name)->get();

                return view('model_dash.services', [
                    'model' => $model,
                    'services' => $services
                ]);
            case 'chat':
                return view('model_dash.chat', [
                    'model' => $model
                ]);
        }
    }

    public function create_service(Request $request){
        $validated = $request->validate([
            'service_name' => 'required',
            'service_desc' => 'required',
            'price' => 'required'
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
