<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function index()
    {
        return view('pokemon');
    }

    public function getPokemon(Request $request)
    {
        $pokemonName = $request->input('name');
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemonName}");
        $data = $response->json();

        return response()->json($data);
    }
}
