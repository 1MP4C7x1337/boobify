<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class ModelController extends Controller
{

    public function index($page){
        
        

        switch ($page){
            case 'orders':
                $orders = Orders::select('*')->where('model_name', Auth::user()->name)->orderBy('created_at', 'desc')->get();
                return view('model_dash.orders', [
                    'orders' => $orders
                ]);
            case 'earnings':
                $orders_completed = count(Orders::where('model_name', Auth::user()->name)->where('current_status', 'COMPLETED')->get());
                $withdrawals = Withdrawal::where('model_name', Auth::user()->name)->orderBy('created_at', 'desc')->get();

                return view('model_dash.earnings', [
                    'orders_completed' => $orders_completed,
                    'withdrawals' => $withdrawals
                ]);
            case 'services':
                $services = Service::select('*')->where('name', Auth::user()->name)->get();

                return view('model_dash.services', [
                    'services' => $services
                ]);
            case 'chat':
                return redirect('dashboard/chat');
            
            case 'referrals':
                $referredUsers = User::where('referrer_id', Auth::user()->id)->get();

                return view('model_dash.referrals', [
                    'referredUsers' => $referredUsers
                ]);
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
        Service::where('id', $id)->where('name', Auth::user()->name)->delete();
        return redirect()->back();
    }

    public function withdrawRequest(Request $request){
        $model = Auth::user();

        if ($model->balance <= 0) {
            return redirect()->back()->withErrors(['balance' => 'Insufficient balance']);
        }

        Withdrawal::create([
            'model_name' => $model->name,
            'email' => $model->email,
            'amount' => $model->balance,
            'current_status' => 'OPENED'
        ]);

        return redirect()->back();
    }

}
