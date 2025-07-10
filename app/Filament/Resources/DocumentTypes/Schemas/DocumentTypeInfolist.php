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
                Section::make('Basic Information')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('type_name')->columnSpanFull(),
                        TextEntry::make('number_registration')->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
                Section::make('Optional Fields')
                    ->columns(1)
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('form_structure')
                            ->columns(4)
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('label'),
                                TextEntry::make('type'),
                                TextEntry::make('is_required')
                                    ->formatStateUsing(fn($state) => $state ? 'true' : 'false'),
                            ]),
                    ]),
                Section::make('PDF Template')
                    ->collapsed()
                    ->schema([
                        PdfViewer::make("View pdf")
                            ->documentUrl(fn(DocumentType $record): string => route('documentsType.streamDummy', ['documentType' => $record->id]))
                            ->height(600),
                    ]),
            ]);
    }
}
