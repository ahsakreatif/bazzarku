<section class="mb-12">
    <!-- Title Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h2 class="text-2xl font-bold text-primary-700">Vendor</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($vendors as $item)
        <!-- Event Card 1 -->
        <div wire:click="$dispatch('showVendor', { vendorId: {{ $item->id }} })"
             class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer">
            @if ($item->picture)
                <img src="{{ $item->picture }}" alt="{{ $item->vendor_name }}"
                    class="w-full h-48 object-cover">
            @else
                <img src="{{ asset('images/bazzarku.jpg') }}" alt="{{ $item->vendor_name }}"
                    class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $item->vendor_name }}</h3>
                <div class="flex items-center text-gray-600">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    <span>{{ $item->vendor_name }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Include the VendorDetail component -->
    <livewire:vendor-detail />
</section>
