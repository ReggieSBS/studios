<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;
use App\Http\Middleware\Authenticate;
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
    return view('index');
});
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/ebooks', [EbookController::class, 'dashboard'])->middleware('auth')->name('ebooks');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/ai-request', [AiController::class, 'write'])->middleware('auth')->name('ai-request');