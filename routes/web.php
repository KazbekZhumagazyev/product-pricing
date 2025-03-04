<?php

use App\Http\Controllers\PriceCalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PriceCalculatorController::class, 'showForm']);
Route::post('/', [PriceCalculatorController::class, 'calculatePrice'])->name('calculate.price');
