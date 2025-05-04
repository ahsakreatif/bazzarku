@extends('layouts.vendor')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Vendor Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Events -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Total Events</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalEvents }}</p>
            </div>

            <!-- Total Items -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Total Items</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalItems }}</p>
            </div>

            <!-- Total Rentals -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Total Rentals</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalRentals }}</p>
            </div>

            <!-- Total Applications -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Total Applications</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalApplications }}</p>
            </div>

        </div>
    </div>
@endsection
