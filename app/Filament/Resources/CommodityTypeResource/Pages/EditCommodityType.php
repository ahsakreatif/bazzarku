<?php

namespace App\Filament\Resources\CommodityTypeResource\Pages;

use App\Filament\Resources\CommodityTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommodityType extends EditRecord
{
    protected static string $resource = CommodityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
