<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entities\Event;
use App\Entities\Commodity;
use App\Entities\Rental;
use App\Entities\Application;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalEvents = Event::where('user_id', $user->id)->count();
        $totalItems = Commodity::where('user_id', $user->id)->count();
        $totalRentals = Rental::join('commodities', 'rentals.commodity_id', '=', 'commodities.id')->where('commodities.user_id', $user->id)->count();
        $totalApplications = Application::join('events', 'applications.event_id', '=', 'events.id')->where('events.user_id', $user->id)->count();

        return view('vendor.dashboard', compact('totalEvents', 'totalItems', 'totalRentals', 'totalApplications'));
    }
}
