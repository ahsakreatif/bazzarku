<section class="mb-12">
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <h2 class="text-2xl font-bold text-primary-700">Nearest Event</h2>

      <!-- Filter Controls -->
      <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
          <!-- Sort by Area -->
          <div class="relative">
              <select
                  class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                  <option value="">Sort by Area</option>
                  <option value="jakarta">Jakarta</option>
                  <option value="tangerang">Tangerang</option>
                  <option value="bekasi">Bekasi</option>
                  <option value="depok">Depok</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
              </div>
          </div>

          <!-- Sort by Category -->
          <div class="relative">
              <select
                  class="appearance-none bg-white border border-primary-700 text-primary-700 px-4 py-2 pr-8 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                  <option value="">Sort by Category</option>
                  <option value="concert">Concert</option>
                  <option value="exhibition">Exhibition</option>
                  <option value="conference">Conference</option>
                  <option value="workshop">Workshop</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-primary-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
              </div>
          </div>
      </div>
  </div>

  <!-- Event Cards Grid -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Event Card 1 -->
      <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <img src="https://placehold.co/400x250/333/FFFFFF/png" alt="Urban Sneaker Society"
              class="w-full h-48 object-cover">
          <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Urban Sneaker Society 2024</h3>
              <div class="flex items-center text-gray-600">
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  </svg>
                  <span>ICE BSD</span>
                  <span class="ml-auto">Oct 25-27</span>
              </div>
          </div>
      </div>

      <!-- Event Card 2 -->
      <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <img src="https://placehold.co/400x250/FF69B4/FFFFFF/png" alt="Wonderland"
              class="w-full h-48 object-cover">
          <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Wonderland by USS 2024</h3>
              <div class="flex items-center text-gray-600">
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  </svg>
                  <span>JIEXPO</span>
                  <span class="ml-auto">March 17-19</span>
              </div>
          </div>
      </div>

      <!-- Event Card 3 -->
      <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <img src="https://placehold.co/400x250/444/FFFFFF/png" alt="USS Yard Sale"
              class="w-full h-48 object-cover">
          <div class="p-4">
              <h3 class="font-bold text-lg mb-2">USS YARD SALE</h3>
              <div class="flex items-center text-gray-600">
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  </svg>
                  <span>City Hall,PIM 3</span>
                  <span class="ml-auto">March 29-31</span>
              </div>
          </div>
      </div>
  </div>
</section>