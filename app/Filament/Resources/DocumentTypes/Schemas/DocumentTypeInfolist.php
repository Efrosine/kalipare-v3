<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use App\Filament\Infolists\Components\PdfViewer;
use App\Models\DocumentType;
use Filament\Infolists\Components\CodeEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Informasi Dasar')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('type_name')
                            ->label('Nama Tipe')
                            ->columnSpanFull(),
                        TextEntry::make('number_registration')
                            ->label('Nomor Registrasi')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui Pada')
                            ->dateTime(),
                    ]),
                Section::make('Field Opsional')
                    ->columns(1)
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('form_structure')
                            ->columns(4)
                            ->schema([
                                TextEntry::make('name')->label('Nama'),
                                TextEntry::make('label')->label('Label'),
                                TextEntry::make('type')->label('Tipe'),
                                TextEntry::make('is_required')
                                    ->label('Wajib')
                                    ->formatStateUsing(fn($state) => $state ? 'Ya' : 'Tidak'),
                            ]),
                    ]),
                Section::make('Template PDF')
                    ->collapsed()
                    ->schema([
                        PdfViewer::make("Lihat PDF")
                            ->documentUrl(fn(DocumentType $record): string => route('documentsType.streamDummy', ['documentType' => $record->id]))
                            ->height(600),
                    ]),
            ]);
    }
}
