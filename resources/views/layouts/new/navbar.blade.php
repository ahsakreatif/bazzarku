<div>

  <!-- Navigation Bar -->
  <nav class="bg-primary-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/bazzarku.jpg') }}" alt="{{ config('app.name') }} Logo">
                    <span class="ml-2 text-xl font-bold hidden sm:inline">{{ config('app.name') }}</span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-white hover:bg-primary-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" class="font-medium">Home</a>
                    <a href="{{ route('events') }}" class="font-medium">Events</a>
                    <a href="{{ route('commodity.list') }}" class="font-medium">Rental</a>
                    @auth
                        @if(Auth::user()->hasRole('tenant'))
                            <a href="{{ route('events.tenant') }}" class="font-medium">History</a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Search Bar -->
            <livewire:components.search-bar />

            <!-- Auth Buttons -->
            <div>
                @auth
                    <div class="relative group">
                        <button class="flex items-center bg-white text-primary-700 px-6 py-2 rounded-md font-medium">
                            @if(Auth::user()->hasRole('tenant') && Auth::user()->tenant->picture)
                                <img class="h-6 w-6 rounded-full mr-2" src="{{ Auth::user()->tenant->picture }}" alt="{{ Auth::user()->name }}">
                            @elseif(Auth::user()->hasRole('vendor') && Auth::user()->vendor->picture)
                                <img class="h-6 w-6 rounded-full mr-2" src="{{ Auth::user()->vendor->picture }}" alt="{{ Auth::user()->name }}">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            @endif
                            {{ Auth::user()->name }}
                        </button>
                        <div class="hidden group-hover:block absolute right-0 w-48 bg-white border border-gray-100 rounded-lg shadow-lg z-10">
                            <ul class="py-2 text-sm text-gray-700">
                                @if(Auth::user()->hasRole('vendor'))
                                    <li><a href="{{ route('vendor.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">{{ __('Vendor Panel') }}</a></li>
                                @endif
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">{{ __('Profile') }}</a></li>
                                @if(Auth::user()->hasRole('tenant'))
                                    <li><a href="{{ route('user.settings') }}" class="block px-4 py-2 hover:bg-gray-100">{{ __('History') }}</a></li>
                                @endif
                                <li><a href="{{ route('auth.logout') }}" class="block px-4 py-2 hover:bg-gray-100">{{ __('Logout') }}</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <button onclick="openLoginModal()" class="bg-white text-primary-700 px-2 py-2 rounded-md font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <span class="hidden sm:inline">{{ __('Login') }}</span>
                    </button>
                @endauth
            </div>
        </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden">
    <div class="fixed inset-y-0 left-0 w-64 bg-white transform transition-transform duration-300 ease-in-out -translate-x-full" id="sidebar">
        <div class="bg-primary-700 p-6 space-y-6">
            <!-- Close button -->
            <div class="flex justify-end">
                <button id="close-mobile-menu" class="p-2 text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Logo -->
            <div class="flex items-center">
                <img class="h-8 w-auto" src="{{ asset('images/bazzarku.jpg') }}" alt="{{ config('app.name') }} Logo">
                <span class="ml-2 text-xl font-bold text-white">{{ config('app.name') }}</span>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <!-- Mobile Navigation Links -->
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded-lg text-gray-900 hover:bg-gray-100">Home</a>
                <a href="{{ route('commodity.list') }}" class="block py-2.5 px-4 rounded-lg text-gray-900 hover:bg-gray-100">Rental</a>
                <a href="{{ route('events') }}" class="block py-2.5 px-4 rounded-lg text-gray-900 hover:bg-gray-100">Events</a>
            </nav>

            <!-- Mobile Login Button -->
            @guest
                <div class="mt-6">
                    <button onclick="closeMenuAndOpenLogin()"
                        class="w-full bg-primary-700 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-primary-800">
                        Login
                    </button>
                </div>
            @endguest
        </div>
    </div>
  </div>
</div>
