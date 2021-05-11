<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//register
Route::get('/register_create', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('user.register_create');
Route::post('/register_store', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('user.register_store');

//edit
Route::get('/edit/user/', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edit/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

//password
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'change_password'])->name('user.change_password');
Route::post('/update-password', [App\Http\Controllers\UserController::class, 'update_password'])->name('user.update_password');

//send mail
Route::get('/send-mail', [App\Http\Controllers\UserController::class, 'send_mail'])->name('user.send_mail');

//admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', '\App\Http\Controllers\Admin\UsersController');
});

// Timesheet
Route::resource('sheet', '\App\Http\Controllers\TimeSheetController');
// Task
Route::resource('sheet.task', '\App\Http\Controllers\TaskController');
// Route::post('sheet/{id}/task', [App\Http\Controllers\UserController::class, 'edit'])->where('id', '[0-9]+')->name('sheet.task.store');


Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');

//export
Route::get('/export', [App\Http\Controllers\TimeSheetController::class, 'export'])->name('export');

