<?php
namespace App\Filament\Resources\Votes\VoteResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Votes\VoteResource;

class SumHandler extends Handlers {
    public static string | null $uri = '/sum';
    public static string | null $resource = VoteResource::class;

    public static function getMethod()
    {
        return Handlers::GET;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        $model = new (static::getModel());

        return static::sendSuccessResponse([
            'seconds' => $model->getTotalDurationInSeconds(),
            'count' => $model->count(),
            'active' => (bool) $model->where("active", true)->count(),
        ], "Sum of vote durations calculated successfully.");
    }

    public static bool $public = true;

}
