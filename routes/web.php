<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
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
    ->name('reviews.edit')
    ->middleware('auth');
Route::post('/reviews/update/{id}', [ReviewController::class, 'update'])
    ->name('reviews.update')
    ->middleware('auth');
Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete'])
    ->name('reviews.delete')
    ->middleware('auth');
Route::post('/reviews/destroy/{id}', [ReviewController::class, 'destroy'])
    ->name('reviews.destroy')
    ->middleware('auth');

//game routes
Route::get('/game/create', [GameController::class, 'create'])
    ->name('game.create')
    ->middleware('auth');
Route::post('/game', [GameController::class, 'store'])
    ->name('game.store')
    ->middleware('auth');

//admin
Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware('auth');
Route::get('/admin/reviews', [AdminController::class, 'reviews'])
    ->name('admin.reviews')
    ->middleware('auth');
Route::get('/admin/users', [AdminController::class, 'users'])
    ->name('admin.users')
    ->middleware('auth');
Route::get('/admin/games', [AdminController::class, 'games'])
    ->name('admin.games')
    ->middleware('auth');
Route::get('/admin/review/activate/{id}', [ReviewController::class, 'active'])
    ->name('admin.review.active')
    ->middleware('auth');
Route::get('/admin/review/deactivate/{id}', [ReviewController::class, 'deactivate'])
    ->name('admin.review.active')
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
