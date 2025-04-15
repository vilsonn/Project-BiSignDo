@extends('admin.layouts.app')

@section('title', 'Daftar Donasi & Feedback - Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Daftar Donasi & Feedback</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg border-collapse">
            <thead class="bg-pink-100 text-pink-800">
                <tr>
                    <th class="py-3 px-4 border-b text-center">No</th>
                    <th class="py-3 px-4 border-b text-left">Nama User</th>
                    <th class="py-3 px-4 border-b text-left">Jumlah Donasi</th>
                    <th class="py-3 px-4 border-b text-left">Isi Feedback</th>
                    <th class="py-3 px-4 border-b text-left">Jenis Feedback</th>
                    <th class="py-3 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donationsAndFeedbacks as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $item->user->name }}</td>
                        <td class="py-3 px-4">{{ number_format($item->donation_amount, 0, ',', '.') ?? '-' }}</td>
                        <td class="py-3 px-4">
                            {{ \Illuminate\Support\Str::limit($item->feedback_content, 50, '...') }}
                        </td>
                        <td class="py-3 px-4">{{ ucfirst($item->feedback_type) }}</td>
                        <td class="py-3 px-4 flex space-x-3">
                            <a href="{{ route('donation_feedback.show', $item->id) }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                               Detail
                            </a>
                            <a href="{{ route('donation_feedback.edit', $item->id) }}"
                               class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                               Edit
                            </a>
                            <form action="{{ route('donation_feedback.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
                        <td colspan="6" class="py-3 px-4 text-center text-gray-500">
                            Belum ada data donasi dan feedback.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $donationsAndFeedbacks->links() }}
    </div>
</div>
@endsection
