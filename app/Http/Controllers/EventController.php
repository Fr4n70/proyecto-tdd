<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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
        $validatedData = $request->all();
        Event::create($validatedData);
        return redirect()->route('events.index');
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $event->update($request->all());
        return redirect()->route('events.index');
    }
    
    public function destroy(Event $event)
    {
        $event->delete();
        return response(null, 204);
    }
}