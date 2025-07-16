<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{ SiteController, EndpointController };
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
            Route::get('/site/create', [SiteController::class, 'create'])->name('sites.create');
            Route::get('/site/edit/{site}', [SiteController::class, 'edit'])->name('sites.edit');
            
            Route::get('/endpoint/create/{site}', [EndpointController::class, 'create'])->name('endpoints.create');
            Route::get('/endpoint/edit/{site}/{endpoint}', [EndpointController::class, 'edit'])->name('endpoints.edit');
        });

        Route::prefix('/create')->group(function () {
            Route::post('/site', [SiteController::class, 'store'])->name('sites.store');
            Route::post('/endpoint/{site}', [EndpointController::class, 'store'])->name('endpoints.store');
        });


        Route::prefix('/list')->group(function () {
            Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
            Route::get('/endpoints/{site}', [EndpointController::class, 'index'])->name('endpoints.index');
        });

        Route::prefix('/update')->group(function () {
            Route::put('/site/{site}', [SiteController::class, 'update'])->name('sites.update');
            Route::put('/endpoint/{site}/{endpoint}', [EndpointController::class, 'update'])->name('endpoints.update');
        });

        Route::prefix('/delete')->group(function () {
            Route::delete('/site/{site}', [SiteController::class, 'destroy'])->name('sites.destroy');
            Route::delete('/endpoint/{site}/{endpoint}', [EndpointController::class, 'destroy'])->name('endpoints.destroy');
        });
    });
});

require __DIR__.'/auth.php';
