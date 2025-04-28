<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\CommodityType;

class CommodityAllWidget extends Component
{
    public $commodityTypes;

    public function mount()
    {
        $this->commodityTypes = CommodityType::with(['commodities' => function($query) {
            $query->where('status', 'active')->limit(4)->orderBy('created_at', 'desc');
        }])->get();
    }

    public function render()
    {
        return view('livewire.components.commodity-all-widget');
    }
}
