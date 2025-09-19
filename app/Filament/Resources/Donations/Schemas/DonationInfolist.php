<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DonationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('type'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('supporter.first_name')
                    ->getStateUsing(fn ($record) => $record->supporter ? $record->supporter->first_name . ' ' . $record->supporter->last_name : '-')
                    ->label('Supporter'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
