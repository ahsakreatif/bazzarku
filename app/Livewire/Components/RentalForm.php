<?php

namespace App\Livewire\Components;

use App\Entities\Rental;
use App\Entities\Commodity;
use Livewire\Component;
use Livewire\Attributes\Rule;

class RentalForm extends Component
{
    public $showModal = false;
    public $commodity;

    #[Rule('required|min:3')]
    public $name = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $phone = '';

    #[Rule('required')]
    public $address = '';

    public $note = '';

    #[Rule('required|date')]
    public $start_date = '';

    #[Rule('required|date')]
    public $end_date = '';

    public function mount(Commodity $commodity)
    {
        $this->commodity = $commodity;
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

        $rental = Rental::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'note' => $this->note,
            'commodity_id' => $this->commodity->id,
            'status' => 'pending',
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->closeModal();

        // Create WhatsApp message template
        $message = urlencode("New Rental Application Received!\n\n" .
            "Commodity: {$this->commodity->name}\n" .
            "Name: {$this->name}\n" .
            "Email: {$this->email}\n" .
            "Phone: {$this->phone}\n" .
            "Address: {$this->address}\n" .
            "Note: {$this->note}\n\n" .
            "Rental ID: {$rental->id}\n" .
            "Start Date: {$this->start_date}\n" .
            "End Date: {$this->end_date}");

        // Redirect to WhatsApp with the message
        $whatsappUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', setting('social.whatsapp')) . "?text=" . $message;

        // Open WhatsApp in new tab
        $this->dispatch('openNewTab', url: $whatsappUrl);

        // Refresh current page
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.components.rental-form');
    }
}
