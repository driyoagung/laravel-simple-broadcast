<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BroadcastController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Tambahkan di routes/web.php
Route::get('/test-email', function () {
    try {
        Mail::raw('Test email dari Laravel', function ($message) {
            $message->to('user@example.com')
                ->subject('Test Email');
        });
        return 'Email test berhasil dikirim!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Broadcast routes - hanya untuk admin
    Route::middleware('admin')->group(function () {
        Route::get('/broadcast', [BroadcastController::class, 'create'])->name('broadcast.create');
        Route::post('/broadcast', [BroadcastController::class, 'send'])->name('broadcast.send');
    });
});

require __DIR__ . '/auth.php';