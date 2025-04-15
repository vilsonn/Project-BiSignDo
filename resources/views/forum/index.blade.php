@extends('layout.app')

@section('title', 'Forum - BiSignDo')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Engage in Thoughtful Discussions
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                Ask questions, share answers, and grow together in the BiSignDo community.
            </p>
        </div>

        <!-- Search Bar Section -->
        <div class="mb-6">
            <form action="{{ route('forum.index') }}" method="GET" class="w-full flex shadow-lg">
                <input type="text" name="search" value="{{ request('search') }}" 
                    class="w-full rounded-l-lg p-3 border border-pink-300 focus:ring focus:ring-pink-400 focus:outline-none" 
                    placeholder="Search questions...">
                <button type="submit" 
                    class="bg-pink-500 text-white px-5 py-3 rounded-r-lg hover:bg-pink-600">
                    Search
                </button>
            </form>
        </div>

        <!-- Filter and Action Buttons Section -->
        <div class="flex flex-col md:flex-row items-center justify-between">
            <!-- Filter Dropdown -->
            <form action="{{ route('forum.index') }}" method="GET" class="flex items-center space-x-4">
                <label for="sort" class="text-pink-700 font-semibold">Sort By:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" 
                    class="rounded-lg p-2 border border-pink-300 focus:ring focus:ring-pink-500 focus:outline-none">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                </select>
            </form>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="{{ route('forum.create') }}" 
                    class="bg-pink-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-pink-600 transition">
                    + Create New Question
                </a>
                <a href="{{ route('forum.myQuestions') }}" 
                    class="bg-blue-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-blue-600 transition">
                    My Questions
                </a>
            </div>
        </div>

        <!-- All Questions Section -->
        <div class="bg-white rounded-xl shadow-xl p-10 mt-8">
            @if ($questions->isEmpty())
                <!-- No Questions Message -->
                <div class="text-center py-16">
                    <h2 class="text-3xl font-bold text-pink-600 mb-4">No Questions Found</h2>
                    <p class="text-gray-600">Try adjusting your search or be the first to ask a question!</p>
                </div>
            @else
                <!-- Questions Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($questions as $question)
                        <div class="relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2 duration-300">
                            <!-- Question Details -->
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-pink-600 mb-3 text-center truncate">{{ $question->title }}</h2>
                                <p class="text-gray-600 mt-2">{{ Str::limit($question->content, 100) }}</p>
                                <div class="text-sm text-gray-400 mt-2">
                                    <strong>Posted:</strong> {{ $question->created_at->diffForHumans() }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    <strong>By:</strong> {{ $question->user->name }}
                                </div>
                                <!-- View Details Button -->
                                <div class="flex justify-center mt-6">
                                    <a href="{{ route('forum.show', $question->id) }}" 
                                        class="bg-pink-500 text-white font-bold py-2 px-6 rounded-full shadow-lg hover:shadow-2xl hover:bg-pink-600 transition duration-300">
                                        View Details
                                    </a>
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
