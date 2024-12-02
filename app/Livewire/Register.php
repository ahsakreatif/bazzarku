<?php

namespace App\Livewire;

use Illuminate\Http\Request;
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

    public function register(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
        if ($this->type === 'vendor') {
            $validation_rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|numeric',
                'password' => 'required|min:6|confirmed',
                'vendor_name' => 'required',
            ];
        } else if ($this->type === 'tenant') {
            $validation_rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|numeric',
                'password' => 'required|min:6|confirmed',
                'tenant_name' => 'required',
            ];
        }

        $this->validate($validation_rules);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($this->type === 'vendor') {
            $user->vendor()->create([
                'vendor_name' => $request->vendor_name,
                'phone_number' => $request->phone_number,
            ]);
        } else if ($this->type === 'tenant') {
            $user->tenant()->create([
                'tenant_name' => $request->tenant_name,
                'phone_number' => $request->phone_number,
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
