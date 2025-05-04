<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Entities\Event;
use App\Entities\Commodity;
use Livewire\Attributes\On;

class SearchBar extends Component
{
    public $search = '';
    public $results = [];
    public $showResults = false;

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = [];
            $this->showResults = false;
            return;
        }

        $events = Event::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->limit(5)
            ->get();

        $commodities = Commodity::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->limit(5)
            ->get();

        $this->results = [
            'events' => $events,
            'commodities' => $commodities
        ];

        $this->showResults = true;
    }

    public function selectResult($type, $id)
    {
        if ($type === 'event') {
            $this->dispatch('showEvent', eventId: $id);
        } else {
            $this->dispatch('showCommodity', commodityId: $id);
        }
        $this->search = '';
        $this->showResults = false;
    }

    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
