<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyAccountController;

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
    return view('auth.login');
});

    Route::resource('item','ItemController');
    Route::resource('wallet','WalletController');
    Route::resource('order','OrderController');
    Route::resource('all_order','AllOrderController');
    Route::resource('yet_to_be_delivered','YetToBeDeliveredController');
    Route::resource('cancel_order','CancelOrderController');
    Route::resource('paused_order','PausedOrderController');
    Route::resource('all_ticket','TicketController');
    Route::resource('answered','AnsweredController');
    Route::resource('opened','OpenedController');
    Route::resource('user','UserController');
    Route::resource('account','MyAccountController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
