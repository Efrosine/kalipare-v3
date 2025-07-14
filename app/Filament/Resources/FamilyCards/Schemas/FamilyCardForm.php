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
                    ->label('Nomor Kartu Keluarga')
                    ->required(),
                TextInput::make('head_of_family_name')
                    ->label('Nama Kepala Keluarga')
                    ->required(),
                TextInput::make('street_address')
                    ->label('Alamat Jalan')
                    ->required(),
                TextInput::make('rt')
                    ->label('RT')
                    ->required(),
                TextInput::make('rw')
                    ->label('RW')
                    ->required(),
                TextInput::make('postal_code')
                    ->label('Kode Pos')
                    ->required(),
                TextInput::make('phone_number')
                    ->label('Nomor Telepon')
                    ->tel(),
            ]);
    }
}
