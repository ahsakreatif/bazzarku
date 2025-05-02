<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.vendor.sidebar');
    }
}
