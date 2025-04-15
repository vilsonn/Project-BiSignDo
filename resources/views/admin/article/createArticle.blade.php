@extends('admin.layouts.app')

@section('title', 'Buat Artikel - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Buat Artikel Baru</h1>
    <p class="text-gray-700 mb-6 text-center">
        Silakan isi form di bawah untuk membuat artikel baru.
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

    <!-- Form Create Article -->
    <form action="{{ route('article.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">
                Judul Artikel
            </label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="Masukkan judul artikel" 
                   required />
        </div>

        <!-- Link -->
        <div>
            <label for="link" class="block text-gray-700 font-semibold mb-2">
                Link Iframe (YouTube atau lainnya)
            </label>
            <input type="text" 
                   id="link" 
                   name="link" 
                   value="{{ old('link') }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="https://www.youtube.com/embed/xxxxx" 
                   required />
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">
                Deskripsi
            </label>
            <textarea id="deskripsi" 
                      name="deskripsi" 
                      rows="5"
                      class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                             focus:ring-pink-500 transition"
                      placeholder="Tuliskan deskripsi artikel..." 
                      required>{{ old('deskripsi') }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <!-- Back to Index Button -->
            <a href="{{ route('article.index') }}" 
               class="bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">
                Kembali ke Daftar Artikel
            </a>
            <!-- Submit Button -->
            <button type="submit"
                    class="bg-pink-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-pink-600 
                           transition shadow-md">
                Simpan Artikel
            </button>
        </div>
    </form>
</div>
@endsection
