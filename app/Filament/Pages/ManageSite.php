<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class ManageSite extends SettingsPage
{
    use HasPageShield;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = SiteSettings::class;

    // Put the site into the settings navgroup
    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('estimated_duration')
                    ->label('Estimated Duration (in minutes)')
                    ->numeric()
                    ->required(),
            ]);
    }
}
