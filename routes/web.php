<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('login');
});

Auth::routes();

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/prepaid-balance', [OrderController::class, 'index']);
        Route::get('/product-page', [OrderController::class, 'productPage']);
        Route::post('/prepaid-balance-submit', [OrderController::class, 'prepaidbalanceSubmit']);
        Route::post('/product-page-submit', [OrderController::class, 'productpageSubmit']);
        Route::get('success/{id}', [DetailOrderController::class, 'index'])->name('success');
        Route::post('payment/', [DetailOrderController::class, 'store']);
        Route::get('payments/{id}', [DetailOrderController::class, 'showPayment']);
        Route::post('order-history', [DetailOrderController::class, 'orderHistory']);
        Route::get('update-status/{id}', [DetailOrderController::class, 'updateStatus']);
    }
);
