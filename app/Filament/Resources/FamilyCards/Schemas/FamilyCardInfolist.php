<?php

namespace App\Filament\Resources\FamilyCards\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FamilyCardInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('card_number'),
                TextEntry::make('head_of_family_name'),
                TextEntry::make('street_address'),
                TextEntry::make('rt'),
                TextEntry::make('rw'),
                TextEntry::make('postal_code'),
                TextEntry::make('phone_number'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
