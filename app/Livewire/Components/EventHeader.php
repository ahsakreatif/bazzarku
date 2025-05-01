<?php

namespace App\Livewire\Components;

use App\Entities\Event;
use Livewire\Component;

class EventHeader extends Component
{

    public $events;

    public function mount()
    {
        $this->events = Event::where('status', 'active')
            ->whereRaw('(date(start_date) <= DATE(CURRENT_DATE) AND date(end_date) >= DATE(CURRENT_DATE))')
            ->where('is_promoted', true)
            ->orderBy('start_date', 'desc')
            ->limit(5)
            ->get();

        foreach ($this->events as &$event) {
            if ($event->picture && !str_starts_with($event->picture, 'http')) {
                $event->picture = url($event->picture);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.event-header');
    }
}
