<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Entities\UserTenant;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Component
{
    use WithFileUploads;

    public $tenant;
    public $password;
    public $password_confirmation;
    public $address;
    public $city;
    public $picture;
    public $profile;

    public function mount($tenantName)
    {
        $this->tenant = UserTenant::where('tenant_name', $tenantName)->first();
        if (!$this->tenant) {
            abort(404);
        }

        $this->address = $this->tenant->address;
        $this->city = $this->tenant->city;
    }

    public function updateProfile()
    {
        $this->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'picture' => 'nullable|image|max:1024',
        ]);

        $this->tenant->address = $this->address;
        $this->tenant->city = $this->city;

        if ($this->profile) {
            // Hapus file
            if ($this->tenant->picture) {
                Storage::disk('public')->delete($this->tenant->picture);
            }
            
            // Store ke path yang diinginkan
            $path = $this->profile->store('profile/picture/tenants', 'public');
            $this->tenant->picture = $path;
        }

        $this->tenant->save();
        
        $this->profile = null;
        session()->flash('message', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
