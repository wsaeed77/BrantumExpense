<?php

use App\Http\Controllers\FormfillController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\dashboardController;
use App\Http\Controllers\Frontend\formController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\AuthController;

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

Route::get('/',[\App\Http\Controllers\AuthController::class, 'Show_Login'])->middleware('login')->name('logpg');

Route::post('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('loged.in');


Route::get('/signup' ,[\App\Http\Controllers\SignUpController::class,'showSignUpForm'])->middleware('login')->name('sign.up');

Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('sign.UP');

Route::get('/dashboard', [dashboardController::class ,'dashboard'])->middleware('auth')->name("dashboard");


Route::get('form', [formController::class, 'dashboard'])->middleware('auth');
Route::get('overview', [expenseController::class, 'overview'])->middleware('auth')->name('overview.expenditure');


Route::post('/submit-form', [expenseController::class, 'store'])->middleware('auth')->name('formfill.submit');

Route::delete('/delete-entry/{id}', 'App\Http\Controllers\expenseController@destroy')->middleware('auth','usertype')->name('entry.destroy');

Route::get('/edit-entry/{id}', 'App\Http\Controllers\expenseController@edit')->middleware('auth','usertype')->name('entry.edit');

Route::post('/update-entry/{id}', 'App\Http\Controllers\expenseController@update')->middleware('auth','usertype')->name('entry.update');


Route::get('/team/{name}', [TeamController::class, 'showDetails'])->middleware('auth')->name('team.details');

Route::get('/logout', [AuthController::class ,'logout'])->name('logout');

Route::get('/fetch-entries', [expenseController::class, 'fetchEntries'])->name('fetch.entries');

Route::get('/userapproval',[AuthController::class,'userApproval'])->middleware('auth','usertype')->name('user.approval');

Route::post('/approve/{id}',[AuthController::class, 'approve'])->middleware('auth')->name('submit.approval');

Route::delete('/delete-user/{id}',[AuthController::class,'deleteUser'])->middleware('auth')->name('user.delete');








