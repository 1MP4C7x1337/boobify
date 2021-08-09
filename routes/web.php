<?php

use App\Http\Controllersa\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Cloudinary\Configuration\Configuration;
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

Route::get('/', function () {
    return view('index');
})->name('main');

Route::get('/join', function(){
    return view('modelSubmission');
})->name('modelSubmission');

Route::get('/test', function(){
    return view('imgUpload');
});

Route::get('/check', [UserController::class, 'userOnlineStatus']);

Auth::routes();
