<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                return view('admin_dash.orders');
            case 'users':
                $users = User::select('*')->orderBy('role', 'asc')->get();

                return view('admin_dash.users',[
                    'users' => $users
                ]);
        }
    }

    public function editUser($id, Request $request){

        $user = User::where('id', $id)->first();

        if($request->isMethod('get')){

            return view('admin_dash.editUser',[
                'user' => $user
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
                    'password' => Hash::make($request->password)
                ]);
            }else{
                User::where('id', $id)->update([
                    'name' => $request->name,
                    'age' => $request->age,
                    'email' => $request->email
                ]);
            }

            return redirect()->back();
        }
    }
}
