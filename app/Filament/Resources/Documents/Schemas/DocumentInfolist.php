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
                Section::make("Informasi Pemohon")
                    ->columns(2)
                    ->schema([
                        TextEntry::make('applicant.name')
                            ->label('Nama Pemohon'),
                        TextEntry::make('applicant_id')
                            ->label('ID Pemohon'),
                        TextEntry::make('documentType.type_name')
                            ->label('Jenis Dokumen'),
                        TextEntry::make('purpose')
                            ->label('Keperluan'),
                        TextEntry::make('signatory.signatory_name')
                            ->label('Penanggung Jawab'),
                        TextEntry::make('signature_date')
                            ->label('Tanggal Tanda Tangan'),
                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui Pada')
                            ->dateTime(),
                    ]),
                Section::make("Detail Dokumen")
                    ->columns(1)
                    ->schema([
                        PdfViewer::make("document.pdf")
                            ->documentUrl(fn(Document $record): string => route('documents.stream', ['document' => $record->id]))
                            ->height(600),
                    ]),
            ]);
    }
}
