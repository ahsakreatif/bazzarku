<section class="py-20 bg-gray-100">
  <div class="container mx-auto px-4">
    <livewire:components.event-header />
    <div class="flex flex-wrap -mx-3 mb-24">
      <div class="w-full flex justify-end mb-4">
        <div class="flex gap-4">
            <!-- Filter by Area -->
            <div class="relative">
                <select
                    wire:model.live="selected_area"
                    wire:loading.attr="disabled"
                    class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                    <option value="">Filter by Area</option>
                    @foreach(\App\Area::cases() as $area)
                        <option value="{{ $area->value }}">{{ $area->name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Filter by Category -->
            <div class="relative">
                <select
                    wire:model.live="selected_category"
                    wire:loading.attr="disabled"
                    class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                    <option value="">Filter by Category</option>
                    @foreach($event_types as $event_type)
                        <option value="{{ $event_type->id }}">{{ $event_type->name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
      </div>
      <div class="w-full lg:w-full px-3">
        <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @forelse ($events as $event)
          <div wire:click="dispatch('showEvent', { eventId: {{ $event->id }} })"
            class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer">
              <img src="{{ $event->picture }}" alt="{{ $event->name }}"
                  class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="font-bold text-lg mb-2">{{ $event->name }}</h3>
                  <div class="flex items-center text-gray-600">
                      <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      </svg>
                      <span>{{ ucwords(strtolower($event->location)) }}</span>
                      <span class="ml-auto">{{ $event->date }}</span>
                  </div>
              </div>
          </div>
          @empty
          <div class="col-span-full text-center py-8">
              <p class="text-gray-500">No events found matching your criteria.</p>
          </div>
          @endforelse
        </div>

        <!-- Loading State -->
        <div wire:loading class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm animate-pulse">
                <div class="w-full h-48 bg-gray-200"></div>
                <div class="p-4">
                    <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </div>
            </div>
            @endfor
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="text-center mt-8">
        {{ $events->links() }}
    </div>
  </div>
</section>
