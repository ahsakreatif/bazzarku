<?php

namespace App\Livewire;

use App\Entities\Event;
use Livewire\Component;
use Carbon\Carbon;

class EventWidget extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::where('status', 'active')
            ->whereRaw('(date(start_date) <= DATE(CURRENT_DATE) AND date(end_date) >= DATE(CURRENT_DATE))')
            ->orderBy('start_date', 'desc')
            ->limit(3)
        ->get();

        foreach ($this->events as &$event) {
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
    }

    public function render()
    {
        return view('livewire.components.event-widget');
    }
}
