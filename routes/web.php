<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('/home');
})->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//ROTAS PRODUTO
Route::resource('product', ProductController::class)->middleware('auth');

//ROTAS VENDA
Route::resource('sale', SaleController::class)->middleware('auth');

//ROTAS PRODUCT-SALE
Route::post('/{sale}', [ProductSaleController::class, 'store'])->name('product-sale.store')->middleware('auth');
Route::get('export/{sale}', [ProductSaleController::class, 'export'])->middleware('auth')->name('export');
