<?php

namespace App\Filament\Resources\Signatories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SignatoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('signatory_name')
                    ->required(),
                TextInput::make('signatory_position')
                    ->required(),
            ]);
    }
}
