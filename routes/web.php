<?php

use App\Http\Controllers\ExchangeRatesController;
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
Route::prefix('api')->group(function () {
    Route::prefix('rates.json')->group(function () {
        Route::post('/', [ExchangeRatesController::class, 'createAction'])->name('create');
        Route::get('/', [ExchangeRatesController::class, 'listAction'])->name('list');
    });
});



