<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

//basic pagina routes
Route::get('/', [PageController::class, 'home'])
    ->name('home');
Route::get('/about-us', [PageController::class, 'about'])
    ->name('about-us');

//review routes
Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');
Route::get('/reviews/details/{id}', [ReviewController::class, 'show'])
    ->name('reviews.details');
//review routes waar je ingelogd voor moet zijn
Route::middleware('auth')->group(function () {
    Route::get('/reviews/create', [ReviewController::class, 'create'])
        ->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');
    Route::get('/reviews/edit/{id}', [ReviewController::class, 'edit'])
        ->name('reviews.edit');
    Route::post('/reviews/update/{id}', [ReviewController::class, 'update'])
        ->name('reviews.update');
    Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete'])
        ->name('reviews.delete');
    Route::post('/reviews/destroy/{id}', [ReviewController::class, 'destroy'])
        ->name('reviews.destroy');
});

//game routes
Route::middleware('auth')->group(function () {
    Route::get('/game/create', [GameController::class, 'create'])
        ->name('game.create');
    Route::post('/game', [GameController::class, 'store'])
        ->name('game.store');
});

//comments routes
Route::middleware('auth')->group(function (){
    Route::get('/comment/create/{id}', [CommentController::class, 'create'])
        ->name('comment.create');
    Route::post('/comment', [CommentController::class, 'store'])
        ->name('comment.store');
});

//admin routes
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
    Route::get('/admin/reviews', [AdminController::class, 'reviews'])
        ->name('admin.reviews');
    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');
    Route::get('/admin/games', [AdminController::class, 'games'])
        ->name('admin.games');
    Route::get('/admin/genres', [AdminController::class, 'genres'])
        ->name('admin.genres');
    Route::get('/admin/review/activate/{id}', [ReviewController::class, 'active'])
        ->name('admin.review.active');
    Route::get('/admin/review/deactivate/{id}', [ReviewController::class, 'deactivate'])
        ->name('admin.review.deactive');
    Route::get('/admin/genre/activate/{id}', [GenreController::class, 'active'])
        ->name('admin.genre.active');
    Route::get('/admin/genre/deactivate/{id}', [GenreController::class, 'deactivate'])
        ->name('admin.genre.deactive');
});

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
