<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Coinbase;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function show(){
        
        $charge = Coinbase::createCharge([
            'name' => 'Charge payment',
            'description' => 'test',
            'local_price' => [
                'amount' => 10,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
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

}
