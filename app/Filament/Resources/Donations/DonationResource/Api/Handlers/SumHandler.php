<?php
namespace App\Filament\Resources\Donations\DonationResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Donations\DonationResource;

class SumHandler extends Handlers {
    public static string | null $uri = '/sum';
    public static string | null $resource = DonationResource::class;
    public static bool $public = true;


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
            "vote_duration_minutes" => \App\Models\Vote::getTotalDurationInSeconds() / 60,
            'sum_per_minute_donations' => $model->getDonationsPerMinute(),
            'donations_total' => (float) round($model->getTotalDonations(), 2),
        ], "Sum of donations calculated successfully.");
    }
}
