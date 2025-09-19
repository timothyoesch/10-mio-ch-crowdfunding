<?php

namespace App\Filament\Resources\Votes\VoteResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Votes\VoteResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Votes\VoteResource\Api\Transformers\VoteTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = VoteResource::class;


    /**
     * Show Vote
     *
     * @param Request $request
     * @return VoteTransformer
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

        return new VoteTransformer($query);
    }
}
