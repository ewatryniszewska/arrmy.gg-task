<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannedPokemonController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/banned', [App\Http\Controllers\BannedPokemonController::class, 'index']);
Route::resource('banned', BannedPokemonController::class)->middleware('auth');