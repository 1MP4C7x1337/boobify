<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Coinbase;

class PaymentsController extends Controller
{
    public function show(){
        $charges = Coinbase::getCharges();
        
        $charge = Coinbase::createCharge([
            'name' => 'Test payment',
            'description' => 'test desc',
            'local_price' => [
                'amount' => 1,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
        ]);
        // dd($charges);
        return view('testpayments');
    }

    public function delete(){
        Checkout::deleteById();
    }

}
