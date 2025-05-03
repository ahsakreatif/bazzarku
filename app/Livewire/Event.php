<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;
use App\Entities\EventType;
use App\Area;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;
use App\Constants\Event as EventConstant;

class Event extends Component
{
    use WithPagination;

    protected $eventRepo;
    protected $eventTypeRepo;
    public $filter = [];
    public $sort;
    public $start_date;
    public $end_date;
    public $event_types;
    public $selected_area = '';
    public $selected_category = '';
    public $itemsToShow = 9;

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
        $this->event_types = EventType::all();
    }

    public function searchUpdated($searchQuery)
    {
        $this->filter['keyword'] = $searchQuery;
        $this->resetPage();
    }

    public function setFilter($key, $value)
    {
        $this->filter[$key] = $value;
        $this->resetPage();
    }

    public function updatedSelectedArea($value)
    {
        Log::info('Area filter updated', ['value' => $value]);
        if ($value) {
            $this->filter['area'] = $value;
        } else {
            unset($this->filter['area']);
        }
        $this->resetPage();
        Log::info('Current filter state', ['filter' => $this->filter]);
    }

    public function updatedSelectedCategory($value)
    {
        Log::info('Category filter updated', ['value' => $value]);
        if ($value) {
            $this->filter['category'] = $value;
        } else {
            unset($this->filter['category']);
        }
        $this->resetPage();
        Log::info('Current filter state', ['filter' => $this->filter]);
    }

    public function setSort()
    {
        if ($this->sort === 'newest') {
            $this->filter['sort'] = 'newest';
        } elseif ($this->sort === 'price') {
            $this->filter['sort'] = 'price';
        }
        $this->resetPage();
    }

    public function showMore()
    {
        $this->itemsToShow += 10;
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

        Log::info('Rendering with filters', ['filter' => $this->filter, 'itemsToShow' => $this->itemsToShow]);

        $event_types = $this->eventTypeRepo->all();
        $events = $this->eventRepo->getFilter($this->filter, $this->itemsToShow);

        return view('livewire.event', [
            'events' => $events,
            'event_types' => $event_types
        ]);
    }
}
