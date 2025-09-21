<?php

namespace App\Filament\Resources\Supporters;

use App\Filament\Resources\Supporters\Pages\CreateSupporter;
use App\Filament\Resources\Supporters\Pages\EditSupporter;
use App\Filament\Resources\Supporters\Pages\ListSupporters;
use App\Filament\Resources\Supporters\Pages\ViewSupporter;
use App\Filament\Resources\Supporters\Schemas\SupporterForm;
use App\Filament\Resources\Supporters\Schemas\SupporterInfolist;
use App\Filament\Resources\Supporters\Tables\SupportersTable;
use App\Models\Supporter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SupporterResource extends Resource
{
    protected static ?string $model = Supporter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    public static function form(Schema $schema): Schema
    {
        return SupporterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SupporterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SupportersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSupporters::route('/'),
            'create' => CreateSupporter::route('/create'),
            'view' => ViewSupporter::route('/{record}'),
            'edit' => EditSupporter::route('/{record}/edit'),
        ];
    }
}
