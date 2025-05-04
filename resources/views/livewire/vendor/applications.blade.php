<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Event Applications</h1>
        <p class="mt-1 text-sm text-gray-600">Track and manage applications for your events.</p>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <!-- Search -->
        <div class="w-full sm:w-1/3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search by name, email, phone..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                >
            </div>
        </div>

        <!-- Status Filter -->
        <div class="w-full sm:w-1/4">
            <select
                wire:model.live="status"
                class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md"
            >
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <!-- Event Filter -->
        <div class="w-full sm:w-1/4">
            <select
                wire:model.live="event_id"
                class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm rounded-md"
            >
                <option value="">All Events</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Clear Filters -->
        <div class="w-full sm:w-1/4">
            <button
                wire:click="clearFilters"
                type="button"
                class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200"
            >
                Clear Filters
            </button>
        </div>
    </div>

    <!-- Session Flash Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <!-- Applications Table -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Applicant
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Event
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Submitted
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($applications as $application)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $application->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $application->email }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $application->phone }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $application->event->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $application->status === 'approved' ? 'bg-green-100 text-green-800' :
                                   ($application->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $application->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="viewApplication({{ $application->id }})" class="text-primary-600 hover:text-primary-900 mr-3">
                                View
                            </button>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $application->phone) }}" target="_blank" class="text-green-600 hover:text-green-900 mr-3">
                                WhatsApp
                            </a>
                            <div class="inline-block relative">
                                <select
                                    wire:change="updateStatus({{ $application->id }}, $event.target.value)"
                                    class="block appearance-none bg-white border border-gray-300 hover:border-gray-400 px-2 py-1 pr-8 rounded text-sm leading-tight focus:outline-none focus:shadow-outline"
                                >
                                    <option value="" disabled>Change Status</option>
                                    <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approve</option>
                                    <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            <p>No applications found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $applications->links() }}
    </div>

    <!-- Application Details Modal -->
    @if($viewDetails && $selectedApplication)
        <div class="fixed inset-0 z-50 overflow-y-auto" x-data="{ show: true }" x-show="show" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Application Details</h3>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Event</p>
                            <p class="text-base font-medium">{{ $selectedApplication->event->name }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Applicant Name</p>
                            <p class="text-base">{{ $selectedApplication->name }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-base">{{ $selectedApplication->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone</p>
                                <p class="text-base">{{ $selectedApplication->phone }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Address</p>
                            <p class="text-base">{{ $selectedApplication->address }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Note</p>
                            <p class="text-base">{{ $selectedApplication->note ?: 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $selectedApplication->status === 'approved' ? 'bg-green-100 text-green-800' :
                                   ($selectedApplication->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($selectedApplication->status) }}
                            </span>
                        </div>

                        @if($selectedApplication->payment_proof)
                            <div class="mb-4">
                                <p class="text-sm font-medium text-gray-500">Payment Proof</p>
                                <img src="{{ $selectedApplication->payment_proof }}" alt="Payment Proof" class="mt-1 max-h-48 rounded">
                                <p class="text-xs text-gray-500 mt-1">Payment Date: {{ $selectedApplication->payment_datetime ? date('M d, Y H:i', strtotime($selectedApplication->payment_datetime)) : 'N/A' }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <select
                            wire:change="updateStatus({{ $selectedApplication->id }}, $event.target.value)"
                            class="block appearance-none border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded-md text-sm leading-tight focus:outline-none focus:shadow-outline ml-3"
                        >
                            <option value="" disabled selected>Change Status</option>
                            <option value="pending" {{ $selectedApplication->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $selectedApplication->status === 'approved' ? 'selected' : '' }}>Approve</option>
                            <option value="rejected" {{ $selectedApplication->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                        </select>
                        <button wire:click="closeDetails" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
