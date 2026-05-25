<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $eventData = $request->all();

        Event::create($eventData);

        return redirect()->route('events.index');
    }
}