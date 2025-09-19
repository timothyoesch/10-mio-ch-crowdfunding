<?php
namespace App\Filament\Resources\Donations\DonationResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Donations\DonationResource;
use App\Filament\Resources\Donations\DonationResource\Api\Requests\CreateDonationRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = DonationResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Donation
     *
     * @param CreateDonationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateDonationRequest $request)
    {
        $values = [
            "amount" => $request->scale == "francs" ? $request->amount * 100 : $request->amount,
            "type" => $request->type
        ];
        $model = static::getModel()::create($values);
        return static::sendSuccessResponse($model, "Successfully Create Resource");
        // $model = new (static::getModel());

        // $model->fill($request->all());

        // $model->save();

        // return static::sendSuccessResponse($model, "Successfully Create Resource");
    }

    public static bool $public = true;
}
