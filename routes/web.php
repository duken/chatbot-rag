<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\RegisterGuruController; // Tambah ini!


// Home -> Redirect ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Users (Admin)
Route::resource('users', UserController::class)
    ->middleware(['auth']); // Tambahkan 'role:admin' jika pakai spatie/laravel-permission

// Documents (Admin/Operator)
Route::resource('documents', DocumentController::class)
    ->middleware(['auth']); // Tambahkan 'role:admin|operator' jika pakai spatie/laravel-permission

// Chatbot (semua user login)
Route::get('/chat', [ChatController::class, 'index'])
    ->middleware(['auth'])
    ->name('chat.index');

Route::post('/chat/ask', [ChatController::class, 'ask'])
    ->middleware(['auth'])
    ->name('chat.ask');

// Profile (opsional)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// === Registrasi Guru via NIK (Override Default Register) ===
Route::get('/register', [RegisterGuruController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterGuruController::class, 'register']);
Route::get('/debug-user', function () {
    return dd(Auth::user());
});


require __DIR__.'/auth.php';
