<?php

namespace App\Filament\Resources\Donations\Widgets;

use App\Models\Donation;
use App\Models\Vote;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DonationSum extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Donations per Minute", Donation::all()->sum("amount") . " CHF"),
            Stat::make(
                "Donations total",
                number_format(
                    Donation::all()->sum("amount") * Vote::getTotalDurationInSeconds() / 60,
                    2,
                    '.',
                    "'"
                ) . " CHF"
            ),
        ];
    }
}
