<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('User Tenant', 'heroicon-o-user-group')
                ->value(\App\Entities\UserTenant::count()),
            Stat::make('User Vendor', 'heroicon-o-user')
                ->value(\App\Entities\UserVendor::count()),
            Stat::make('Event', 'heroicon-o-calendar')
                ->value(\App\Entities\Event::count()),
        ];
    }
}
