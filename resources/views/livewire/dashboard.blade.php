<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Hero Carousel -->
    <livewire:event-header />

    <!-- Add this after the carousel section and before the Upcoming Events section -->
    <livewire:event-widget />

    <!-- Tool Rentals Section -->
    <livewire:commodity-widget />

    <!-- Add Your Events Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-bold text-primary-700 mb-6">Add your Events</h2>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
            <div class="flex items-center space-x-4 cursor-pointer hover:opacity-80 transition-opacity">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900">Your Event</h3>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
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
