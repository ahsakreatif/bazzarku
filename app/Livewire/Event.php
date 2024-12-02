<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;
use Livewire\WithPagination;

class Event extends Component
{
    protected $eventRepo;
    protected $eventTypeRepo;
    public $filter = [];
    public $start_date;
    public $end_date;

    protected $listeners = ['searchUpdated'];

    public function mount()
    {
        $this->filter = [
            'status' => 'active'
        ];
    }

    public function searchUpdated($searchQuery)
    {
        $this->filter['keyword'] = $searchQuery;
    }

    public function setFilter($key, $value)
    {
        $this->filter[$key] = $value;
    }

    public function render(EventRepository $eventRepository, EventTypeRepository $eventTypeRepository)
    {
        $this->eventRepo = $eventRepository;
        $this->eventTypeRepo = $eventTypeRepository;

        if ($this->start_date) {
            $this->filter['start_date'] = $this->start_date;
        }
        if ($this->end_date) {
            $this->filter['end_date'] = $this->end_date;
        }

        $event_types = $this->eventTypeRepo->all();
        $events = $this->eventRepo->getFilter($this->filter);

        return view('livewire.event', compact('events', 'event_types'));
    }
}
