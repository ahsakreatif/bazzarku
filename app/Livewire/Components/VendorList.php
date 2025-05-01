<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\UserVendor;

class VendorList extends Component
{
    public $vendors;

    public function mount()
    {
        $this->vendors = UserVendor::orderBy('created_at', 'desc')->take(6)->get();
    }

    public function render()
    {
        return view('livewire.components.vendor-list');
    }
}
