<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\LastController;

Route::get('/', [ImageController::class, 'index'])->name('home');

Route::get('/pokemon', [PokemonController::class, 'index']);

Route::get('/api/pokemon', [PokemonController::class, 'getPokemon']);


Route::get('/lastfm', [LastController::class, 'index']);

Route::get('/lastfm/top-tracks', [LastController::class, 'getTopTracks'])->name('lastfm.top-tracks');

Route::get('/lastfm/weekly-track-chart', [LastController::class, 'getWeeklyTrackChart'])->name('lastfm.weekly-track-chart');

Route::get('/fetch-data', [LastController::class, 'fetchAndFilterData']);
