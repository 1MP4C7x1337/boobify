<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Withdrawal;
use Mockery\Generator\Method;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index($page){
        // if ($page=='orders'){
        //     return view('model_dash.orders');
        // }

        switch ($page){
            case 'orders':
                $orders = Orders::select('*')->orderBy('created_at', 'desc')->get();
                return view('admin_dash.orders', [
                    'orders' => $orders
                ]);
            case 'users':
                $users = User::select('*')->orderBy('role', 'asc')->get();

                return view('admin_dash.users',[
                    'users' => $users
                ]);
            case 'withdrawals':
                $withdrawals = Withdrawal::select('*')->orderBy('created_at', 'desc')->get();

                return view('admin_dash.withdrawals', [
                    'withdrawals' => $withdrawals
                ]);
        }
    }

    public function editUser($id, Request $request){

        $user = User::where('id', $id)->first();
        $roles = ['admin', 'partner', 'model', 'user'];

        if($request->isMethod('get')){

            return view('admin_dash.editUser',[
                'user' => $user,
                'roles' => $roles
            ]);

        }else if($request->isMethod('post')){

            // Validation
            if(($request->name != $user->name) or ($request->email != $user->email)){
                if (($request->name != $user->name) and ($request->email != $user->email)){
                    if($request->password != null){
                        $validated = $request->validate([
                            'name' => ['unique:users', 'required'],
                            'email' => ['unique:users', 'required'], 
                            'age' => 'int',
                            'password' => 'min:8'
                        ]);
                    }else{
                        $validated = $request->validate([
                            'name' => ['unique:users', 'required'],
                            'email' => ['unique:users', 'required'], 
                            'age' => 'int'
                        ]);
                    }
                }else if (($request->name != $user->name) and ($request->email == $user->email)){
                    if($request->password != null){
                        $validated = $request->validate([
                            'name' => ['unique:users', 'required'],
                            'email' => ['required'], 
                            'age' => 'int',
                            'password' => 'min:8'
                        ]);
                    }else{
                        $validated = $request->validate([
                            'name' => ['unique:users', 'required'],
                            'email' => 'required', 
                            'age' => 'int'
                        ]);
                    }
                }else if (($request->name == $user->name) and ($request->email != $user->email)){
                    if($request->password != null){
                        $validated = $request->validate([
                            'name' => 'required',
                            'email' => ['unique:users', 'required'], 
                            'age' => 'int',
                            'password' => 'min:8'
                        ]);
                    }else{
                        $validated = $request->validate([
                            'name' => 'required',
                            'email' => ['unique:users', 'required'], 
                            'age' => 'int'
                        ]);
                    }
                }
            }else if (($request->name == $user->name) and ($request->email == $user->email)){
                if($request->password != null){
                    $validated = $request->validate([
                        'name' => '',
                        'email' => '', 
                        'age' => 'int',
                        'password' => 'min:8'
                    ]);
                }else{
                    $validated = $request->validate([
                        'name' => '',
                        'email' => '', 
                        'age' => 'int'
                    ]);
                }
            }
            if($request->password != null){
                User::where('id', $id)->update([
                    'name' => $request->name,
                    'age' => $request->age,
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => Hash::make($request->password)
                ]);
            }else{
                User::where('id', $id)->update([
                    'name' => $request->name,
                    'age' => $request->age,
                    'role' => $request->role,
                    'email' => $request->email
                ]);
            }

            return redirect()->back();
        }
    }

    public function closeWithdrawal(Request $request){
        Withdrawal::where('id', $request->id)->update([
            'current_status' => 'CLOSED'
        ]);

        $withdrawal = Withdrawal::where('id', $request->id)->first();
        $model_name = $withdrawal->model_name;

        User::where('name', $model_name)->update([
            'balance' => '0'
        ]);

        return redirect()->back();
    }
}
