<?php

require __DIR__ . '/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AboutController;


Route::get('/', function () {
    return view('home');
});


Route::get('/sobre', [AboutController::class, 'index'])->name('about.index');


//Rota Jogadores
Route::get('/elenco', [PlayerController::class, 'index'])->name('players.index');
Route::get('/elenco/{id}', [PlayerController::class, 'show'])->name('players.show');
