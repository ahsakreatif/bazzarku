<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
  <div class="min-h-screen flex items-center justify-center p-4">
      <div class="bg-white rounded-lg w-full max-w-md p-6 relative">
          <!-- Close button -->
          <button onclick="closeLoginModal()" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
          </button>

          <!-- Login Form -->
          <div class="space-y-6">
              <h2 class="text-xl font-semibold text-center">Sign in with email</h2>

              <form class="space-y-4">
                  <!-- Email -->
                  <div class="relative">
                      <div class="absolute inset-y-0 left-3 flex items-center">
                          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                          </svg>
                      </div>
                      <input type="email"
                          class="w-full pl-12 pr-4 py-3 bg-gray-100 rounded-lg focus:outline-none"
                          placeholder="Email"
                      >
                  </div>

                  <!-- Password -->
                  <div class="relative">
                      <div class="absolute inset-y-0 left-3 flex items-center">
                          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                          </svg>
                      </div>
                      <input type="password"
                          class="w-full pl-12 pr-10 py-3 bg-gray-100 rounded-lg focus:outline-none"
                          placeholder="Password"
                      >
                      <button type="button" class="absolute inset-y-0 right-3 flex items-center">
                          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                          </svg>
                      </button>
                  </div>

                  <!-- Login Button -->
                  <button type="submit" class="w-full bg-primary-700 text-white py-3 rounded-lg font-medium">
                      Login
                  </button>
              </form>

              <!-- Divider -->
              <div class="relative">
                  <div class="absolute inset-0 flex items-center">
                      <div class="w-full border-t border-gray-200"></div>
                  </div>
                  <div class="relative flex justify-center text-sm">
                      <span class="px-2 bg-white text-gray-500">or sign in with</span>
                  </div>
              </div>

              <!-- Social Login Buttons -->
              <div class="grid grid-cols-2 gap-4">
                  <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                      <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                  </button>
                  <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                      <svg class="w-5 h-5" viewBox="0 0 384 512">
                          <path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/>
                      </svg>
                  </button>
              </div>

              <!-- Register Link -->
              <div class="text-center">
                  <p class="text-sm text-gray-600">
                      Don't have an account?
                      <a href="/register" class="text-primary-700 hover:underline font-medium">Register Now</a>
                  </p>
              </div>
          </div>
      </div>
  </div>
</div>