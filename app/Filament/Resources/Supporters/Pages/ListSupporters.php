<?php

namespace App\Filament\Resources\Supporters\Pages;

use App\Filament\Resources\Supporters\SupporterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSupporters extends ListRecords
{
    protected static string $resource = SupporterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
