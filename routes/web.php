<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSampelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// LOGIN
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DataSampelController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/data-sampel', [DataSampelController::class, 'index'])
    ->middleware('auth')
    ->name('data.sampel');

Route::post('/data-sampel', [DataSampelController::class, 'store'])
    ->middleware('auth')
    ->name('data.sampel.store');

Route::get('/stok-bahan', function () {
    return view('stok_bahan');
})->middleware('auth')->name('stok.bahan');

Route::get('/stok-alat', function () {
    return view('stok_alat');
})->middleware('auth')->name('stok.alat');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// AUTH
require __DIR__.'/auth.php';