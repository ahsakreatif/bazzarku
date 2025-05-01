<?php

namespace App\Livewire\Components;

use App\Entities\Commodity as CommodityEntity;
use Livewire\Component;

class CommodityList extends Component
{
    public $commodities;

    public function mount()
    {
        $this->commodities = CommodityEntity::where('status', 'active')->get();

        foreach ($this->commodities as &$commodity) {
            if ($commodity->picture && !str_starts_with($commodity->picture, 'http')) {
                $commodity->picture = url($commodity->picture);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.commodity-list');
    }
}
