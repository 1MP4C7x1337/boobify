<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VerifyIfAdmin;
use App\Http\Middleware\VerifyIfModel;
use App\Http\Middleware\VerifyIfUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Symfony\Component\HttpFoundation\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\ChMessage;
use App\Models\Orders;
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
Route::get('/dashboard/{page}', [ModelController::class, 'index'])->middleware(VerifyIfModel::class)->name('dashboard');
Route::get('dashboard', function(){
    return redirect('dashboard/orders');
})->middleware(VerifyIfModel::class);
Route::post('create_service', [ModelController::class, 'create_service'])->middleware(VerifyIfModel::class)->name('create_service');
Route::get('delete_service/{id}', [ModelController::class, 'delete_service'])->middleware(VerifyIfModel::class)->name('delete_service');
Route::post('withdraw', [ModelController::class, 'withdrawRequest'])->name('withdraw');

//User routes
Route::get('/user_dashboard/{page}', [UserController::class, 'dashboard'])->middleware(VerifyIfUser::class)->name('user_dashboard');
Route::get('user_dashboard', function(){
    return redirect('user_dashboard/orders');
})->middleware(VerifyIfUser::class);

Route::post('updatePartnerReferral', [UserController::class, 'updatePartnerReferral'])->name('updatePartnerReferral');

//Admin routes
Route::get('/adminPanel/{page}', [AdminController::class, 'index'])->middleware(VerifyIfAdmin::class)->name('adminPanel');
Route::get('adminPanel', function(){
    return redirect('adminPanel/orders');
})->middleware(VerifyIfAdmin::class);
Route::post('closeWithdrawal', [AdminController::class, 'closeWithdrawal'])->middleware(VerifyIfAdmin::class)->name('closeWithdrawal');

Route::get('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->middleware(VerifyIfAdmin::class)->name('editUser');
Route::post('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->middleware(VerifyIfAdmin::class)->name('editUser');

//Order routes
Route::get('createOrder/{modelid}', [PaymentsController::class, 'createOrder'])->middleware('auth')->name('create_order');
Route::post('createOrder/{modelid}', [PaymentsController::class, 'createOrder'])->middleware('auth')->name('create_order');

Route::get('viewOrder/{code}', [PaymentsController::class, 'viewOrder'])->middleware('auth')->name('viewOrder');

Route::get('completeOrder/{code}', [PaymentsController::class, 'completeOrder'])->middleware(VerifyIfModel::class)->name('completeOrder');
Route::post('completeOrder/{code}', [PaymentsController::class, 'completeOrder'])->middleware(VerifyIfModel::class)->name('completeOrder');

Route::get('receiveImages/{code}', [PaymentsController::class, 'receiveImages'])->middleware('auth')->name('receiveImages');

//Referrals


Auth::routes();