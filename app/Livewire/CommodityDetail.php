<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\Commodity;
use Livewire\Attributes\On;

class CommodityDetail extends Component
{
    public $isOpen = false;
    public $commodity;

    public function mount()
    {
        $this->isOpen = false;
    }

    #[On('showCommodity')]
    public function showCommodity($commodityId)
    {
        $this->commodity = Commodity::find($commodityId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.commodity-detail');
    }
}
