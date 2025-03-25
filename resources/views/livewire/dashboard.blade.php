<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <!-- Hero Carousel -->
  <div class="relative mb-12">
      <div class="rounded-lg overflow-hidden">
          <!-- Carousel images -->
          <div class="relative">
              <div class="carousel-item active">
                  <img src="https://placehold.co/1200x400/03269E/FFFFFF/png?text=Event+1" alt="Event banner 1" class="w-full h-[400px] object-cover">
              </div>
              <div class="carousel-item">
                  <img src="https://placehold.co/1200x400/0441FF/FFFFFF/png?text=Event+2" alt="Event banner 2" class="w-full h-[400px] object-cover">
              </div>
              <div class="carousel-item">
                  <img src="https://placehold.co/1200x400/0055FF/FFFFFF/png?text=Event+3" alt="Event banner 3" class="w-full h-[400px] object-cover">
              </div>
              <div class="carousel-item">
                  <img src="https://placehold.co/1200x400/0066FF/FFFFFF/png?text=Event+4" alt="Event banner 4" class="w-full h-[400px] object-cover">
              </div>

              <!-- Navigation Arrows -->
              <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full" onclick="moveSlide(-1)">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
              </button>
              <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full" onclick="moveSlide(1)">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
              </button>
          </div>

          <!-- Carousel indicators -->
          <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2" id="carousel-indicators">
              <button class="h-2 w-2 rounded-full bg-primary-700" onclick="setSlide(0)"></button>
              <button class="h-2 w-2 rounded-full bg-gray-300" onclick="setSlide(1)"></button>
              <button class="h-2 w-2 rounded-full bg-gray-300" onclick="setSlide(2)"></button>
              <button class="h-2 w-2 rounded-full bg-gray-300" onclick="setSlide(3)"></button>
          </div>
      </div>
  </div>

  <!-- Add this after the carousel section and before the Upcoming Events section -->
  <section class="mb-12">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
          <h2 class="text-2xl font-bold text-primary-700">Nearest Event</h2>

          <!-- Filter Controls -->
          <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
              <!-- Sort by Area -->
              <div class="relative">
                  <select class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                      <option value="">Sort by Area</option>
                      <option value="jakarta">Jakarta</option>
                      <option value="tangerang">Tangerang</option>
                      <option value="bekasi">Bekasi</option>
                      <option value="depok">Depok</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </div>
              </div>

              <!-- Sort by Category -->
              <div class="relative">
                  <select class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                      <option value="">Sort by Category</option>
                      <option value="concert">Concert</option>
                      <option value="exhibition">Exhibition</option>
                      <option value="conference">Conference</option>
                      <option value="workshop">Workshop</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </div>
              </div>
          </div>
      </div>

      <!-- Event Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Event Card 1 -->
          <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
              <img src="https://placehold.co/400x250/333/FFFFFF/png" alt="Urban Sneaker Society" class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="font-bold text-lg mb-2">Urban Sneaker Society 2024</h3>
                  <div class="flex items-center text-gray-600">
                      <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      </svg>
                      <span>ICE BSD</span>
                      <span class="ml-auto">Oct 25-27</span>
                  </div>
              </div>
          </div>

          <!-- Event Card 2 -->
          <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
              <img src="https://placehold.co/400x250/FF69B4/FFFFFF/png" alt="Wonderland" class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="font-bold text-lg mb-2">Wonderland by USS 2024</h3>
                  <div class="flex items-center text-gray-600">
                      <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      </svg>
                      <span>JIEXPO</span>
                      <span class="ml-auto">March 17-19</span>
                  </div>
              </div>
          </div>

          <!-- Event Card 3 -->
          <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
              <img src="https://placehold.co/400x250/444/FFFFFF/png" alt="USS Yard Sale" class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="font-bold text-lg mb-2">USS YARD SALE</h3>
                  <div class="flex items-center text-gray-600">
                      <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      </svg>
                      <span>City Hall,PIM 3</span>
                      <span class="ml-auto">March 29-31</span>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Tool Rentals Section -->
  <section class="mb-12">
      <h2 class="text-2xl font-bold text-primary-700 mb-6">Tool Rentals</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Large Cards Row -->
          <div class="relative h-72 rounded-lg overflow-hidden group cursor-pointer" onclick="openEventModal()">
              <img src="https://placehold.co/800x400/333/FFFFFF/png" alt="Stage Equipment" class="w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
                  <h3 class="text-white text-xl font-semibold p-6">Stage and Audio Visual Equipment</h3>
              </div>
          </div>

          <div class="relative h-72 rounded-lg overflow-hidden group cursor-pointer" onclick="openEventModal()">
              <img src="https://placehold.co/800x400/666/FFFFFF/png" alt="Decor" class="w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
                  <h3 class="text-white text-xl font-semibold p-6">Decor and Furniture</h3>
              </div>
          </div>

          <!-- Small Cards Row -->
          <div class="relative h-72 rounded-lg overflow-hidden group cursor-pointer" onclick="openEventModal()">
              <img src="https://placehold.co/800x400/555/FFFFFF/png" alt="Booths" class="w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
                  <h3 class="text-white text-xl font-semibold p-6">Booths & Exhibition Equipment</h3>
              </div>
          </div>

          <div class="grid grid-cols-1 gap-6">
              <div class="relative h-[140px] rounded-lg overflow-hidden group cursor-pointer" onclick="openEventModal()">
                  <img src="https://placehold.co/800x200/777/FFFFFF/png" alt="Transportation" class="w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
                      <h3 class="text-white text-lg font-semibold p-4">Transportation & Logistics</h3>
                  </div>
              </div>

              <div class="relative h-[140px] rounded-lg overflow-hidden group cursor-pointer" onclick="openEventModal()">
                  <img src="https://placehold.co/800x200/999/FFFFFF/png" alt="Catering" class="w-full h-full object-cover">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
                      <h3 class="text-white text-lg font-semibold p-4">Catering & Food Equipment</h3>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Add Your Events Section -->
  <section class="mb-12">
      <h2 class="text-2xl font-bold text-primary-700 mb-6">Add your Events</h2>
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
          <div class="flex items-center space-x-4 cursor-pointer hover:opacity-80 transition-opacity">
              <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                  </svg>
              </div>
              <div>
                  <h3 class="font-bold text-lg text-gray-900">Your Event</h3>
                  <div class="flex items-center text-gray-500 text-sm mt-1">
                      <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      </svg>
                      <span>Location</span>
                      <span class="mx-2">•</span>
                      <span>Start Date-End Date</span>
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>