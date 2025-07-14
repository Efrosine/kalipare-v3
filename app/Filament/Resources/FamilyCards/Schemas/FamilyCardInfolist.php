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
                TextEntry::make('card_number')->label('Nomor Kartu Keluarga'),
                TextEntry::make('head_of_family_name')->label('Nama Kepala Keluarga'),
                TextEntry::make('street_address')->label('Alamat Jalan'),
                TextEntry::make('rt')->label('RT'),
                TextEntry::make('rw')->label('RW'),
                TextEntry::make('postal_code')->label('Kode Pos'),
                TextEntry::make('phone_number')->label('Nomor Telepon'),
                TextEntry::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime(),
            ]);
    }
}
