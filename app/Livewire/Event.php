<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;

class Event extends Component
{
    protected $eventRepo;
    protected $eventTypeRepo;
    public $filter = [];

    public function mount(EventRepository $eventRepository, EventTypeRepository $eventTypeRepository)
    {
        $this->eventRepo = $eventRepository;
        $this->eventTypeRepo = $eventTypeRepository;
    }

    public function setFilter($key, $value)
    {
        $this->filter[$key] = $value;
    }

    public function render()
    {
        $event_types = $this->eventTypeRepo->all();
        $events = $this->eventRepo->getFilter($this->filter);

        return view('livewire.event', compact('events', 'event_types'));
    }
}
