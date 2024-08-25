<?php

use App\Http\Controllers\PlaygroundController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaygroundController::class, 'index'])->name('index');
Route::post('/', [PlaygroundController::class, 'play'])->name('play');
