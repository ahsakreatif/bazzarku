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
    public $sort = 'newest';
    public $itemsToShow = 10;

    public function mount(EventRepository $eventRepository, EventTypeRepository $eventTypeRepository)
    {
        $this->eventRepo = $eventRepository;
        $this->eventTypeRepo = $eventTypeRepository;
    }

    public function setFilter($key, $value)
    {
        $this->filter[$key] = $value;
    }

    public function setSort()
    {
        if ($this->sort === 'newest') {
            $this->filter['sort'] = 'newest';
            // dd('Newest bekerja');
        } elseif ($this->sort === 'price') {
            $this->filter['sort'] = 'price';
            // dd('Price bekerja');
        }
    }

    public function showMore()
    {
        $this->itemsToShow += 10;
        // dd('Show More bekerja, jumlah item sekarang: ' . $this->itemsToShow);
    }

    public function render()
    {
        $event_types = $this->eventTypeRepo->all();
        // $events = $this->eventRepo->getFilter($this->filter);
        $events = $this->eventRepo->getFilter($this->filter, $this->itemsToShow);

        return view('livewire.event', compact('events', 'event_types'));
    }
}
