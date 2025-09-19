<?php

namespace App\Filament\Resources\Supporters\Pages;

use App\Filament\Resources\Supporters\SupporterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSupporter extends ViewRecord
{
    protected static string $resource = SupporterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
