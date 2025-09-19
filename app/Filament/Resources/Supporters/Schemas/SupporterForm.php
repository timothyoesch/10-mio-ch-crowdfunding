<?php

namespace App\Filament\Resources\Supporters\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;


class SupporterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                PhoneInput::make('phonenumber')
                    ->label('Phone number')
                    ->nullable(),
                Toggle::make('optin')
                    ->required(),
            ]);
    }
}
