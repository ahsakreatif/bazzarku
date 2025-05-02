<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;
use Livewire\WithPagination;
use App\Constants\Event as EventConstant;

class Event extends Component
{
    protected $eventRepo;
    protected $eventTypeRepo;
    public $filter = [];
    public $sort;
    public $start_date;
    public $end_date;
    public $events;
    public $event_types;

    protected $listeners = ['searchUpdated'];

    public function mount()
    {
        $this->filter = [
            'status' => 'active',
            'limit' => EventConstant::LIMIT,
            'offset' => 0,
            'order_at' => 'created_at',
            'order_by' => 'desc'
        ];
    }

    public function searchUpdated($searchQuery)
    {
        $this->filter['keyword'] = $searchQuery;
    }

    public function setFilter($key, $value)
    {
        $this->filter[$key] = $value;
        $this->events = null;
        $this->filter['offset'] = 0;
    }

    public function setSort()
    {
        if ($this->sort === 'newest') {
            $this->filter['order_at'] = 'created_at';
            $this->filter['order_by'] = 'desc';
        } elseif ($this->sort === 'price') {
            $this->filter['order_at'] = 'price';
            $this->filter['order_by'] = 'asc';
        }
        $this->events = null;
    }

    public function showMore()
    {
        $this->filter['offset'] += EventConstant::LIMIT;
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

        if (!$this->event_types) {
            $this->event_types = $this->eventTypeRepo->all();
        }
        if (!$this->events) {
            $this->events = $this->eventRepo->getFilter($this->filter);
        } else {
            $events = $this->eventRepo->getFilter($this->filter);
            $this->events = $this->events->merge($events);
        }

        return view('livewire.event', [ 'events' => $this->events, $this->event_types ]);
    }
}
