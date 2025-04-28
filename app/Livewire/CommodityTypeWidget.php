<?php

namespace App\Livewire;

use App\Entities\CommodityType;
use Livewire\Component;

class CommodityTypeWidget extends Component
{
    public $commodityTypes;

    public function mount()
    {
        $this->commodityTypes = CommodityType::all();

        foreach ($this->commodityTypes as &$commodityType) {
            if ($commodityType->picture && !str_starts_with($commodityType->picture, 'http')) {
                $commodityType->picture = url($commodityType->picture);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.commodity-type-widget');
    }
}
