<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            /* Stat::make('User Tenant', 'heroicon-o-user-group')
                ->value(\App\Entities\UserTenant::count()), */
            Stat::make('User Vendor', 'heroicon-o-user')
                ->value(\App\Entities\UserVendor::count()),
            Stat::make('Event', 'heroicon-o-calendar')
                ->value(\App\Entities\Event::count()),
            Stat::make('Commodity', 'heroicon-o-archive-box')
                ->value(\App\Entities\Commodity::count()),
            Stat::make('Applications', 'heroicon-o-cube')
                ->value(\App\Entities\Application::count()),
            Stat::make('Rentals', 'heroicon-o-archive-box')
                ->value(\App\Entities\Rental::count()),
        ];
    }
}
