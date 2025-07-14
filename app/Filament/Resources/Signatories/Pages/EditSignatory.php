<?php

namespace App\Filament\Resources\Signatories\Pages;

use App\Filament\Resources\Signatories\SignatoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSignatory extends EditRecord
{
    protected static string $resource = SignatoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
