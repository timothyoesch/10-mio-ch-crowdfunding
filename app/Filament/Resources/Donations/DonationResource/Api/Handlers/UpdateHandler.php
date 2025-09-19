<?php
namespace App\Filament\Resources\Donations\DonationResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Donations\DonationResource;
use App\Filament\Resources\Donations\DonationResource\Api\Requests\UpdateDonationRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = DonationResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Donation
     *
     * @param UpdateDonationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateDonationRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}