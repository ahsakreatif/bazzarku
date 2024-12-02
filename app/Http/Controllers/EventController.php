<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function detail($id)
    {
        return view('pages.event-detail');
    }

    public function search(Request $request)
    {
        return view('pages.search');
    }
}
