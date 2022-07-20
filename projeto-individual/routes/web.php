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

Route::middleware(['auth', 'admin'])->group(function () {
    //Usuários
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

    //Jogadores
    Route::get('/elenco/novo', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/elenco/novo', [PlayerController::class, 'store'])->name('players.store');
});


Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('users.edit');
Route::get('/usuarios/cadastrar', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios/cadastrar', [UserController::class, 'store'])->name('users.store');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');


//Rota Jogadores
Route::get('/elenco', [PlayerController::class, 'index'])->name('players.index');
Route::get('/elenco/{id}', [PlayerController::class, 'show'])->name('players.show');
