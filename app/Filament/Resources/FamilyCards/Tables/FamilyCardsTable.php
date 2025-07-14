<?php

namespace App\Filament\Resources\FamilyCards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FamilyCardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('card_number')
                    ->label('Nomor Kartu')
                    ->searchable(),
                TextColumn::make('head_of_family_name')
                    ->label('Nama Kepala Keluarga')
                    ->searchable(),
                TextColumn::make('street_address')
                    ->label('Alamat Jalan')
                    ->searchable(),
                TextColumn::make('rt')
                    ->label('RT')
                    ->searchable(),
                TextColumn::make('rw')
                    ->label('RW')
                    ->searchable(),
                TextColumn::make('postal_code')
                    ->label('Kode Pos')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->label('Nomor Telepon')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
