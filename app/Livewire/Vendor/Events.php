<?php

namespace App\Livewire\Vendor;

use App\Entities\Event;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['event-created' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $events = Event::where('user_id', Auth::user()->vendor->id)
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('start_date', 'desc')
            ->paginate(10);

        foreach ($events as &$event) {
            if ($event->picture && !str_starts_with($event->picture, 'http')) {
                $event->picture = url($event->picture);
            }
            $start_date = Carbon::parse($event->start_date);
            $end_date = Carbon::parse($event->end_date);

            if ($start_date->format('m') === $end_date->format('m')) {
                $date = $start_date->format('d') . '-' . $end_date->format('d M y');
            } else {
                $date = $start_date->format('d M y') . ' - ' . $end_date->format('d M y');
            }

            $event->date = $date;
        }

        return view('livewire.vendor.events', [
            'events' => $events
        ]);
    }
}
