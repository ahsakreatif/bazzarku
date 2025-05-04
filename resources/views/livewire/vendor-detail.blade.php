<section class="container mx-auto">
  @if ($vendor)
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Vendor Header -->
        <div class="p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center space-y-6 md:space-y-0 md:space-x-8">
                @if($vendor->picture)
                    <img src="{{ $vendor->picture }}" alt="{{ $vendor->vendor_name }}" class="h-32 w-32 rounded-full shadow-lg border-4 border-white">
                @else
                    <div class="h-32 w-32 rounded-full bg-primary-100 flex items-center justify-center shadow-lg border-4 border-white">
                        <span class="text-primary-700 font-bold text-3xl">
                            {{ substr($vendor->vendor_name, 0, 2) }}
                        </span>
                    </div>
                @endif
                <div class="space-y-4">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">{{ $vendor->vendor_name }}</h2>
                        <p class="text-lg text-gray-600 mt-2">{{ $vendor->description }}</p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $vendor->email }}</span>
                        </div>
                        @if($vendor->phone_number)
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>{{ $vendor->phone_number }}</span>
                        </div>
                        @endif
                        @if($vendor->location)
                        <div class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $vendor->location }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex">
                <button wire:click="setActiveTab('events')" @class([
                    'w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm',
                    'border-primary-500 text-primary-600' => $activeTab === 'events',
                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => $activeTab !== 'events'
                ])>
                    Events
                </button>
                <button wire:click="setActiveTab('commodities')" @class([
                    'w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm',
                    'border-primary-500 text-primary-600' => $activeTab === 'commodities',
                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => $activeTab !== 'commodities'
                ])>
                    Commodities
                </button>
            </nav>
        </div>

        <!-- Search -->
        {{-- <div class="p-4 border-b border-gray-200">
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Search {{ $activeTab }}..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div> --}}

        <!-- Content -->
        <div class="p-6">
          @if($activeTab === 'events')
              <livewire:components.event-list :vendor="$vendor" />
          @else
              <livewire:components.commodity-list :vendor="$vendor" />
          @endif
        </div>
    </div>
  @endif
</section>
