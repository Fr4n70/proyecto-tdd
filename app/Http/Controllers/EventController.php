<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // $eventData = $request->all();

        $eventData = $request->validate([
            'name' => 'required|string|max:255',
            'featured' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'required|string|max:255'
        ]);

        Event::create($eventData);

        return redirect()->route('events.index');
    }
}