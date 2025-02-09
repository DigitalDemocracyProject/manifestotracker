<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManifestoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [ManifestoController::class, 'dashboard']);