<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEventController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve search keywords, status, and type filters
        $search = $request->input('search');
        $status = $request->input('status');
        $type = $request->input('type');
    
        // Base query
        $query = Event::query();
    
        // Filter by search keyword
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%');
            });
        }
    
        // Filter by status
        if ($status) {
            $query->where('status', $status);
        }
    
        // Filter by type
        if ($type) {
            $query->where('type', $type);
        }
    
        // Retrieve results
        $events = $query->orderBy('start_date')->get();
    
        // Get the first event, if any
        $selectedEvent = $events->first();
    
        return view('events.index', compact('events', 'selectedEvent', 'search', 'status', 'type'));
    }
    

    public function show($id)
    {
        $events = Event::orderBy('start_date')->get();
        $selectedEvent = Event::findOrFail($id);

        return view('events.show', compact('events', 'selectedEvent'));
    }

    public function register(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
    
        if ($event->type === 'external') {
            return redirect()->route('events.show', $eventId)->with('error', 'Registration is only available via external link.');
        }
    
        // Cek apakah user sudah terdaftar
        if ($event->registrations()->where('user_id', Auth::id())->exists()) {
            return redirect()->route('events.show', $eventId)->with('error', 'You are already registered for this event.');
        }
    
        // Cek batas peserta
        if ($event->max_participants && $event->registrations()->count() >= $event->max_participants) {
            return redirect()->route('events.show', $eventId)->with('error', 'This event is fully booked.');
        }
    
        // Daftarkan user
        $event->registrations()->create([
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('events.show', $eventId)->with('success', 'You have successfully registered for this event!');
    }    
}