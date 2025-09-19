<?php
namespace App\Filament\Resources\Votes\VoteResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Votes\VoteResource;
use App\Filament\Resources\Votes\VoteResource\Api\Requests\CreateVoteRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = VoteResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Vote
     *
     * @param CreateVoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateVoteRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}