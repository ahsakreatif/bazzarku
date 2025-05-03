<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\UserVendor;
use App\Entities\Event;
use App\Entities\Commodity;
use App\Entities\EventType;
use App\Area;
use Livewire\WithPagination;

class VendorDetail extends Component
{
    use WithPagination;

    public $vendor;
    public $activeTab = 'events';
    public $search = '';
    public $area = '';
    public $category = '';

    protected $listeners = ['showVendor'];

    public function mount($vendorId = null)
    {
        if ($vendorId) {
            $this->vendor = UserVendor::find($vendorId);
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

        if ($this->vendor) {
            if ($this->activeTab === 'events') {
                $events = Event::where('user_id', $this->vendor->id)
                    ->when($this->search, function($query) {
                        $query->where(function($q) {
                            $q->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('description', 'like', '%' . $this->search . '%');
                        });
                    })
                    ->when($this->area, function($query) {
                        $query->where('area', $this->area);
                    })
                    ->when($this->category, function($query) {
                        $query->where('event_type_id', $this->category);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
            } else {
                $commodities = Commodity::where('user_id', $this->vendor->id)
                    ->when($this->search, function($query) {
                        $query->where(function($q) {
                            $q->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('description', 'like', '%' . $this->search . '%');
                        });
                    })
                    ->when($this->area, function($query) {
                        $query->where('area', $this->area);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
            }
        }

        return view('livewire.vendor-detail', [
            'events' => $events,
            'commodities' => $commodities,
            'event_types' => $event_types,
            'areas' => Area::cases()
        ]);
    }
}
