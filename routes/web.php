<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{ SiteController, EndpointController, CheckController };
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->group(function () {
        Route::resource('/sites', SiteController::class);
        Route::resource('/{site}/endpoints', EndpointController::class);
        Route::resource('/{site}/{endpoint}/checks', CheckController::class);
    });
});

require __DIR__.'/auth.php';
