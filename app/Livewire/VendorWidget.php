<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\UserVendor;
class VendorWidget extends Component
{
    public $vendor;

    public function mount()
    {
        $this->vendor = UserVendor::orderBy('created_at', 'desc')->take(6)->get();
    }

    public function render()
    {
        return view('livewire.components.vendor-widget');
    }
}
