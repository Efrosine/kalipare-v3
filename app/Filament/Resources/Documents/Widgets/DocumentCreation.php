<?php

namespace App\Filament\Resources\Documents\Widgets;

use App\Models\Document;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumentCreation extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'lg:col-span-1';

    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        return [
            Stat::make('Document Count', Document::count()),
        ];
    }

    public function getColumns(): int|array
    {
        return 1;
    }
}
