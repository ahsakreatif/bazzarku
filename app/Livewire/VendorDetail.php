<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Entities\UserVendor;
use App\Entities\Event;
use App\Entities\EventType;
use App\Entities\Commodity;
use App\Area;

class VendorDetail extends Component
{
    use WithPagination;

    public $vendor;
    public $user;
    public $activeTab = 'events';
    public $search = '';
    public $area = '';
    public $category = '';

    protected $listeners = ['showVendor'];

    public function mount($vendorId = null)
    {
        if ($vendorId) {
            $this->vendor = UserVendor::find($vendorId);
            $this->user = $this->vendor->user;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingArea()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function render()
    {
        $events = collect();
        $commodities = collect();
        $event_types = EventType::all();

        return view('livewire.vendor-detail', [
            'vendor' => $this->vendor,
            'events' => $events,
            'commodities' => $commodities,
            'event_types' => $event_types,
            'areas' => Area::cases()
        ]);
    }
}
