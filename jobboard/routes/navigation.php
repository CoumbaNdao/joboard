<?php

use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;

Route::prefix('/offre')->name('offre.')->group(static function() {
    Route::get('/', [OffreController::class, 'index'])->name('index');
    Route::get('/search', [OffreController::class, 'index'])->name('index');
    Route::get('/edit', [OffreController::class, 'index'])->name('index');
    Route::post('/update', [OffreController::class, 'index'])->name('index');
});
