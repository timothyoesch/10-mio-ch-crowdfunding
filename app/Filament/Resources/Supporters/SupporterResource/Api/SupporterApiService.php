<?php
namespace App\Filament\Resources\Supporters\SupporterResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Supporters\SupporterResource;
use Illuminate\Routing\Router;


class SupporterApiService extends ApiService
{
    protected static string | null $resource = SupporterResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
        ];

    }
}
