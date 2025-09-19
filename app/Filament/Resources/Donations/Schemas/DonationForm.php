<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'perminute' => 'Per Minute',
                        'singular' => 'Singular',
                    ])
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('supporter_id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record ? $record->first_name . ' ' . $record->last_name . ' (' . $record->email . ')' : null)
                    ->native(false)
                    ->getOptionLabelUsing(fn ($value): ?string => \App\Models\Supporter::find($value)?->first_name . ' ' . \App\Models\Supporter::find($value)?->last_name . ' (' . \App\Models\Supporter::find($value)?->email . ')')
                    ->relationship('supporter'),
            ]);
    }
}
