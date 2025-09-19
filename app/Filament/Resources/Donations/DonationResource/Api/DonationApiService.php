<?php
namespace App\Filament\Resources\Donations\DonationResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Donations\DonationResource;
use Illuminate\Routing\Router;


class DonationApiService extends ApiService
{
    protected static string | null $resource = DonationResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            // Handlers\UpdateHandler::class,
            // Handlers\DeleteHandler::class,
            // Handlers\PaginationHandler::class,
            // Handlers\DetailHandler::class,
            Handlers\SumHandler::class
        ];
    }
}
