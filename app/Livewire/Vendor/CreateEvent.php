<?php

namespace App\Livewire\Vendor;

use App\Entities\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreateEvent extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $name = '';
    public $description = '';
    public $picture;
    public $start_date = '';
    public $end_date = '';
    public $price = '';
    public $event_type_id = '';
    public $status = 'active';

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'picture' => 'required|image|max:2048',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'price' => 'required|numeric|min:0',
        'event_type_id' => 'required|exists:event_types,id',
    ];

    protected $listeners = ['event-created' => '$refresh'];

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset();
    }

    public function save()
    {
        $this->validate();

        $picturePath = $this->picture->store('events', 'public');

        Event::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'picture' => $picturePath,
            'start_date' => Carbon::parse($this->start_date)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($this->end_date)->format('Y-m-d H:i:s'),
            'price' => $this->price,
            'status' => $this->status,
            'event_type_id' => $this->event_type_id,
            'user_id' => Auth::user()->vendor->id,
        ]);

        $this->reset(['name', 'description', 'picture', 'start_date', 'end_date', 'price', 'event_type_id', 'status']);
        $this->dispatch('event-created');
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.vendor.create-event', [
            'eventTypes' => \App\Entities\EventType::all()
        ]);
    }
}
