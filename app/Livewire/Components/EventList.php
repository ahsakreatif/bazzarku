<?php

namespace App\Livewire\Components;

use App\Entities\Event;
use App\Entities\UserVendor;
use Livewire\Component;
use Carbon\Carbon;
use App\Constants\Event as EventConstant;
use Livewire\WithPagination;

class EventList extends Component
{
    use WithPagination;

    public $vendor;
    public $user;

    public function mount(UserVendor $vendor = null)
    {
        if (!empty($vendor)) {
            $this->vendor = $vendor;
            $this->user = $vendor->user;
        }
    }

    public function render()
    {
        $events = Event::where('status', 'active')
            ->whereRaw('(date(start_date) <= DATE(CURRENT_DATE) AND date(end_date) >= DATE(CURRENT_DATE))')
            ->orderBy('start_date', 'desc');

        if ($this->user) {
            $events = $events->where('user_id', $this->user->id);
        }

        $events = $events->paginate(EventConstant::LIMIT);

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

        return view('livewire.components.event-list', [
            'events' => $events
        ]);
    }
}
