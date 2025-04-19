<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\UserTenant;

class TenantWidget extends Component
{
    public $tenant;

    public function mount()
    {
        $this->tenant = UserTenant::orderBy('created_at', 'desc')->take(6)->get();
    }

    public function render()
    {
        return view('livewire.component.tenant-widget');
    }
}
