<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\EventTenantRepository;
use Illuminate\Support\Facades\Auth;
use App\Constants\StatusSubmit;

class EventController extends Controller
{
    protected $eventRepo;
    protected $eventTenantRepo;

    public function __construct(EventRepository $eventRepo, EventTenantRepository $eventTenantRepo)
    {
        $this->eventRepo = $eventRepo;
        $this->eventTenantRepo = $eventTenantRepo;
    }

    public function index()
    {
        return view('pages.dashboard');
    }

    public function request($slug)
    {
        $user = Auth::user();

        if (!$user || !$user->tenant) {
            session()->flash('error', 'You must login first as tenant');
            return redirect()->route('auth.login', ['type' => 'tenant']);
        }

        $event = $this->eventRepo->findBySlug($slug);

        $eventTenant = $this->eventTenantRepo->create([
            'event_id' => $event->id,
            'tenant_id' => $user->tenant->id,
            'status' => StatusSubmit::PENDING,
        ]);

        if ($eventTenant->id) {
            return redirect()->route('event.request');
        }

        return back()->with('error', 'Failed to request event');
    }
}
