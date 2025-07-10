<?php

namespace App\Filament\Resources\Documents\Schemas;

use App\Filament\Infolists\Components\PdfViewer;
use App\Models\Document;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make("Applicant Information")
                    ->columns(2)
                    ->schema([
                        TextEntry::make('applicant.name')
                            ->label('Applicant Name'),
                        TextEntry::make('applicant_id'),
                        TextEntry::make('documentType.type_name')
                            ->label('Document Type'),
                        TextEntry::make('purpose')
                            ->label('Purpose'),
                        TextEntry::make('signature_date')
                            ->label('Signature Date')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
                Section::make("Document Details")
                    ->columns(1)
                    ->schema([
                        PdfViewer::make("document.pdf")
                            ->documentUrl(fn(Document $record): string => route('documents.stream', ['document' => $record->id]))
                            ->height(600),
                    ]),
            ]);
    }
}
