<?php
namespace App\Filament\Resources\Supporters\SupporterResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Supporters\SupporterResource;
use App\Filament\Resources\Supporters\SupporterResource\Api\Requests\CreateSupporterRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = SupporterResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Supporter
     *
     * @param CreateSupporterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateSupporterRequest $request)
    {
        $model = new (static::getModel());

        $supporter = $model::create([
            'email' => $request->email,
            'phonenumber' => $request->phone,
            'optin' => $request->optin ?? false,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        $donation = \App\Models\Donation::where('uuid', $request->donation_uuid)->first();
        if (!$donation) {
            return static::sendNotFoundResponse('Donation not found');
        }

        // Attach donation to supporter
        $donation->supporter()->associate($supporter);
        $donation->save();

        return static::sendSuccessResponse($supporter, "Successfully Create Resource");
    }

    public static bool $public = true;
}
