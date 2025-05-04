<section class="mb-12">
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <h2 class="text-2xl font-bold text-primary-700">{{ $title }}</h2>
  </div>

  <!-- Commodity Cards Grid -->
  <div class="grid {{ $gridCols }} gap-6">
      @if(isset($commodities) && $commodities->count() > 0)
        @foreach ($commodities as $commodity)
        <!-- Commodity Card -->
        <div wire:click="dispatch('showCommodity', { commodityId: {{ $commodity->id }} })"
             class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer">
            <img src="{{ $commodity->picture }}" alt="{{ $commodity->name }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $commodity->name }}</h3>

                @if($showDescription)
                <p class="text-sm text-gray-500 mb-2">{{ Str::limit($commodity->description, 100) }}</p>
                @endif

                <div class="flex items-center text-gray-600">
                    @if($showLocation)
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    <span>{{ $commodity->location }}</span>
                    @endif

                    @if($showPrice)
                    <span class="{{ $showLocation ? 'ml-auto' : '' }}">Rp {{ number_format($commodity->price, 0, ',', '.') }}</span>
                    @endif
                </div>

                @if($showViewButton)
                <div class="mt-4 flex justify-end">
                    <button wire:click="$dispatch('showCommodity', { commodityId: {{ $commodity->id }} })"
                            class="text-primary-600 hover:text-primary-900">
                        View Details
                    </button>
                </div>
                @endif
            </div>
        </div>
        @endforeach
      @else
        <div class="col-span-full text-center text-gray-500">
            No commodities found.
        </div>
      @endif
      <livewire:components.commodity-detail />
  </div>

  @if(isset($commodities) && $commodities->hasPages())
    <div class="mt-6">
        {{ $commodities->links() }}
    </div>
  @endif
</section>
