<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\BannedPokemon;
use App\Services\PokemonService;
use App\Exceptions\InvalidRequestException;
use App\Exceptions\NotFoundException;

class BannedPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBannedPokemon = BannedPokemon::all();
        return view('bannedPokemon', compact('allBannedPokemon'));
    }

    public function create()
    {
        return view('bannedPokemonCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pokemonName' => 'required|string',
        ]);

        // this call should be moved to a separate repository
        try {
            $pokemon = PokemonService::getPokemonByName(strtolower($request->pokemonName));
        } catch (Exception $e)  {
            return array("error" => 404);   // this should be handled better (separate view for errors)
        }
        
        BannedPokemon::create(array("pokemonName" => $pokemon["name"], "pokemonId" => $pokemon["id"]));

        return redirect()->route('banned.index')->with('success', 'Pokemon banned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
