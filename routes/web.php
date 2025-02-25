<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get(
        '/',
        function () {
            return redirect()->route('dashboard');
        }
    )->name('welcome');
    Route::get('data/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('data/kirim-pesan/{nomor}', [PelangganController::class, 'whatsapp'])->name('pelanggan.pesan');
    Route::resource('setting/pesan', PesanController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
