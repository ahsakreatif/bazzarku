<?php

namespace App\Livewire\Components;

use App\Entities\Application;
use App\Entities\Event;
use Livewire\Component;
use Livewire\Attributes\Rule;

class ApplicationForm extends Component
{
    public $showModal = false;
    public $event;

    #[Rule('required|min:3')]
    public $name = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $phone = '';

    #[Rule('required')]
    public $address = '';

    public $note = '';

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['name', 'email', 'phone', 'address', 'note']);
    }

    public function submit()
    {
        $this->validate();

        // auto format phone number into 62 country code
        // Remove leading zero, whitespace, and dashes, then prepend country code
        $this->phone = '62' . ltrim(preg_replace('/[\s-]/', '', $this->phone), '0');

        $application = Application::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'note' => $this->note,
            'event_id' => $this->event->id,
            'status' => 'pending',
        ]);

        $this->closeModal();

        // Create WhatsApp message template
        $message = urlencode("New Application Received!\n\n" .
            "Event: {$this->event->name}\n" .
            "Name: {$this->name}\n" .
            "Email: {$this->email}\n" .
            "Phone: {$this->phone}\n" .
            "Address: {$this->address}\n" .
            "Note: {$this->note}\n\n" .
            "Application ID: {$application->id}");

        // Redirect to WhatsApp with the message
        return redirect()->away("https://wa.me/" . preg_replace('/[^0-9]/', '', $this->event->contact_phone) . "?text=" . $message);
    }

    public function render()
    {
        return view('livewire.components.application-form');
    }
}
