<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Rentals</h1>
        <p class="mt-1 text-sm text-gray-600">Manage your rental items and create new ones.</p>
    </div>

    <!-- Search and Filters -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <!-- Search -->
            <div class="w-full sm:w-1/3">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        placeholder="Search rentals..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                    >
                </div>
            </div>

            <!-- Status Filter -->
            <div class="w-full sm:w-1/3">
                <select
                    wire:model.live="status"
                    class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md"
                >
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <!-- Clear Filters -->
            <div class="w-full sm:w-1/3">
                <button
                    wire:click="clearFilters"
                    type="button"
                    class="w-full sm:w-auto px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200"
                >
                    Clear Filters
                </button>
            </div>
        </div>

        <livewire:vendor.create-commodity />
    </div>

    <!-- Commodities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(isset($commodities) && $commodities->count() > 0)
            @foreach($commodities as $commodity)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ $commodity->picture ? asset('storage/' . $commodity->picture) : asset('images/placeholder.jpg') }}" alt="{{ $commodity->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $commodity->name }}</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Price: {{ number_format($commodity->price, 2) }}
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            Location: {{ $commodity->location }}
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $commodity->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($commodity->status) }}
                            </span>
                            <button
                                wire:click="edit({{ $commodity->id }})"
                                class="text-primary-600 hover:text-primary-700"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-3 text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No rental items found</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new rental item.</p>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        @if(isset($commodities) && method_exists($commodities, 'links'))
            {{ $commodities->links() }}
        @endif
    </div>
</div>
