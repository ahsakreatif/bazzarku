<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Event;
use App\Livewire\EventDetail;
use App\Livewire\EventRequest;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/login/{type}', Login::class)->name('auth.login');
Route::get('/register/{type}', Register::class)->name('auth.register');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('dashboard');
})->name('auth.logout');

Route::get('/events', Event::class)->name('events');
Route::get('/rentals', Event::class)->name('rentals');
Route::get('/events/tenant', EventRequest::class)->name('event.request');
Route::get('/events/{slug}', EventDetail::class)->name('events.detail');
Route::get('/events/{slug}/request', [ EventController::class, 'request' ] )->name('events.request');
