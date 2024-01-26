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
Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
Route::resource('subjects', App\Http\Controllers\Admin\SubjectController::class);
Route::resource('users', App\Http\Controllers\Admin\UserController::class);
Route::resource('results', App\Http\Controllers\Admin\ResultController::class);
Route::get('results/publish/{result}', [App\Http\Controllers\Admin\ResultController::class, 'publish'])->name('results.publish');
Route::get('results/generate/{user}', [App\Http\Controllers\Admin\ResultController::class, 'generate'])->name('results.generate');