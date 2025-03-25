<!-- Add this after the login modal and before the navigation -->
<div id="eventDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
  <div class="min-h-screen flex items-center justify-center p-4">
      <div class="bg-white rounded-lg w-full max-w-4xl relative">
          <!-- Close button -->
          <button onclick="closeEventModal()" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600 z-10">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
          </button>

          <div class="flex flex-col md:flex-row">
              <!-- Left side - Image -->
              <div class="w-full md:w-1/2">
                  <img src="https://placehold.co/800x600/333/FFFFFF/png" alt="Event Image"
                      class="w-full h-[300px] md:h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
              </div>

              <!-- Right side - Content -->
              <div class="w-full md:w-1/2 p-6 space-y-4">
                  <div class="space-y-4">
                      <h2 class="text-2xl font-bold">Sound System</h2>

                      <div class="flex items-center text-2xl font-bold text-primary-700">
                          <span>Rp.1.000.000,00</span>
                      </div>

                      <div class="flex items-center text-gray-600">
                          <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                          </svg>
                          <span>Tangerang</span>
                      </div>

                      <div class="border-t border-gray-200 pt-4">
                          <h3 class="text-lg font-semibold mb-2">Description</h3>
                          <p class="text-gray-600 text-sm leading-relaxed">
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                              <br><br>
                              Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                          </p>
                      </div>
                  </div>

                  <!-- Contact Button -->
                  <div class="pt-6">
                      <a href="https://wa.me/1234567890" target="_blank"
                          class="flex items-center justify-center gap-2 w-full bg-green-500 text-white py-3 rounded-lg font-medium hover:bg-green-600 transition duration-200">
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>
                          </svg>
                          Contact us Through WhatsApp
                      </a>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>