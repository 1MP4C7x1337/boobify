<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Coinbase;
use Illuminate\Support\Facades\DB;
use PDO;

class PaymentsController extends Controller
{
    public function show(){
        
        $charge = Coinbase::createCharge([
            'name' => 'Real payment',
            'description' => 'Description',
            'local_price' => [
                'amount' => 1,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
            'metadata' => [
                'user' => '',
                'price'
            ]
        ]);
    }

    public function webhook(){
        // $charges = Coinbase::getCharges();
        // dump($charges);
        // $events = Coinbase::getEvents();
        // dd($events);

        $orders = DB::table('coinbase_webhook_calls')->get();

        return view('testpayments', [
            'payments' => $orders
        ]);
    }

    public function createOrder($modelid, Request $request){
        if($request->isMethod('get')){
            $model = User::where('id', $modelid)->first();
            $services = Service::where('name', $model->name)->get();
            
            return view('orders.createOrder', [
                'model' => $model,
                'services' => $services
                
            ]);
        }else if($request->isMethod('post')){
            $validated = $request->validate([
                'service' => 'required',
                'info' => 'required'
            ]);

            $charge = Coinbase::createCharge([
                'name' => 'Real payment',
                'description' => 'Description',
                'local_price' => [
                    'amount' => 1,
                    'currency' => 'USD',
                ],
                'pricing_type' => 'fixed_price',
                'metadata' => [
                    'user' => $request->model,
                    'price' => $request->price
                ]
            ]);
        }
    }

}
