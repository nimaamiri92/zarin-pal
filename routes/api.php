<?php

use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/transaction/pos',[TransactionController::class , 'createPosTransaction'])
    ->name('create-pos-transaction');

Route::post('/transaction/web',[TransactionController::class , 'createWebTransaction'])
    ->name('create-web-transaction');

Route::post('/transaction/mobile',[TransactionController::class , 'createMobileTransaction'])
    ->name('create-mobile-transaction');