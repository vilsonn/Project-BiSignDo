@extends('admin.layouts.app')

@section('title', 'Daftar Peserta - ' . $event->title)

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Peserta</h1>

    <p class="text-gray-700 mb-6 text-center">
        Event: <strong>{{ $event->title }}</strong> <br>
        Lokasi: <strong>{{ $event->location }}</strong> <br>
        Waktu: <strong>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}</strong>
    </p>

    @if ($registrations->isEmpty())
        <p class="text-center text-gray-500 text-lg font-semibold">Belum ada peserta yang mendaftar untuk event ini.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded-lg border-collapse">
                <thead class="bg-pink-100 text-pink-800">
                    <tr>
                        <th class="py-3 px-4 border-b text-center">No</th>
                        <th class="py-3 px-4 border-b text-left">Nama</th>
                        <th class="py-3 px-4 border-b text-left">Email</th>
                        <th class="py-3 px-4 border-b text-left">Tanggal Pendaftaran</th>
                        <th class="py-3 px-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $index => $registration)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $registration->user->name }}</td>
                            <td class="py-3 px-4">{{ $registration->user->email }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($registration->created_at)->format('d M Y H:i') }}</td>
                            <td class="py-3 px-4 text-center">
                            <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus peserta ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg shadow-md hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-6 flex justify-between">
        <a href="{{ route('events.export', $event->id) }}" 
            class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 transition">
            Export to Excel
        </a>
        <a href="{{ route('event.index') }}" 
           class="bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-gray-600 transition">
           Kembali ke Daftar Event
        </a>
    </div>
</div>
@endsection
