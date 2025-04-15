@extends('layout.app')

@section('title', 'My Questions - BiSignDo')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Manage Your Questions
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                View, edit, or delete the questions you've created.
            </p>
        </div>

        <!-- Back to Forum Button -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('forum.index') }}" 
                class="bg-gray-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-gray-600 transition">
                ← Back to Forum
            </a>
        </div>

        <!-- Button to Create New Question -->
        <div class="mb-8 flex justify-end">
            <a href="{{ route('forum.create') }}" 
                class="bg-pink-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-pink-600 transition">
                + Create New Question
            </a>
        </div>

        <!-- My Questions Section -->
        <div class="bg-white rounded-xl shadow-xl p-10">
            @if ($myQuestions->isEmpty())
                <!-- No Questions Message -->
                <div class="text-center py-16">
                    <h2 class="text-3xl font-bold text-pink-600 mb-4">No Questions Found</h2>
                    <p class="text-gray-600">You haven't created any questions yet. Start asking now!</p>
                </div>
            @else
                <!-- Questions Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($myQuestions as $myQuestion)
                        <div class="relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2 duration-300">
                            <!-- Question Details -->
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-pink-600 mb-3 truncate">{{ $myQuestion->title }}</h2>
                                <p class="text-gray-600 mt-2">{{ Str::limit($myQuestion->content, 100) }}</p>
                                <div class="text-sm text-gray-400 mt-2">
                                    <strong>Created:</strong> {{ $myQuestion->created_at->format('d M Y') }}
                                </div>
                                <!-- Action Buttons -->
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('forum.edit', $myQuestion->id) }}" 
                                        class="text-blue-500 font-medium hover:underline">Edit</a>
                                    <form action="{{ route('forum.destroy', $myQuestion->id) }}" method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this question?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 font-medium hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
