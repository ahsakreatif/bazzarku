<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

Route::get('/', Livewire\Dashboard::class)->name('dashboard');
Route::get('/login/{type}', Livewire\Login::class)->name('auth.login');
Route::get('/register/{type}', Livewire\Register::class)->name('auth.register');

Route::get('/events', Livewire\Event::class)->name('events');
Route::get('/events/tenant', Livewire\EventRequest::class)->name('event.request');
Route::get('/events/{slug}', Livewire\Components\EventDetail::class)->name('events.detail');

Route::get('/rentals/{slug}', Livewire\CommodityTypeList::class)->name('commodity-type.list');
Route::get('/rentals', Livewire\CommodityList::class)->name('commodity.list');

// group for auth
Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('dashboard');
    })->name('auth.logout');
    // Route::get('/user/profile', Profile::class)->name('user.profile');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('dashboard');
})->name('auth.logout');


Route::get('/events/{slug}/request', [ EventController::class, 'request' ] )->name('events.request');

// Vendor Panel Routes
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->group(function () {
    Route::get('/dashboard', Livewire\Vendor\Dashboard::class)->name('vendor.dashboard');
    Route::get('/events', Livewire\Vendor\Events::class)->name('vendor.events');
});

Route::get('/vendors/{vendorId}', Livewire\VendorDetail::class)->name('vendor.detail');
