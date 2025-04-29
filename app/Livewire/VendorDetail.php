<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\UserVendor;

class VendorDetail extends Component
{
    public $isOpen = false;
    public $vendor;

    protected $listeners = ['showVendor'];

    public function mount()
    {
        $this->isOpen = false;
    }

    public function showVendor($vendorId)
    {
        $this->vendor = UserVendor::find($vendorId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.vendor-detail');
    }
}
