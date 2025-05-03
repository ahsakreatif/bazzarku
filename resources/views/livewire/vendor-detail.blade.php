<div>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Vendor Header -->
        <div class="p-6">
            <div class="flex items-center space-x-4">
                @if($vendor->picture)
                    <img src="{{ $vendor->picture }}" alt="{{ $vendor->name }}" class="h-20 w-20 rounded-full">
                @else
                    <div class="h-20 w-20 rounded-full bg-primary-100 flex items-center justify-center">
                        <span class="text-primary-700 font-medium text-xl">
                            {{ substr($vendor->name, 0, 2) }}
                        </span>
                    </div>
                @endif
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $vendor->name }}</h2>
                    <p class="text-gray-500">{{ $vendor->description }}</p>
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
        <div class="p-4 border-b border-gray-200">
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Search {{ $activeTab }}..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            @if($activeTab === 'events')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($events as $event)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <img src="{{ $event->picture }}" alt="{{ $event->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $event->name }}</h3>
                                <p class="mt-2 text-sm text-gray-500">{{ Str::limit($event->description, 100) }}</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-primary-600 font-medium">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                    <button wire:click="$dispatch('showEvent', { eventId: {{ $event->id }} })" class="text-primary-600 hover:text-primary-900">
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            No events found.
                        </div>
                    @endforelse
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($commodities as $commodity)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <img src="{{ $commodity->picture }}" alt="{{ $commodity->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $commodity->name }}</h3>
                                <p class="mt-2 text-sm text-gray-500">{{ Str::limit($commodity->description, 100) }}</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-primary-600 font-medium">Rp {{ number_format($commodity->price, 0, ',', '.') }}</span>
                                    <button wire:click="$dispatch('showCommodity', { commodityId: {{ $commodity->id }} })" class="text-primary-600 hover:text-primary-900">
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            No commodities found.
                        </div>
                    @endforelse
                </div>
            @endif

            <div class="mt-6">
                {{ $activeTab === 'events' ? $events->links() : $commodities->links() }}
            </div>
        </div>
    </div>
</div>
