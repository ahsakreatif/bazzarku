<div class="relative mb-12">
  @if ($events->count() > 0)
  <div class="rounded-lg overflow-hidden">
      <!-- Carousel images -->
      <div class="relative h-[400px]">
          <div class="carousel-container relative h-full">
              @foreach ($events as $event)
              <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-300 ease-in-out active"  wire:click="dispatch('showEvent', { eventId: {{ $event->id }} })">
                  <img src="{{ $event->picture }}"
                      alt="{{ $event->name }}"
                      class="w-full h-full object-cover">
              </div>
              @endforeach
          </div>

          <!-- Navigation Arrows -->
          <button
              class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full"
              onclick="moveSlide(-1)">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
          </button>
          <button
              class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full"
              onclick="moveSlide(1)">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
          </button>
      </div>

      <!-- Carousel indicators -->
      <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2" id="carousel-indicators">
          @foreach ($events as $i => $event)
          <button class="h-2 w-2 rounded-full bg-primary-700" onclick="setSlide({{ $i }})"></button>
          @endforeach
      </div>
  </div>
  @endif
</div>