<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('main');

Route::get('/join', function(){
    return view('modelSubmission');
})->name('modelSubmission');

// Model routes
Route::get('/dashboard/{page}', [ModelController::class, 'index'])->name('dashboard');
Route::get('dashboard', function(){
    return redirect('dashboard/orders');
});
Route::post('create_service', [ModelController::class, 'create_service'])->name('create_service');
Route::get('delete_service/{id}', [ModelController::class, 'delete_service'])->name('delete_service');



//Admin routes
Route::get('/adminPanel/{page}', [AdminController::class, 'index'])->name('adminPanel');
Route::get('adminPanel', function(){
    return redirect('adminPanel/orders');
});

Route::get('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->name('editUser');
Route::post('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->name('editUser');



Route::get('/check', [UserController::class, 'userOnlineStatus']);

Route::get('/retrieve', [PaymentsController::class, 'show']);
Route::Get('/delete', [PaymentsController::class, 'delete']);
Auth::routes();