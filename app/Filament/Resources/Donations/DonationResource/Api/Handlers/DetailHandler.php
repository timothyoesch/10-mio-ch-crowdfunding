<?php

namespace App\Filament\Resources\Donations\DonationResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Donations\DonationResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Donations\DonationResource\Api\Transformers\DonationTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = DonationResource::class;


    /**
     * Show Donation
     *
     * @param Request $request
     * @return DonationTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new DonationTransformer($query);
    }
}
