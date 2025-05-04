<div>
  <div class="fixed inset-0 bg-black bg-opacity-50 z-50 {{ $isOpen ? '' : 'hidden' }}">
      <div class="min-h-screen flex items-center justify-center p-4">
          <div class="bg-white rounded-lg w-full max-w-4xl relative">
              <!-- Close button -->
              <button wire:click="closeModal" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600 z-10">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
              </button>

              @if($commodity)
              <div class="flex flex-col md:flex-row">
                  <!-- Left side - Image -->
                  <div class="w-full md:w-1/2">
                      <img src="{{ $commodity->picture }}" alt="{{ $commodity->name }}"
                          class="w-full h-[300px] md:h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
                  </div>

                  <!-- Right side - Content -->
                  <div class="w-full md:w-1/2 p-6 space-y-4">
                      <div class="space-y-4">
                          <h2 class="text-2xl font-bold">{{ $commodity->name }}</h2>

                          <div class="flex items-center text-2xl font-bold text-primary-700">
                              <span>{{ $commodity->user->name }}</span>
                          </div>

                          <div class="flex items-center text-gray-600 text-2xl font-bold">
                              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                              </svg>
                              <span>Rp {{ number_format($commodity->price, 0, ',', '.') }}</span>
                          </div>

                          <div class="flex items-center text-gray-600">
                              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                              </svg>
                              <span>{{ $commodity->location }}</span>
                          </div>

                          {{-- <div class="flex items-center text-gray-600">
                              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                              </svg>
                              <span>{{ date('d F Y', strtotime($event->start_date)) }} - {{ date('d F Y', strtotime($event->end_date)) }}</span>
                          </div> --}}

                          <div class="border-t border-gray-200 pt-4">
                              <h3 class="text-lg font-semibold mb-2">Description</h3>
                              <p class="text-gray-600 text-sm leading-relaxed">
                                  {{ $commodity->description }}
                              </p>
                          </div>
                      </div>

                      <!-- Contact Button -->
                      <div class="pt-6">
                          <livewire:components.rental-form :commodity="$commodity" />
                      </div>
                  </div>
              </div>
              @endif
          </div>
      </div>
  </div>
</div>
