<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\CommodityType;

class CommodityTypeList extends Component
{
    public $commodityTypeSlug;

    public function mount($slug)
    {
        $this->commodityTypeSlug = $slug;
    }

    public function render()
    {
        return view('livewire.commodity-type-list');
    }
}
