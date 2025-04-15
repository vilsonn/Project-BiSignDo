@extends('admin.layouts.app')

@section('title', 'Daftar Event - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Event</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Event -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('event.create') }}"
           class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 transition">
           + Tambah Event
        </a>
    </div>

    <!-- Tabel Event -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg border-collapse">
            <thead class="bg-pink-100 text-pink-800">
                <tr>
                    <th class="py-3 px-4 border-b text-center">No</th>
                    <th class="py-3 px-4 border-b text-left">Judul</th>
                    <th class="py-3 px-4 border-b text-left">Deskripsi</th>
                    <th class="py-3 px-4 border-b text-left">Lokasi</th>
                    <th class="py-3 px-4 border-b text-left">Tanggal Mulai</th>
                    <th class="py-3 px-4 border-b text-left">Tanggal Selesai</th>
                    <th class="py-3 px-4 border-b text-left">Status</th>
                    <th class="py-3 px-4 border-b text-left">Tipe</th>
                    <th class="py-3 px-4 border-b text-left">Maks. Peserta</th>
                    <th class="py-3 px-4 border-b text-left">Link / Pendaftaran</th>
                    <th class="py-3 px-4 border-b text-left">Embed Codes</th>
                    <th class="py-3 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $index => $event)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $event->title }}</td>
                        <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($event->description, 50) }}</td>
                        <td class="py-3 px-4">{{ $event->location }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}</td>
                        <td class="py-3 px-4">
                            <span class="py-1 px-3 rounded-full text-white 
                                {{ $event->status === 'upcoming' ? 'bg-blue-500' : '' }}
                                {{ $event->status === 'ongoing' ? 'bg-green-500' : '' }}
                                {{ $event->status === 'ended' ? 'bg-gray-500' : '' }}
                                {{ $event->status === 'canceled' ? 'bg-red-500' : '' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="py-1 px-3 rounded-full text-white 
                                {{ $event->type === 'internal' ? 'bg-green-500' : 'bg-blue-500' }}">
                                {{ ucfirst($event->type) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">{{ $event->max_participants ?? 'Tidak ada batas' }}</td>
                        <td class="py-3 px-4">
                        @if ($event->type === 'external' && $event->registration_link)
                            <a href="{{ $event->registration_link }}" target="_blank" class="text-blue-500 hover:underline">
                                Buka Link
                            </a>
                        @elseif ($event->type === 'internal')
                            <a href="{{ route('events.registrations', ['id' => $event->id]) }}" class="text-green-500 hover:underline">
                                Daftar Peserta
                            </a>
                        @else
                            <span class="text-gray-500">Tidak tersedia</span>
                        @endif
                        </td>
                        <td class="py-3 px-4">
                            @if ($event->embed_code)
                                <div>
                                    <button 
                                        class="text-pink-500 underline focus:outline-none flex items-center space-x-2" 
                                        onclick="toggleEmbed(this)">
                                        <span>Tampilkan Embed</span>
                                    </button>
                                    <div class="overflow-x-auto bg-gray-100 p-2 rounded mt-2 hidden">
                                        {!! $event->embed_code !!}
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-500">Tidak tersedia</span>
                            @endif
                        </td>
                        <script>
                            function toggleEmbed(button) {
                                const embedDiv = button.nextElementSibling;
                                if (embedDiv.classList.contains('hidden')) {
                                    embedDiv.classList.remove('hidden');
                                    button.textContent = 'Sembunyikan Embed';
                                } else {
                                    embedDiv.classList.add('hidden');
                                    button.textContent = 'Tampilkan Embed';
                                }
                            }
                        </script>
                        <td class="py-3 px-4 flex space-x-3">
                            <a href="{{ route('event.show', $event->id) }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                               View
                            </a>
                            <a href="{{ route('event.edit', $event->id) }}"
                               class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                               Edit
                            </a>
                            <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus event ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="py-3 px-4 text-center text-gray-500">
                            Belum ada event.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
