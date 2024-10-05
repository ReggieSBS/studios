<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArchetypeController;
use App\Http\Controllers\ActController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// AI CHAT
Route::post('/ai-request', [AiController::class, 'write'])->middleware('auth')->name('ai-request');
Route::get('/ai-response', [AiController::class, 'read'])->middleware('auth')->name('ai-response');





// EBOOK
Route::get('/ebook/{id}', [EbookController::class, 'read'])->middleware('auth')->name('ebook.read');
Route::post('/ebook/write', [EbookController::class, 'write'])->middleware('auth')->name('ebook.write');
Route::get('/ebook-content', [EbookController::class, 'content'])->middleware('auth')->name('ebook-content');
Route::post('/ebook-content/update', [EbookController::class, 'contentupdate'])->middleware('auth')->name('ebook-content.update');
Route::get('/ebook-content/extract', [EbookController::class, 'extract'])->middleware('auth')->name('ebook.extract');

// PAGES
Route::get('/page/{id}', [PageController::class, 'read'])->middleware('auth')->name('page.read');
Route::post('/page/write', [PageController::class, 'write'])->middleware('auth')->name('page.write');
Route::get('/page-content', [PageController::class, 'content'])->middleware('auth')->name('page-content');
Route::post('/page-content/update', [PageController::class, 'contentupdate'])->middleware('auth')->name('page-content.update');
Route::post('/page/write/summery', [PageController::class, 'writesummery'])->middleware('auth')->name('page.summery');
Route::post('/page/new', [PageController::class, 'new'])->middleware('auth')->name('page.new');

// CHAPTERS
Route::get('/chapter/{id}', [ChapterController::class, 'read'])->middleware('auth')->name('chapter.read');
Route::post('/chapter/write', [ChapterController::class, 'write'])->middleware('auth')->name('chapter.write');
Route::post('/chapter/new', [ChapterController::class, 'new'])->middleware('auth')->name('chapter.new');
Route::post('/chapter/pages', [ChapterController::class, 'pages'])->middleware('auth')->name('chapter.pages');
Route::post('/chapter/write/summery', [ChapterController::class, 'writesummery'])->middleware('auth')->name('chapter.summery');
Route::get('/chapter-content', [ChapterController::class, 'content'])->middleware('auth')->name('chapter-content');
Route::get('/chapter-data', [ChapterController::class, 'metadata'])->middleware('auth')->name('chapter-data');
Route::post('/chapter-content/update', [ChapterController::class, 'contentupdate'])->middleware('auth')->name('chapter-content.update');
Route::post('/chapter-data/update-chapternr', [ChapterController::class, 'chapternr'])->middleware('auth')->name('chapter-data.update.chapternr');
Route::post('/chapter-data/update-chaptertitle', [ChapterController::class, 'chaptertitle'])->middleware('auth')->name('chapter-data.update.chaptertitle');

// CHARACTERS
Route::get('/characters', [CharacterController::class, 'overview'])->middleware('auth')->name('character.overview');
Route::get('/character/{id}', [CharacterController::class, 'read'])->middleware('auth')->name('character.read');
Route::post('/character/write', [CharacterController::class, 'write'])->middleware('auth')->name('character.write');
Route::post('/character/update', [CharacterController::class, 'update'])->middleware('auth')->name('character.update');
Route::post('/character/update-details', [CharacterController::class, 'updatedetails'])->middleware('auth')->name('character.update-details');





// MOVIE

// FORMULA
Route::get('/formula', [MovieController::class, 'formula'])->middleware('auth')->name('movie.formula');
Route::post('/movie/create', [MovieController::class, 'write'])->middleware('auth')->name('movie.create');

// ARCHETYPES
Route::get('/archetypes', [ArchetypeController::class, 'overview'])->middleware('auth')->name('movie.archetypes');
Route::post('/archetype/create', [ArchetypeController::class, 'write'])->middleware('auth')->name('archetype.write');

// ACTS
Route::get('/acts', [ActController::class, 'overview'])->middleware('auth')->name('movie.acts');

// PLOTS

// ROLES