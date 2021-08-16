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
use App\Http\Middleware\VerifyIfAdmin;
use App\Http\Middleware\VerifyIfModel;
use App\Http\Middleware\VerifyIfUser;

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

//Order routes
Route::get('createOrder/{modelid}', [PaymentsController::class, 'createOrder'])->name('create_order');
Route::post('createOrder/{modelid}', [PaymentsController::class, 'createOrder'])->name('create_order');



//Admin routes
Route::get('/adminPanel/{page}', [AdminController::class, 'index'])->middleware(VerifyIfAdmin::class)->name('adminPanel');
Route::get('adminPanel', function(){
    return redirect('adminPanel/orders');
})->middleware(VerifyIfAdmin::class);

Route::get('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->middleware(VerifyIfAdmin::class)->name('editUser');
Route::post('adminPanel/editUser/{id}', [AdminController::class, 'editUser'])->middleware(VerifyIfAdmin::class)->name('editUser');

Route::get('search', function () {
    return view('search');
});
Route::post('search', [UserController::class, 'search'])->name('search');

Auth::routes();