<?php

namespace App\Filament\Resources\Documents\Pages;

use App\Filament\Resources\Documents\DocumentResource;
use App\Models\Document;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDocument extends ViewRecord
{
    protected static string $resource = DocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Print PDF')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->url(fn(Document $record): string => route('documents.stream', $record))
                ->openUrlInNewTab(),
            EditAction::make(),
        ];
    }
}
