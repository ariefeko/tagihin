<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Customers\Index as CustomerIndex;
use App\Livewire\Tagihan\Create;
use App\Livewire\Tagihan\Index as TagihanIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/customers', CustomerIndex::class)->name('customers.index');
    Route::get('/tagihan/create', Create::class)->name('tagihan.create');
    Route::get('/tagihan', TagihanIndex::class)->name('tagihan.index');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
