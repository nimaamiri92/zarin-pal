<?php

use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('/transactions',[TransactionController::class , 'transactions'])
    ->name('get-last-month-statistics');

Route::post('/transaction/pos',[TransactionController::class , 'createPosTransaction'])
    ->name('create-pos-transaction');

Route::post('/transaction/web',[TransactionController::class , 'createWebTransaction'])
    ->name('create-web-transaction');

Route::post('/transaction/mobile',[TransactionController::class , 'createMobileTransaction'])
    ->name('create-mobile-transaction');
