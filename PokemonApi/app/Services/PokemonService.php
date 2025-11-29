<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\InvalidRequestException;
use App\Exceptions\NotFoundException;

class PokemonService
{
    protected static $apiUrl = 'https://pokeapi.co/api/v2/pokemon/'; // this should be moved to config file or configmap

    public static function getPokemonByName($name){
        $response = Http::get(self::$apiUrl . $name);
        return self::handleExceptions($response);
    }

    protected static function handleExceptions($response)
    {
        if ($response->ok()) {
            return $response->json();
        } elseif ($response->badRequest()) {
            throw new InvalidRequestException();
        } elseif ($response->notFound()) {
            throw new NotFoundException();
        }
    }
}