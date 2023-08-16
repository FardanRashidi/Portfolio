<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PokemonController;

Route::get('/', [ImageController::class, 'index'])->name('home');

Route::get('/pokemon', [PokemonController::class, 'index']);

Route::get('/api/pokemon', [PokemonController::class, 'getPokemon']);
