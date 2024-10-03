<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PageController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/ai-request', [AiController::class, 'write'])->middleware('auth')->name('ai-request');
Route::get('/ai-response', [AiController::class, 'read'])->middleware('auth')->name('ai-response');

Route::get('/ebook/{id}', [EbookController::class, 'read'])->middleware('auth')->name('ebook.read');
Route::post('/ebook/write', [EbookController::class, 'write'])->middleware('auth')->name('ebook.write');

Route::get('/page/{id}', [PageController::class, 'read'])->middleware('auth')->name('page.read');
Route::post('/page/write', [PageController::class, 'write'])->middleware('auth')->name('page.write');

Route::get('/chapter/{id}', [ChapterController::class, 'read'])->middleware('auth')->name('chapter.read');
Route::post('/chapter/write', [ChapterController::class, 'write'])->middleware('auth')->name('chapter.write');

Route::get('/characters', [CharacterController::class, 'overview'])->middleware('auth')->name('character.overview');
Route::get('/character/{id}', [CharacterController::class, 'read'])->middleware('auth')->name('character.read');
Route::post('/character/write', [CharacterController::class, 'write'])->middleware('auth')->name('character.write');

