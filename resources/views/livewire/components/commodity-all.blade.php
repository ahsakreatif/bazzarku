<section class="my-12">
  @foreach ($commodityTypes as $commodityType)
  <div class="mb-6">
      <h2 class="text-2xl font-bold text-primary-700 mb-4">{{ $commodityType->name }}</h2>

      <!-- Event Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($commodityType->commodities as $commodity)
          <!-- Event Card 1 -->
        <div wire:click="dispatch('showCommodity', { commodityId: {{ $commodity->id }} })"
            class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer">
            <img src="{{ $commodity->picture }}" alt="{{ $commodity->name }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $commodity->name }}</h3>
                <div class="flex items-center text-gray-600">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    <span>{{ $commodity->location }}</span>
                </div>
            </div>
        </div>
        @endforeach
      </div>
  </div>
  @endforeach
</section>