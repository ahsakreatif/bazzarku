<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;

class Dashboard extends Component
{
    private $eventRepo;

    public function mount(EventRepository $eventRepository)
    {
        $this->eventRepo = $eventRepository;
    }

    public function render()
    {
        $events = $this->eventRepo->getLastEvents(4);

        return view('livewire.dashboard', compact('events'));
    }
}
