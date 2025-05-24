<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MovieController::class, 'getRecommendations'])->name('Welcome');
// Route::get('/home', function(){ return Inertia::render('Home');});
Route::get('/home',[MovieController::class,'getMovies'])->name('Home');
Route::get('/about', [PageController::class, 'about'])->name('About');
Route::get('/contact', [PageController::class, 'contact'])->name('Contact');

Route::prefix('movies')->group(function () {
    // Display popular movies (example)
    Route::get('/', [MovieController::class, 'index'])->name('movies.index');
    
    // Display movie details
    Route::get('/{movie}', [MovieController::class, 'show'])->name('movies.show');
    
    // Get recommendations for a specific movie
    Route::get('/{movie}/recommendations', [MovieController::class, 'recommendations'])
        ->name('movies.recommendations');
    
    // Search movies (optional)
    Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('Login');

Route::get('/signup', function() {
    return Inertia::render('Auth/Signup');
})->name('Signup');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
