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
    public $eventId = null;
    public $name = '';
    public $description = '';
    public $picture;
    public $permit_document;
    public $start_date = '';
    public $end_date = '';
    public $price = '';
    public $event_type_id = '';
    public $status = 'active';
    public $oldPicture = null;
    public $oldPermitDocument = null;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'picture' => 'nullable|image|max:2048',
        'permit_document' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'price' => 'required|numeric|min:0',
        'event_type_id' => 'required|exists:event_types,id',
    ];

    protected $listeners = ['editEvent' => 'handleEditEvent'];

    public function mount($eventId = null)
    {
        $this->eventId = $eventId;
        if ($this->eventId) {
            $this->edit($this->eventId);
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->eventId = $id;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->oldPicture = $event->picture;
        $this->oldPermitDocument = $event->permit_document;
        $this->start_date = Carbon::parse($event->start_date)->format('Y-m-d\TH:i');
        $this->end_date = Carbon::parse($event->end_date)->format('Y-m-d\TH:i');
        $this->price = $event->price;
        $this->event_type_id = $event->event_type_id;
        $this->status = $event->status;
        $this->isOpen = true;
    }

    public function handleEditEvent($id)
    {
        $this->edit($id);
    }

    public function openModal()
    {
        $this->reset(['eventId', 'name', 'description', 'picture', 'permit_document', 'start_date', 'end_date', 'price', 'event_type_id', 'status', 'oldPicture', 'oldPermitDocument']);
        $this->status = 'active';
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'start_date' => Carbon::parse($this->start_date)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($this->end_date)->format('Y-m-d H:i:s'),
            'price' => $this->price,
            'status' => $this->status,
            'event_type_id' => $this->event_type_id,
            'user_id' => Auth::user()->vendor->id,
        ];

        if ($this->picture) {
            $data['picture'] = $this->picture->store('events', 'public');
        } elseif ($this->oldPicture) {
            $data['picture'] = $this->oldPicture;
        }

        if ($this->permit_document) {
            $data['permit_document'] = $this->permit_document->store('events', 'public');
        } elseif ($this->oldPermitDocument) {
            $data['permit_document'] = $this->oldPermitDocument;
        }

        if ($this->eventId) {
            Event::find($this->eventId)->update($data);
            $message = 'Event updated successfully';
        } else {
            Event::create($data);
            $message = 'Event created successfully';
        }

        $this->reset();
        $this->isOpen = false;

        session()->flash('message', $message);
        $this->dispatch('event-created');
    }

    public function render()
    {
        return view('livewire.vendor.create-event', [
            'eventTypes' => \App\Entities\EventType::all()
        ]);
    }
}
