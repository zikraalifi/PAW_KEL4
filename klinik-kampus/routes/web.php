<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Login Manual
Route::get('/login', function () {
    return view('auth.login'); // resources/views/auth/login.blade.php harus ada
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (semua yang login bisa masuk)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// 👑 ADMIN: Bisa CRUD dokter
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('doctors', DoctorController::class);
});

// 🩺 DOKTER: Bisa read & update
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/edit/{id}', [DoctorController::class, 'edit'])->name('dokter.edit');
    Route::put('/dokter/update/{id}', [DoctorController::class, 'update'])->name('dokter.update');
});

// 🎓 MAHASISWA: Bisa read aja
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dokter', [MahasiswaController::class, 'indexDokter'])->name('mahasiswa.dokter');
});
