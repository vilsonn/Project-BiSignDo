<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    // 1. INDEX: Menampilkan daftar event
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    // 2. CREATE: Form tambah event
    public function create()
    {
        return view('admin.events.create');
    }

    // 3. STORE: Proses simpan event baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required',
            'location'          => 'required|string|max:255',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'type'              => 'required|in:internal,external',
            'image'             => 'nullable|image|max:2048',
            'status'            => 'required|in:upcoming,ongoing,ended,canceled',
            'max_participants'  => 'nullable|integer|min:1',
            'registration_link' => 'nullable|url|required_if:type,external',
            'embed_code'        => 'nullable|string',
        ]);
        
        $imagePath = $request->file('image') ? $request->file('image')->store('events', 'public') : null;
        
        Event::create(array_merge($validatedData, ['image' => $imagePath]));        

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat!');
    }

    // 4. SHOW: Detail event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    // 5. EDIT: Form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // 6. UPDATE: Proses update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $validatedData = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required',
            'location'          => 'required|string|max:255',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'image'             => 'nullable|image|max:2048',
            'status'            => 'required|in:upcoming,ongoing,ended,canceled',
            'max_participants'  => 'nullable|integer|min:1',
            'registration_link' => 'nullable|url',
            'embed_code'        => 'nullable|string',
        ]);

        // Upload image jika ada
        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $imagePath = $request->file('image')->store('events', 'public');
        } else {
            $imagePath = $event->image;
        }

        $event->update(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui!');
    }

    // 7. DESTROY: Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
    
        // Hapus file gambar jika ada
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }
    
        // Hapus event dari database
        $event->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()
            ->route('event.index')
            ->with('success', 'Event berhasil dihapus!');
    }
    


    // 8. REGISTRATIONS: Menampilkan daftar pendaftar untuk event
    public function registrations($id)
    {
        $event = Event::findOrFail($id);
    
        if ($event->type !== 'internal') {
            return redirect()->route('event.index')->with('error', 'Participant list is only available for internal events.');
        }
    
        $registrations = $event->registrations()->with('user')->get();
    
        return view('admin.events.registrations', compact('event', 'registrations'));
    }

    // 9. DESTROY REGISTRATION: Hapus pendaftar
    public function destroyRegistration($id)
    {
        $registration = EventRegistration::findOrFail($id);

        $registration->delete();

        return redirect()
            ->back()
            ->with('success', 'Peserta berhasil dihapus!');
    }

    public function exportRegistrations($eventId)
    {
        $event = Event::findOrFail($eventId);

        if ($event->type !== 'internal') {
            return redirect()->route('event.index')->with('error', 'Export is only available for internal events.');
        }

        return Excel::download(new RegistrationsExport($eventId), 'registrations-' . $event->title . '.xlsx');
    }
}