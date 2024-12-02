<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventTenantRepository;
use Illuminate\Support\Facades\Auth;

class EventRequest extends Component
{
    public $event_tenants;

    public function mount()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('auth.login', ['type' => 'tenant']);
        }

        $user_tenant = $user->tenant;

        $eventTenantRepo = new EventTenantRepository();
        $this->event_tenants = $eventTenantRepo->findByTenantId($user_tenant->id);

    }

    public function render()
    {
        return view('livewire.event-request', ['event_tenants' => $this->event_tenants]);
    }
}
