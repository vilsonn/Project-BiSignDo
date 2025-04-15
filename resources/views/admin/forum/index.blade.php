@extends('admin.layouts.app')

@section('title', 'Daftar Pertanyaan - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Pertanyaan</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('admin.forum.index') }}" method="GET" class="mb-6 flex">
        <input type="text" name="search" value="{{ request('search') }}" 
               class="flex-grow rounded-l-lg p-3 border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:outline-none"
               placeholder="Cari pertanyaan berdasarkan judul atau pembuat...">
        <button type="submit" 
                class="bg-pink-500 text-white px-6 py-3 rounded-r-lg hover:bg-pink-600 transition">
            Cari
        </button>
    </form>

    <!-- Tabel Pertanyaan -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg border-collapse">
            <thead class="bg-pink-100 text-pink-800">
                <tr>
                    <th class="py-3 px-4 border-b text-center">No</th>
                    <th class="py-3 px-4 border-b text-left">Judul</th>
                    <th class="py-3 px-4 border-b text-left">Pembuat</th>
                    <th class="py-3 px-4 border-b text-left">Tanggal</th>
                    <th class="py-3 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $index => $question)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($question->title, 40) }}</td>
                        <td class="py-3 px-4">{{ $question->user->name }}</td>
                        <td class="py-3 px-4">
                            Dibuat: {{ $question->created_at->format('d M Y H:i') }} <br>
                            Diedit: {{ $question->updated_at->format('d M Y H:i') }}
                        </td>
                        <td class="py-3 px-4 flex space-x-3">
                            <!-- Tombol Lihat Detail -->
                            <a href="{{ route('admin.forum.show', $question->id) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                                Detail
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.forum.destroy', $question->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin hapus pertanyaan ini? Semua jawaban juga akan terhapus!')">
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
                            Belum ada pertanyaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
