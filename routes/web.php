<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'prosesLogin'])->name('proses.login');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::post('/logout', [PageController::class, 'logout'])->name('logout');

Route::get('/deposit', function (Request $request) {
    $username = $request->query('username');

    $pembayaran = [
        'BANK BCA',
        'BANK BNI',
        'BANK BRI'
    ];

    return view('deposit', compact('username', 'pembayaran'));
})->name('deposit');