<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

//basic pagina routes
Route::get('/', [PageController::class, 'home'])
    ->name('home');
Route::get('/about-us', [PageController::class, 'about'])
    ->name('about-us');

//review routes
Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])
    ->name('reviews.create')
    ->middleware('auth');
Route::get('/reviews/details/{id}', [ReviewController::class, 'show'])
    ->name('reviews.details');
Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');
Route::get('/reviews/edit/{id}', [ReviewController::class, 'edit'])
    ->name('review.edit')
    ->middleware('auth');
Route::post('/reviews/update/{id}', [ReviewController::class, 'update'])
    ->name('reviews.update')
    ->middleware('auth');

//dashboard van profiel
Route::get('/dashboard', [ProfileController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

//breeze stuff
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
