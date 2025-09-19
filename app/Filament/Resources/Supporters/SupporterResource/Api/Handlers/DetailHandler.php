<?php

namespace App\Filament\Resources\Supporters\SupporterResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Supporters\SupporterResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Supporters\SupporterResource\Api\Transformers\SupporterTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = SupporterResource::class;


    /**
     * Show Supporter
     *
     * @param Request $request
     * @return SupporterTransformer
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

        return new SupporterTransformer($query);
    }
}
