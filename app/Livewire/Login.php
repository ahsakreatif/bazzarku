<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $type;
    public $email;
    public $password;

    public function mount($type)
    {
        $this->type = $type;
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Invalid credentials.');

        // return redirect()->route('auth.login', ['type' => $this->type]);
    }

    public function render()
    {
        return view('livewire.login', [ ]);
    }
}
