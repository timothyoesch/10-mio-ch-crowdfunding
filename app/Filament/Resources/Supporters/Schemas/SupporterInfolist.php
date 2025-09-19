<?php

namespace App\Filament\Resources\Supporters\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SupporterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('first_name')
                    ->label('First Name'),
                TextEntry::make('last_name')
                    ->label('Last Name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phonenumber')
                    ->label('Phone number'),
                IconEntry::make('optin')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
