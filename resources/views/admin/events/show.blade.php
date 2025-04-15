@extends('admin.layouts.app')

@section('title', 'Detail Event - ' . $event->title)

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Detail Event</h1>
    <p class="text-gray-700 mb-6 text-center">
        Informasi lengkap tentang event <strong>{{ $event->title }}</strong>.
    </p>

    <!-- Detail Event -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Title -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Judul Event</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $event->title }}</p>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $event->description }}</p>
        </div>

        <!-- Location -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $event->location }}</p>
        </div>

        <!-- Dates -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Waktu Pelaksanaan</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">
                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }} - 
                {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}
            </p>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Status Event</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">
                <span class="py-1 px-3 rounded-full text-white 
                    {{ $event->status === 'upcoming' ? 'bg-blue-500' : '' }}
                    {{ $event->status === 'ongoing' ? 'bg-green-500' : '' }}
                    {{ $event->status === 'ended' ? 'bg-gray-500' : '' }}
                    {{ $event->status === 'canceled' ? 'bg-red-500' : '' }}">
                    {{ ucfirst($event->status) }}
                </span>
            </p>
        </div>

        <!-- Type -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tipe Event</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">
                <span class="py-1 px-3 rounded-full text-white 
                    {{ $event->type === 'internal' ? 'bg-green-500' : 'bg-blue-500' }}">
                    {{ ucfirst($event->type) }}
                </span>
            </p>
        </div>

        <!-- Max Participants -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Maksimal Peserta</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $event->max_participants ?? 'Tidak ada batas' }}</p>
        </div>

        <!-- External Registration Link -->
        @if ($event->type === 'external')
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Link Pendaftaran</label>
                <p class="bg-gray-50 p-3 border border-gray-300 rounded">
                    @if ($event->registration_link)
                        <a href="{{ $event->registration_link }}" target="_blank" class="text-blue-500 hover:underline">
                            {{ $event->registration_link }}
                        </a>
                    @else
                        <span class="text-gray-500">Tidak tersedia</span>
                    @endif
                </p>
            </div>
        @endif

        <!-- Image -->
        <div class="md:col-span-2 text-center">
            <label class="block text-gray-700 font-semibold mb-2">Poster Event</label>
            @if ($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="Poster Event" class="rounded-lg shadow-md w-1/2 mx-auto">
            @else
                <p class="bg-gray-50 p-3 border border-gray-300 rounded text-gray-500">Tidak ada poster</p>
            @endif
        </div>
    </div>

    <!-- Embed Instagram -->
    <div class="mt-6 text-center">
        <label class="block text-gray-700 font-semibold mb-2">Embed Instagram</label>
        @if ($event->embed_code)
            <div class="bg-gray-50 p-3 border border-gray-300 rounded inline-block">{!! $event->embed_code !!}</div>
        @else
            <p class="bg-gray-50 p-3 border border-gray-300 rounded text-gray-500">Tidak tersedia</p>
        @endif
    </div>

    <!-- Actions -->
    <div class="mt-6 flex justify-between">
        @if ($event->type === 'internal')
            <a href="{{ route('events.registrations', ['id' => $event->id]) }}" 
               class="bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-600 transition shadow-md">
                Lihat Daftar Peserta
            </a>
        @endif
        <a href="{{ route('event.index') }}" 
           class="bg-gray-500 text-white py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">
            Kembali ke Daftar Event
        </a>
    </div>
</div>
@endsection
