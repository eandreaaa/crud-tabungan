<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;
use App\Http\Middleware\isGuest;
use App\Models\Tabungan;

Route::middleware('isGuest')->group(function (){
    Route::get('/', [TabunganController::class, 'index']);
    Route::get('/login', [TabunganController::class, 'login']);
    Route::post('/login/auth', [TabunganController::class, 'auth'])->name('login.auth');
    Route::get('/register', [TabunganController::class, 'register']);
    Route::post('/register', [TabunganController::class, 'registerAccount'])->name('register.input');
});


Route::middleware('isLogin')->prefix('/nabung')->name('nabung.')->group(function (){
    Route::get('/', [TabunganController::class, 'home'])->name('home');
    Route::get('/dashboard', [TabunganController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [TabunganController::class, 'create'])->name('create');
    Route::post('/store', [TabunganController::class, 'store'])->name('store');
    Route::get('/dahshboard', [TabunganController::class, 'dashboard']);
    Route::delete('/dashboard/{id}', [TabunganController::class, 'destroy'])->name('hapus');
    Route::get('/edit/{tabungan:id}', [TabunganController::class, 'edit'])->name('edit');
    Route::patch('/update/{tabungan:id}', [TabunganController::class, 'update'])->name('update');

});
    
    Route::get('/logout', [TabunganController::class, 'logout'])->name('logout');

