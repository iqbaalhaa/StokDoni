<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReceivedItemController;

use App\Http\Controllers\SupplierController;
use App\Models\Costumer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::resource('category', CategoryController::class)->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');

Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('item', ItemController::class)->middleware('auth');

Route::resource('supplier', SupplierController::class)->middleware('auth');

Route::resource('received-item', ReceivedItemController::class)->middleware('auth');

Route::resource('costumer', CostumerController::class)->middleware('auth');