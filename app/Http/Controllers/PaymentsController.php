<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Coinbase;

class PaymentsController extends Controller
{
    public function show(){
        $charges = Coinbase::getCharges();
        dd($charges);
    }

    public function delete(){
        Checkout::deleteById();
    }

}
