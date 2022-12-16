<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\ClientsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BillingController;

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



Route::namespace('Auth')->group(function(){
	Route::view('/login','auth.login')->name('login')->middleware('guest');
	Route::post('/login',[LoginController::class,'authenticate'])->name('login.post');
});

Route::middleware(['auth'])->group(function(){
	//Crud Clients
	Route::get('/clients', [ClientsController::class, 'index']);
    Route::post('/clients/create', [ClientsController::class, 'store']);
	Route::get('/clients/{id}', [ClientsController::class, 'getClient']);
    Route::post('/clients/update', [ClientsController::class, 'update']);
    Route::delete('/clients/delete/{id}', [ClientsController::class, 'delete']);

	//Crud Billings
	Route::get('/billing', [BillingController::class, 'index']);
    Route::post('/billing/create', [BillingController::class, 'store']);
	Route::get('/clients/{id}', [BillingController::class, 'getBilling']);
    Route::post('/billing/update', [BillingController::class, 'update']);
    Route::delete('/billing/delete/{id}', [BillingController::class, 'delete']);
});
