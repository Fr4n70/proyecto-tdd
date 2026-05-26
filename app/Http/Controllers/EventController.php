<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;




class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $eventData = $request->all();

        Event::create($eventData);

        return redirect()->route('events.index');
    }
}