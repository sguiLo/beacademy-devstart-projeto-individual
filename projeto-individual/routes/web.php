<?php

require __DIR__ . '/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});


Route::get('/sobre', [AboutController::class, 'index'])->name('about.index');

//Usuários
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/usuarios/cadastrar', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios/cadastrar', [UserController::class, 'store'])->name('users.store');


//Rota Jogadores
Route::get('/elenco', [PlayerController::class, 'index'])->name('players.index');
Route::get('/elenco/{id}', [PlayerController::class, 'show'])->name('players.show');
