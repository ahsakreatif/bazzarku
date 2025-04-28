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
                          <a href="https://wa.me/{{ $commodity->contact_phone }}" target="_blank"
                              class="flex items-center justify-center gap-2 w-full bg-green-500 text-white py-3 rounded-lg font-medium hover:bg-green-600 transition duration-200">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>
                              </svg>
                              Contact us Through WhatsApp
                          </a>
                      </div>
                  </div>
              </div>
              @endif
          </div>
      </div>
  </div>
</div>
