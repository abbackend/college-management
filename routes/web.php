<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('image/{filename}', [App\Http\Controllers\HomeController::class, 'displayImage'])->name('display.image');
    Route::get('results', [App\Http\Controllers\ResultController::class, 'index'])->name('student.results.index');
    Route::get('results/{result}', [App\Http\Controllers\ResultController::class, 'show'])->name('student.results.view');
});

Route::get('/', function() {
    return redirect()->route('login');
});
