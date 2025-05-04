<?php

namespace App\Livewire\Vendor;

use App\Entities\Application;
use App\Entities\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Applications extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $event_id = '';
    public $perPage = 12;
    public $selectedApplication = null;
    public $viewDetails = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'event_id' => ['except' => ''],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedEventId()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->event_id = '';
        $this->resetPage();
    }

    public function viewApplication($id)
    {
        $this->selectedApplication = Application::find($id);
        $this->viewDetails = true;
    }

    public function closeDetails()
    {
        $this->viewDetails = false;
        $this->selectedApplication = null;
    }

    public function updateStatus($id, $status)
    {
        $application = Application::find($id);
        $application->status = $status;
        $application->save();

        if ($this->selectedApplication && $this->selectedApplication->id === $id) {
            $this->selectedApplication = $application;
        }

        session()->flash('message', 'Application status updated successfully.');
    }

    public function render()
    {
        try {
            if (!Auth::check() || !Auth::user()->vendor) {
                return view('livewire.vendor.applications', [
                    'applications' => collect([]),
                    'events' => collect([])
                ]);
            }

            $vendorId = Auth::user()->id;

            // Get all events belonging to this vendor for the filter dropdown
            $events = Event::where('user_id', $vendorId)->get();

            // Find applications for events owned by this vendor
            $query = Application::whereHas('event', function($q) use ($vendorId) {
                $q->where('user_id', $vendorId);
            });

            if ($this->search) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            }

            if ($this->status) {
                $query->where('status', $this->status);
            }

            if ($this->event_id) {
                $query->where('event_id', $this->event_id);
            }

            $applications = $query->orderBy('created_at', 'desc')
                                  ->paginate($this->perPage);

            return view('livewire.vendor.applications', [
                'applications' => $applications,
                'events' => $events
            ]);
        } catch (\Exception $e) {
            Log::error('Applications component error: ' . $e->getMessage());
            return view('livewire.vendor.applications', [
                'applications' => collect([]),
                'events' => collect([])
            ]);
        }
    }
}
