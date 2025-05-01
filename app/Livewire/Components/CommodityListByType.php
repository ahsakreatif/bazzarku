<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\CommodityType;

class CommodityListByType extends Component
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
        return view('livewire.components.commodity-list-by-type');
    }
}
