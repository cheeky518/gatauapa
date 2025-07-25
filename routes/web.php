<?php

use App\Http\Controllers\ProfileController;
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
});

Route::get('admin', function () {
    return view('obats.index');
})->middleware(['auth', 'verified', 'role_or_permission:admin|show obat|edit obat|tambah obat|hapus obat'])->name('admin.dashboard');//nama()buat panggilan biar bisa dipanggil

Route::get('petugasgudang', function () {
    return view('obats.index');
})->middleware(['auth', 'verified', 'role_or_permission:Petugasgudang'])->name('petugasgudang.dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\SupplierController;

Route::resource('/suppliers', SupplierController::class);

Route::get('/', function () {
    return view('welcome');
});
 
use App\Http\Controllers\ObatController;

Route::resource('/obats', ObatController::class);

Route::get('/', function () {
    return view('welcome');
});