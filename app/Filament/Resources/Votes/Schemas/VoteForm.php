<?php

namespace App\Filament\Resources\Votes\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('begins_at')
                    ->required(),
                DateTimePicker::make('ends_at')
                    ->required(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
