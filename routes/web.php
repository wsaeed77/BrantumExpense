<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\dashboardController;
use App\Http\Controllers\Frontend\formController;
use App\Http\Controllers\Frontend\overviewController;


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
Route::get('/', [dashboardController::class, 'dashboard']);
Route::get('form', [formController::class, 'dashboard']);
Route::get('overview', [overviewController::class, 'dashboard']);


