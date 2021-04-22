<?php

use Illuminate\Support\Facades\Route;
// namespace app\Http\Controllers\TimeSheetController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register_create', [App\Http\Controllers\RegisterController::class, 'create'])->name('user.register_create');
Route::post('/register_update', [App\Http\Controllers\RegisterController::class, 'update'])->name('user.register_update');

Route::get('/edit/user/', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

Route::post('/edit/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/change-password', [App\Http\Controllers\UserController::class, 'change_password'])->name('user.change_password');

Route::post('/update-password', [App\Http\Controllers\UserController::class, 'update_password'])->name('user.update_password');

Route::resource('sheet', '\App\Http\Controllers\TimeSheetController');


// create timesheet 

