<?php
namespace App\Filament\Resources\Supporters\SupporterResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Supporters\SupporterResource;
use App\Filament\Resources\Supporters\SupporterResource\Api\Requests\UpdateSupporterRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = SupporterResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Supporter
     *
     * @param UpdateSupporterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateSupporterRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}