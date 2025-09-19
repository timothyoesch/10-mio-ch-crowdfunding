<?php
namespace App\Filament\Resources\Votes\VoteResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Votes\VoteResource;
use Illuminate\Routing\Router;


class VoteApiService extends ApiService
{
    protected static string | null $resource = VoteResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\SumHandler::class
        ];
    }
}
