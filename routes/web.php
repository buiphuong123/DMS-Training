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

//user
Route::get('/register_create', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('user.register_create');
Route::post('/register_store', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('user.register_store');
Route::get('/edit/user/', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edit/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'change_password'])->name('user.change_password');
Route::post('/update-password', [App\Http\Controllers\UserController::class, 'update_password'])->name('user.update_password');

//send mail
Route::get('/send-mail', [App\Http\Controllers\UserController::class, 'send_mail'])->name('user.send_mail');

//admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', '\App\Http\Controllers\Admin\UsersController');
});

// Timesheet
Route::get('sheet', [\App\Http\Controllers\TimeSheetController::class, 'index'])->name('sheet.index');
Route::get('sheet/create', [\App\Http\Controllers\TimeSheetController::class, 'create'])->name("sheet.create");
Route::post('sheet', [\App\Http\Controllers\TimeSheetController::class, 'store'])->name('sheet.store');
Route::get('sheet/{sheet}/edit', [\App\Http\Controllers\TimeSheetController::class, 'edit'])->name('sheet.edit');
Route::put('sheet/{sheet}', [\App\Http\Controllers\TimeSheetController::class, 'update'])->name('sheet.update');
Route::delete('sheet/{sheet}', [\App\Http\Controllers\TimeSheetController::class, 'destroy'])->name('sheet.destroy');
Route::get('sheet/{sheet}', [\App\Http\Controllers\TimeSheetController::class, 'edit'])->name('sheet.show');

// Task
Route::get('sheet/{sheet}/task', [\App\Http\Controllers\TaskController::class, 'index'])->name('sheet.task.index');
Route::get('sheet/{sheet}/task/create', [\App\Http\Controllers\TaskController::class, 'create'])->name("sheet.task.create");
Route::post('sheet/{sheet}/task', [\App\Http\Controllers\TaskController::class, 'store'])->name('sheet.task.store');
Route::get('sheet/{sheet}/task/{task}/edit', [\App\Http\Controllers\TaskController::class, 'edit'])->name('sheet.task.edit');
Route::put('sheet/{sheet}/task/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('sheet.task.update');
Route::delete('sheet/{sheet}/task/{task}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('sheet.task.destroy');

//report
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');

//export
Route::get('/export', [App\Http\Controllers\TimeSheetController::class, 'export'])->name('export');

//calendar
Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar');

//managment user
Route::get('/managment', [App\Http\Controllers\UserController::class, 'manager'])->name('managment');

