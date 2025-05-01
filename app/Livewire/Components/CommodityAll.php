<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\CommodityType;

class CommodityAll extends Component
{
    public $commodityTypes;

    public function mount()
    {
        $this->commodityTypes = CommodityType::with(['commodities' => function($query) {
            $query->where('status', 'available')->limit(4)->orderBy('created_at', 'desc');
        }])->get();
    }

    public function render()
    {
        return view('livewire.components.commodity-all');
    }
}
