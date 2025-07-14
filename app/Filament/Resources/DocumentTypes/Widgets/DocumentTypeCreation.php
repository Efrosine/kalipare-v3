<?php

namespace App\Filament\Resources\DocumentTypes\Widgets;

use App\Models\DocumentType;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumentTypeCreation extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'lg:col-span-1';

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Document Type Count', DocumentType::count()),

        ];
    }

    public function getColumns(): int|array
    {
        return 1;
    }
}
