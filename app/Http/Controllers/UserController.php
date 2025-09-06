<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use App\Models\Withdrawal;

class UserController extends Controller
{

    /*Render loading page */
    public function index()
    {
        try {
            $models = User::where('role', 'model')->get();
        } catch (\Exception $e) {
            // Database may be unavailable during testing or setup
            $models = collect();
        }

        return view('index', [
            'models' => $models,
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
            case 'withdraw':
                $withdrawals = Withdrawal::where('model_name', Auth::user()->name)->orderBy('created_at', 'desc')->get();

                return view('user_dash.withdraw', [
                    'withdrawals' => $withdrawals
                ]);
        }
    }

    public function updatePartnerReferral(Request $request){
        $validated = $request->validate([
            'referral' => 'required|integer|min:0'
        ]);

        User::where('id', Auth::id())->update([
            'partner_referral' => $validated['referral']
        ]);

        return redirect()->back();
    }

}
