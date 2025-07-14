<?php

namespace App\Filament\Resources\Signatories;

use App\Filament\Resources\Signatories\Pages\CreateSignatory;
use App\Filament\Resources\Signatories\Pages\EditSignatory;
use App\Filament\Resources\Signatories\Pages\ListSignatories;
use App\Filament\Resources\Signatories\Pages\ViewSignatory;
use App\Filament\Resources\Signatories\Schemas\SignatoryForm;
use App\Filament\Resources\Signatories\Schemas\SignatoryInfolist;
use App\Filament\Resources\Signatories\Tables\SignatoriesTable;
use App\Models\Signatory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SignatoryResource extends Resource
{
    protected static ?string $model = Signatory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SignatoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SignatoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SignatoriesTable::configure($table);
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
            'index' => ListSignatories::route('/'),
            'create' => CreateSignatory::route('/create'),
            'view' => ViewSignatory::route('/{record}'),
            'edit' => EditSignatory::route('/{record}/edit'),
        ];
    }
}
