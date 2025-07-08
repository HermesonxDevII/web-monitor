<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->group(function () {
        Route::prefix('/form')->group(function () {
            Route::get('/site', [SiteController::class, 'create'])->name('sites.create');
        });

        Route::prefix('/create')->group(function () {
            Route::post('/site', [SiteController::class, 'store'])->name('sites.store');
        });


        Route::prefix('/list')->group(function () {
            Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
        });

        Route::prefix('/update')->group(function () {

        });

        Route::prefix('/delete')->group(function () {

        });
    });
});

require __DIR__.'/auth.php';
