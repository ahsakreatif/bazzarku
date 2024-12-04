<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventTenantRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Constants\StatusSubmit;
class EventRequest extends Component
{
    public $event_tenants;

    public function mount(EventTenantRepository $eventTenantRepo)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('auth.login', ['type' => 'tenant']);
        }

        $user_tenant = $user->tenant;

        $event_tenants = $eventTenantRepo->findByTenantId($user_tenant->id);
        foreach ($event_tenants as &$event_tenant) {
            $event_tenant->status_color = StatusSubmit::getColor($event_tenant->status);
        }
    }

    public function render()
    {
        return view('livewire.event-request', ['event_tenants' => $this->event_tenants]);
    }
}
