<div id="signupModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
  <div class="min-h-screen flex items-center justify-center p-4">
      <!-- Increased max-width and adjusted layout -->
      <div class="bg-white rounded-lg w-full max-w-4xl relative flex">
          <!-- Left Side - Blue Background with Logo -->
          <div class="hidden md:flex w-1/2 bg-primary-700 items-center justify-center p-8 rounded-l-lg">
              <div class="w-full max-w-md">
                  <img class="w-full" src="/images/bazzarku.jpg" alt="Bazzarku Logo">
              </div>
          </div>

          <!-- Right Side - Sign Up Form -->
          <div class="w-full md:w-1/2 p-8">
              <!-- Close button -->
              <button onclick="closeSignupModal()" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>

              <!-- Signup Form -->
              <div class="space-y-8">
                  <div>
                      <h1 class="text-4xl font-bold mb-2">Create an account</h1>
                      <p class="text-base">
                          Already have an account?
                          <a href="#" onclick="openLoginModal()" class="text-primary-700 hover:underline font-medium">Log in</a>
                      </p>
                  </div>

                  @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif

                  <form wire:submit.prevent="register" class="space-y-6">
                      <!-- Name -->
                      <div>
                          <input type="text"
                              wire:model="name"
                              placeholder="Full Name"
                              class="w-full px-4 py-3 rounded-lg bg-gray-100 border-0 focus:ring-2 focus:ring-primary-700"
                              required>
                      </div>

                      <!-- Email -->
                      <div>
                          <input type="email"
                              wire:model="email"
                              placeholder="Email"
                              class="w-full px-4 py-3 rounded-lg bg-gray-100 border-0 focus:ring-2 focus:ring-primary-700"
                              required>
                      </div>

                      <!-- Password -->
                      <div class="relative">
                          <input type="password"
                              wire:model="password"
                              placeholder="Enter your Password"
                              class="w-full px-4 py-3 rounded-lg bg-gray-100 border-0 focus:ring-2 focus:ring-primary-700"
                              required>
                          <button type="button" class="absolute inset-y-0 right-3 flex items-center">
                              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                          </button>
                      </div>

                      <!-- Password Confirmation -->
                      <div class="relative">
                          <input type="password"
                              wire:model="password_confirmation"
                              placeholder="Confirm Password"
                              class="w-full px-4 py-3 rounded-lg bg-gray-100 border-0 focus:ring-2 focus:ring-primary-700"
                              required>
                      </div>

                      <!-- Terms and Conditions -->
                      <div class="flex items-center">
                          <input type="checkbox"
                              wire:model="terms"
                              id="terms"
                              class="w-5 h-5 text-primary-700 rounded focus:ring-primary-700"
                              required>
                          <label for="terms" class="ml-2 text-gray-700">
                              I agree to
                              <a href="#" class="text-primary-700 hover:underline">Terms and Conditions</a>
                          </label>
                      </div>

                      <!-- Create Account Button -->
                      <button type="submit"
                          class="w-full bg-primary-700 text-white py-3 rounded-lg font-semibold hover:bg-primary-800 transition duration-200">
                          Create Account
                      </button>

                      <!-- Divider -->
                      <div class="relative">
                          <div class="absolute inset-0 flex items-center">
                              <div class="w-full border-t border-gray-300"></div>
                          </div>
                          <div class="relative flex justify-center text-sm">
                              <span class="px-2 bg-white text-gray-500">Or register with</span>
                          </div>
                      </div>

                      <!-- Social Login Button -->
                      <button type="button"
                          class="w-full flex items-center justify-center py-3 px-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                          <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5" alt="Google logo">
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
