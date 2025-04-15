@extends('admin.layouts.app')

@section('title', 'Edit Artikel - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Edit Artikel</h1>
    <p class="text-gray-700 mb-6 text-center">
        Perbarui data artikel di bawah ini.
    </p>

    <!-- Validasi Error -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-500">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mt-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Update (method PUT) -->
    <form action="{{ route('article.update', $article->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">
                Judul Artikel
            </label>
            <input type="text"
                   id="title"
                   name="title"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2
                          focus:ring-pink-500 transition"
                   value="{{ old('title', $article->title) }}"
                   required />
        </div>

        <!-- Link -->
        <div>
            <label for="link" class="block text-gray-700 font-semibold mb-2">
                Link Iframe
            </label>
            <input type="text"
                   id="link"
                   name="link"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2
                          focus:ring-pink-500 transition"
                   value="{{ old('link', $article->link) }}"
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
                      required>{{ old('deskripsi', $article->deskripsi) }}</textarea>
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
                Update Artikel
            </button>
        </div>
    </form>
</div>
@endsection