<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

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

            case 'referrals':
                $referredUsers = count(User::where('referrer_id', Auth::user()->id)->get());

                $compensation = 100 - User::where('role', 'partner')->first()->partner_referral;

                return view('user_dash.referrals', [
                    'referredUsers' => $referredUsers,
                    'compensation' => $compensation
                ]);
        }
    }

    public function updatePartnerReferral(Request $request){
        User::where('id', Auth::user()->id)->update([
            'partner_referral'=>$request->referral
        ]);
        return redirect()->back();
    }

}
