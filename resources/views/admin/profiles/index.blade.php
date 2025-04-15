@extends('admin.layouts.app')

@section('title', 'Daftar Pengguna - Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Pengguna</h1>
    <p class="text-gray-700 mb-6 text-center">Berikut adalah daftar pengguna yang terdaftar.</p>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Pengguna -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('profiles.create') }}"
           class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 transition">
           + Tambah Pengguna
        </a>
    </div>

    <!-- Tabel Pengguna -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg border-collapse">
            <thead class="bg-pink-100 text-pink-800">
                <tr>
                    <th class="py-3 px-4 border-b text-center">No</th>
                    <th class="py-3 px-4 border-b text-center">Gambar</th>
                    <th class="py-3 px-4 border-b text-left">Nama</th>
                    <th class="py-3 px-4 border-b text-left">Email</th>
                    <th class="py-3 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-pink-500 mx-auto">
                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://via.placeholder.com/150' }}" 
                                     alt="Profile Picture" 
                                     class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4 flex space-x-3">
                            <a href="{{ route('profiles.edit', $user->id) }}"
                               class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                               Edit
                            </a>
                            <form action="{{ route('profiles.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
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
                            Belum ada pengguna terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
