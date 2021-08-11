<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Coinbase;

class PaymentsController extends Controller
{
    public function show(){
        
        $charge = Coinbase::createCharge([
            'name' => 'Test payment',
            'description' => 'test desc',
            'local_price' => [
                'amount' => 1,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
        ]);
        return view('testpayments');
    }

    public function webhook(){
        $charges = Coinbase::getCharges();
        dump($charges);
        $events = Coinbase::getEvents();
        dd($events);
    }

}
