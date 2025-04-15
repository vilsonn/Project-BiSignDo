<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationsExport implements FromCollection, WithHeadings
{
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function collection()
    {
        return EventRegistration::where('event_id', $this->eventId)
            ->with('user')
            ->get()
            ->map(function ($registration) {
                return [
                    'name' => $registration->user->name,
                    'email' => $registration->user->email,
                    'registered_at' => $registration->created_at->format('d-m-Y H:i'),
                ];
            });
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Registered At'];
    }
}
