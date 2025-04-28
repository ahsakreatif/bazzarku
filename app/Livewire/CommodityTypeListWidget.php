<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\CommodityType;

class CommodityTypeListWidget extends Component
{
    public $commodityType;

    public function mount($commodityTypeSlug)
    {
        $this->commodityType = CommodityType::with(['commodities' => function($query) {
            $query->where('status', 'active');
        }])->where('slug', $commodityTypeSlug)->first();
    }

    public function render()
    {
        return view('livewire.components.commodity-type-list-widget');
    }
}
