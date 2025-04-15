@extends('admin.layouts.app')

@section('title', 'Question Details - BiSignDo Admin')

@section('content')

<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Detail Pertanyaan</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Back to Question List -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.forum.index') }}" 
           class="bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-gray-600 transition">
           ← Kembali ke Daftar Pertanyaan
        </a>
    </div>

    <!-- Question Details -->
    <div class="bg-pink-50 rounded-xl shadow-lg p-10 mb-8">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">{{ $question->title }}</h2>
        <p class="text-gray-700 mb-6">{{ $question->content }}</p>
        <div class="text-sm text-gray-500">
            <strong>Dibuat Oleh:</strong> {{ $question->user->name }} <br>
            <strong>Dibuat Pada:</strong> {{ $question->created_at->format('d M Y H:i') }} <br>
            <strong>Diedit Pada:</strong> {{ $question->updated_at->format('d M Y H:i') }}
        </div>
    </div>

    <!-- Replies Section -->
    <div class="bg-white rounded-xl shadow-lg p-10">
        <h3 class="text-2xl font-bold text-gray-700 mb-6">Jawaban</h3>
        @if ($question->answers->isEmpty())
            <p class="text-gray-500">Belum ada jawaban untuk pertanyaan ini.</p>
        @else
            <div class="space-y-6">
                @foreach ($question->answers as $answer)
                    <div class="bg-gray-100 rounded-lg p-6 shadow-md relative">
                        <p class="text-gray-700 mb-4">{{ $answer->content }}</p>
                        <div class="text-sm text-gray-400">
                            <strong>Dibalas Oleh:</strong> {{ $answer->user->name }} <br>
                            <strong>Diposting:</strong> {{ $answer->created_at->format('d M Y H:i') }}
                        </div>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.forum.answers.destroy', $answer->id) }}" method="POST" 
                              class="absolute top-5 right-5" 
                              onsubmit="return confirm('Yakin ingin menghapus jawaban ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
