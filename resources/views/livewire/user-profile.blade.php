<section class="bg-gray-100">
    <div class="fullscreen-container">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
            <form wire:submit.prevent="updateProfile">
                <div class="flex items-center mb-4">
                    @if($tenant->picture)
                        {{ $tenant->picture }}
                        <img src="{{ Storage::url($tenant->picture) }}" alt="Profile" class="w-32 h-32 rounded-full mr-6">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default Profile" class="w-32 h-32 rounded-full mr-6">
                    @endif
                    <div>
                        <h2 class="text-xl font-semibold mt-2">{{ $tenant->user->name }}</h2>
                        <p class="text-gray-600">{{ $tenant->tenant_name }}</p>
                        <p class="text-gray-600">{{ $tenant->phone_number }}</p>
                        <p class="text-gray-600">{{ $tenant->address }}</p>
                        <p class="text-gray-600">{{ $tenant->city }}</p>
                        <p class="text-gray-600">{{ $tenant->user->email }}</p>
                    </div>
                </div>

                <h3 class="text-lg font-bold mt-6">Edit Informasi Pribadi</h3>
                <div class="flex flex-col space-y-2 mt-2">
                    <input wire:model="address" class="w-full mb-4 px-12 py-6 border border-gray-200" type="text" placeholder="Masukkan Alamat Lengkap" required>
                    <input wire:model="city" class="w-full mb-4 px-12 py-6 border border-gray-200" type="text" placeholder="Masukkan Nama Kota" required>
                    <!-- <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                        <input type="file" wire:model="profile" class="w-full mb-4 px-12 py-6 border border-gray-200" accept="image/*" />
                    </div> -->
                </div>

                <!-- <h3 class="text-lg font-bold mt-6">Ubah Password</h3>
                <div class="flex flex-col space-y-2 mt-2">
                    <input wire:model="password" class="w-full mb-4 px-12 py-6 border border-gray-200" type="password" placeholder="Password Baru">
                    <input wire:model="password_confirmation" class="w-full mb-4 px-12 py-6 border border-gray-200" type="password" placeholder="Konfirmasi Password">
                </div> -->

                <button type="submit" class="mt-4 bg-teal-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>
            @if (session()->has('message'))
                <div class="mt-4 text-green-600">{{ session('message') }}</div>
            @endif
        </div>
    </div>
</section>