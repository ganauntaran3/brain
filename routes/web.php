<?php

use App\Http\Controllers\{DashboardController, HomeController};
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\Band\AlbumController;
use Illuminate\Support\Facades\{Route, Auth};

Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');   
    
    Route::group(['prefix' => 'bands'], function () {
        Route::get('create', [BandController::class, 'create'])->name('bands.create');
        Route::post('post', [BandController::class, 'store'])->name('bands.post');
        Route::get('table', [BandController::class, 'table'])->name('bands.table');
        Route::get('edit/{band:slug}', [BandController::class, 'edit'])->name('bands.edit');
        Route::put('update/{band:slug}', [BandController::class, 'update'])->name('bands.update');
        Route::delete('delete/{band:slug}', [BandController::class, 'destroy'])->name('bands.delete');
    });

    Route::prefix('albums')->group( function () {
        Route::get('create', [AlbumController::class, 'create'])->name('albums.create');
        Route::post('post', [AlbumController::class, 'store'])->name('albums.post');
        Route::get('table', [AlbumController::class, 'table'])->name('albums.table');
    });

});
