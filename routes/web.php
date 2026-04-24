<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSampelController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\AlatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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

Route::get('/data-sampel/{id}/edit', [DataSampelController::class, 'edit'])
    ->middleware('auth')
    ->name('sampel.edit');

Route::put('/data-sampel/{id}', [DataSampelController::class, 'update'])
    ->middleware('auth')
    ->name('sampel.update');

Route::delete('/data-sampel/{id}', [DataSampelController::class, 'destroy'])
    ->middleware('auth')
    ->name('sampel.destroy');

Route::get('/stok-bahan', [BahanController::class, 'index'])
    ->middleware('auth')
    ->name('stok.bahan');

Route::post('/stok-bahan', [BahanController::class, 'store'])
    ->middleware('auth')
    ->name('stok.bahan.store');

Route::get('/stok-bahan/{id}/edit', [BahanController::class, 'edit'])
    ->middleware('auth')
    ->name('bahan.edit');

Route::put('/stok-bahan/{id}', [BahanController::class, 'update'])
    ->middleware('auth')
    ->name('bahan.update');

Route::delete('/stok-bahan/{id}', [BahanController::class, 'destroy'])
    ->middleware('auth')
    ->name('bahan.destroy');


Route::get('/stok-alat', [AlatController::class, 'index'])
    ->middleware('auth')
    ->name('stok.alat');

Route::post('/stok-alat', [AlatController::class, 'store'])
    ->middleware('auth')
    ->name('stok.alat.store');

Route::get('/stok-alat/{id}/edit', [AlatController::class, 'edit'])
    ->middleware('auth')
    ->name('alat.edit');

Route::put('/stok-alat/{id}', [AlatController::class, 'update'])
    ->middleware('auth')
    ->name('alat.update');

Route::delete('/stok-alat/{id}', [AlatController::class, 'destroy'])
    ->middleware('auth')
    ->name('alat.destroy');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';