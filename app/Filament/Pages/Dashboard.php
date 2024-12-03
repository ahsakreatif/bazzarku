<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public static $icon = 'heroicon-o-home';

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}

