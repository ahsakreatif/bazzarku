<div class="flex-1 max-w-xl mx-8">
    <div class="relative">
        <input type="search"
            wire:model.live.debounce.300ms="search"
            class="w-full bg-white text-gray-900 rounded-md pl-4 pr-10 py-2 focus:outline-none"
            placeholder="Search events or commodities...">
        <button class="absolute right-3 top-2.5">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>

        @if($showResults && count($results['events']) + count($results['commodities']) > 0)
            <div class="absolute w-full mt-2 bg-white rounded-md shadow-lg z-50 max-h-96 overflow-y-auto">
                @if(count($results['events']) > 0)
                    <div class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100">
                        Events
                    </div>
                    @foreach($results['events'] as $event)
                        <button wire:click="selectResult('event', {{ $event->id }})"
                            class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                            {{ $event->name }}
                        </button>
                    @endforeach
                @endif

                @if(count($results['commodities']) > 0)
                    <div class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100">
                        Commodities
                    </div>
                    @foreach($results['commodities'] as $commodity)
                        <button wire:click="selectResult('commodity', {{ $commodity->id }})"
                            class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                            {{ $commodity->name }}
                        </button>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
