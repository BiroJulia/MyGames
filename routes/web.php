<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Services\IGDBService;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use MarcReichel\IGDBLaravel\Models\Game;
use App\Http\Controllers\GameDetailController;


Route::get('/games', [DashboardController::class, 'show']);



Route::get('/', function () {
    return Inertia::render('Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/game/{id}', [GameDetailController::class, 'show'])
     ->name('game.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
