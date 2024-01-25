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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
Route::resource('/courses', App\Http\Controllers\CourseController::class);
Route::resource('/users', App\Http\Controllers\UserController::class);