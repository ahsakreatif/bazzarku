<?php

namespace App\Livewire;

use Livewire\Component;
use App\Entities\User;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $type;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone_number;
    public $vendor_name;
    public $tenant_name;

    public function mount($type)
    {
        $this->type = $type;
    }

    public function register()
    {
        // Validasi input
        $validation_rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        if ($this->type === 'vendor') {
            $validation_rules['phone_number'] = 'required|numeric';
            $validation_rules['vendor_name'] = 'required';
        } else if ($this->type === 'tenant') {
            $validation_rules['phone_number'] = 'required|numeric';
            $validation_rules['tenant_name'] = 'required';
        }

        $this->validate($validation_rules);

        // Ini Untuk Simpan Pengguna
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Untuk Simpan Data Vendor atau Tenant
        if ($this->type === 'vendor') {
            $user->vendor()->create([
                'vendor_name' => $this->vendor_name,
                'phone_number' => $this->phone_number,
            ]);
            // Tambahkan role vendor
            $user->assignRole('vendor');
        } else if ($this->type === 'tenant') {
            $user->tenant()->create([
                'tenant_name' => $this->tenant_name,
                'phone_number' => $this->phone_number,
            ]);
            // Tambahkan role tenant
            $user->assignRole('tenant');
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
