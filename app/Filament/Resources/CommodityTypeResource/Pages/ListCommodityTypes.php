<?php

namespace App\Filament\Resources\CommodityTypeResource\Pages;

use App\Filament\Resources\CommodityTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommodityTypes extends ListRecords
{
    protected static string $resource = CommodityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
