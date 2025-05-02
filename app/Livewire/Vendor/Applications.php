<?php

namespace App\Livewire\Vendor;

use App\Entities\Application;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Applications extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $listeners = ['application-updated' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $applications = Application::whereHas('event', function($query) {
                $query->where('user_id', Auth::user()->vendor->id);
            })
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.vendor.applications', [
            'applications' => $applications
        ]);
    }
}
