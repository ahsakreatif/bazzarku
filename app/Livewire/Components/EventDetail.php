<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\Event;
use Livewire\Attributes\On;

class EventDetail extends Component
{
    public $isOpen = false;
    public $event;

    public function mount()
    {
        $this->isOpen = false;
    }

    #[On('showEvent')]
    public function showEvent($eventId)
    {
        $this->event = Event::find($eventId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.components.event-detail');
    }
}
