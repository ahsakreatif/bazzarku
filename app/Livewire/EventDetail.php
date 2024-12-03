<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\EventRepository;

class EventDetail extends Component
{
    protected $eventRepo;
    public $event;

    public function mount($slug, EventRepository $eventRepository)
    {
        $this->eventRepo = $eventRepository;
        $this->event = $this->eventRepo->findBySlug($slug);
    }

    public function render()
    {
        return view('livewire.event-detail', [ 'event' => $this->event ]);
    }
}
