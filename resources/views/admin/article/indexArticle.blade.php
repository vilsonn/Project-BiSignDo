@extends('admin.layouts.app')

@section('title', 'Daftar Artikel - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Artikel</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('article.create') }}"
           class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 transition">
           + Tambah Artikel
        </a>
    </div>

    <!-- Tabel Artikel -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg border-collapse">
            <thead class="bg-pink-100 text-pink-800">
                <tr>
                    <th class="py-3 px-4 border-b text-center">No</th>
                    <th class="py-3 px-4 border-b text-left">Judul</th>
                    <th class="py-3 px-4 border-b text-left">Link (Iframe)</th>
                    <th class="py-3 px-4 border-b text-left">Deskripsi</th>
                    <th class="py-3 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $item->title }}</td>
                        <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($item->link, 30) }}</td>
                        <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($item->deskripsi, 40) }}</td>
                        <td class="py-3 px-4 flex space-x-3">
                            <!-- Tombol Edit -->
                            <a href="{{ route('article.edit', $item->id) }}"
                               class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                               Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('article.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?')">
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
                        <td colspan="5" class="py-3 px-4 text-center text-gray-500">
                            Belum ada artikel.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
