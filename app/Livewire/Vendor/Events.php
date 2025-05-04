<?php

namespace App\Livewire\Vendor;

use App\Entities\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Events extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $date_filter = '';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'date_filter' => ['except' => ''],
    ];

    protected $listeners = ['event-created' => '$refresh'];

    public function updatedSearch($value)
    {
        Log::info('Search updated to: ' . $value);
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedDateFilter()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->date_filter = '';
        $this->resetPage();
    }

    public function edit($id)
    {
        $this->dispatch('editEvent', id: $id)->to('vendor.create-event');
    }

    public function render()
    {
        try {
            if (!Auth::check() || !Auth::user()->vendor) {
                return view('livewire.vendor.events', [
                    'events' => collect([])
                ]);
            }

            $query = Event::query()
                ->where('user_id', Auth::user()->vendor->id);

            if ($this->search) {
                Log::info('Applying search filter: ' . $this->search);
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            }

            if ($this->status) {
                $query->where('status', $this->status);
            }

            if ($this->date_filter) {
                $now = Carbon::now();
                switch ($this->date_filter) {
                    case 'upcoming':
                        $query->where('start_date', '>', $now);
                        break;
                    case 'ongoing':
                        $query->where('start_date', '<=', $now)
                              ->where('end_date', '>=', $now);
                        break;
                    case 'past':
                        $query->where('end_date', '<', $now);
                        break;
                }
            }

            $events = $query->orderBy('start_date', 'desc')
                            ->paginate($this->perPage);

            return view('livewire.vendor.events', [
                'events' => $events
            ]);

        } catch (\Exception $e) {
            Log::error('Events component error: ' . $e->getMessage());
            return view('livewire.vendor.events', [
                'events' => collect([])
            ]);
        }
    }
}
