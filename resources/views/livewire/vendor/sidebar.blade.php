<aside class="w-64 bg-white border-r border-gray-200">
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="w-full p-4 border-b">
            <a href="{{ route('vendor.dashboard') }}" class="w-full flex items-center">
                <img src="{{ asset('images/bazzarku.jpg') }}" alt="Bazzarku" class="w-full rounded-xl">
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('vendor.events') }}"
               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('vendor.events') ? 'bg-primary-50 text-primary-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Events
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-4 border-t">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    @if(Auth::user()->vendor && Auth::user()->vendor->picture)
                        <img src="{{ Auth::user()->vendor->picture }}" alt="{{ Auth::user()->name }}" class="h-10 w-10 rounded-full">
                    @else
                        <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                            <span class="text-primary-700 font-medium text-sm">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-500 truncate">
                        Vendor
                    </p>
                </div>
                <button wire:click="logout" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</aside>
