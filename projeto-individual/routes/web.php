<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/sobre', [AboutController::class, 'index'])->name('about.index');
