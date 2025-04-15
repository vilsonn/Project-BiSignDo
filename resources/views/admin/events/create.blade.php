@extends('admin.layouts.app')

@section('title', 'Buat Event - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Buat Event Baru</h1>
    <p class="text-gray-700 mb-6 text-center">
        Silakan isi form di bawah untuk membuat event baru.
    </p>

    <!-- Pesan sukses (flash) -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan error validasi -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-500">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mt-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Create Event -->
    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">
                Judul Event
            </label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="Masukkan judul event" 
                   required />
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700 font-semibold mb-2">
                Deskripsi
            </label>
            <textarea id="description" 
                      name="description" 
                      rows="5"
                      class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                             focus:ring-pink-500 transition"
                      placeholder="Tuliskan deskripsi event..." 
                      required>{{ old('description') }}</textarea>
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-gray-700 font-semibold mb-2">
                Lokasi
            </label>
            <input type="text" 
                   id="location" 
                   name="location" 
                   value="{{ old('location') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="Masukkan lokasi event" 
                   required />
        </div>

        <!-- Start Date -->
        <div>
            <label for="start_date" class="block text-gray-700 font-semibold mb-2">
                Tanggal Mulai
            </label>
            <input type="datetime-local" 
                   id="start_date" 
                   name="start_date" 
                   value="{{ old('start_date') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   required />
        </div>

        <!-- End Date -->
        <div>
            <label for="end_date" class="block text-gray-700 font-semibold mb-2">
                Tanggal Selesai
            </label>
            <input type="datetime-local" 
                   id="end_date" 
                   name="end_date" 
                   value="{{ old('end_date') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   required />
        </div>

        <!-- Event Type -->
        <div>
            <label for="type" class="block text-gray-700 font-semibold mb-2">
                Tipe Event
            </label>
            <select id="type" 
                    name="type" 
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                        focus:ring-pink-500 transition">
                <option value="internal" {{ old('type') === 'internal' ? 'selected' : '' }}>Internal</option>
                <option value="external" {{ old('type') === 'external' ? 'selected' : '' }}>External</option>
            </select>
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-gray-700 font-semibold mb-2">
                Poster Event
            </label>
            <input type="file" 
                   id="image" 
                   name="image" 
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition" />
        </div>

        <!-- Registration Link -->
        <div>
            <label for="registration_link" class="block text-gray-700 font-semibold mb-2">
                Link Pendaftaran
            </label>
            <input type="url" 
                   id="registration_link" 
                   name="registration_link" 
                   value="{{ old('registration_link') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="https://example.com/registration" />
        </div>

        <!-- Embed Instagram -->
        <div>
            <label for="embed_code" class="block text-gray-700 font-semibold mb-2">
                Embed Instagram (Opsional)
            </label>
            <textarea id="embed_code" 
                    name="embed_code" 
                    rows="5"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                            focus:ring-pink-500 transition"
                    placeholder="Masukkan embed code Instagram di sini">{{ old('embed_code') }}</textarea>
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-gray-700 font-semibold mb-2">
                Status Event
            </label>
            <select id="status" 
                    name="status" 
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                           focus:ring-pink-500 transition">
                <option value="upcoming" {{ old('status') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ old('status') === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="ended" {{ old('status') === 'ended' ? 'selected' : '' }}>Ended</option>
                <option value="canceled" {{ old('status') === 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <!-- Max Participants -->
        <div>
            <label for="max_participants" class="block text-gray-700 font-semibold mb-2">
                Maksimal Peserta
            </label>
            <input type="number" 
                   id="max_participants" 
                   name="max_participants" 
                   value="{{ old('max_participants') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="Masukkan maksimal peserta (opsional)" />
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <!-- Back to Index Button -->
            <a href="{{ route('event.index') }}" 
               class="bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">
                Kembali ke Daftar Event
            </a>
            <!-- Submit Button -->
            <button type="submit"
                    class="bg-pink-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-pink-600 
                           transition shadow-md">
                Simpan Event
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const typeSelect = document.getElementById('type');
                const registrationLink = document.getElementById('registration_link').parentElement;

                function toggleRegistrationLink() {
                    if (typeSelect.value === 'external') {
                        registrationLink.style.display = 'block';
                    } else {
                        registrationLink.style.display = 'none';
                    }
                }

                typeSelect.addEventListener('change', toggleRegistrationLink);
                toggleRegistrationLink();
            });
        </script>
    </form>
</div>
@endsection
