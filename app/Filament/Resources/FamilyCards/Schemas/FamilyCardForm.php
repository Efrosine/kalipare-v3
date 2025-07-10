<?php

namespace App\Filament\Resources\FamilyCards\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FamilyCardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('card_number')
                    ->required(),
                TextInput::make('head_of_family_name')
                    ->required(),
                TextInput::make('street_address')
                    ->required(),
                TextInput::make('rt')
                    ->required(),
                TextInput::make('rw')
                    ->required(),
                TextInput::make('postal_code')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel(),
            ]);
    }
}
