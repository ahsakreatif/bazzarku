<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Signup extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $terms = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'terms' => 'accepted',
    ];

    protected $messages = [
        'terms.accepted' => 'You must accept the terms and conditions.',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'email_verified_at' => now(), // Auto-activate the user
        ]);

        $user->vendor()->create([
            'vendor_name' => $this->name,
        ]);

        // Assign vendor role
        $user->assignRole('vendor');

        // Log the user in
        Auth::login($user);

        // Redirect to vendor dashboard
        return redirect()->route('vendor.dashboard');
    }

    public function render()
    {
        return view('livewire.signup');
    }
}
