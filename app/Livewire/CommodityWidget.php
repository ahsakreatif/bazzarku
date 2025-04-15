<?php

namespace App\Livewire;

use App\Entities\Commodity;
use Livewire\Component;

class CommodityWidget extends Component
{
    public $commodities;

    public function mount()
    {
        $this->commodities = Commodity::where('status', 'active')->get();

        foreach ($this->commodities as &$commodity) {
            if ($commodity->picture && !str_starts_with($commodity->picture, 'http')) {
                $commodity->picture = url($commodity->picture);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.commodity-widget');
    }
}
