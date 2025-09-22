<?php

namespace App\Filament\Resources\Donations\Widgets;

use App\Models\Donation;
use App\Models\Vote;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DonationSum extends StatsOverviewWidget
{
    public static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make(
                "Donations per Minute",
                number_format(
                    Donation::all()->sum("amount") / 100,
                    2,
                    '.',
                    "'"
                ) . " CHF"
            ),
            Stat::make(
                "Donations total",
                number_format(
                    (Donation::all()->sum("amount") / 100) * Vote::getTotalDurationInSeconds() / 60,
                    2,
                    '.',
                    "'"
                ) . " CHF"
            ),
        ];
    }
}
