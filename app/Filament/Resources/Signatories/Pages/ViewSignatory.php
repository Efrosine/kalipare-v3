<?php

namespace App\Filament\Resources\Signatories\Pages;

use App\Filament\Resources\Signatories\SignatoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSignatory extends ViewRecord
{
    protected static string $resource = SignatoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
