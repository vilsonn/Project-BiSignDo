@extends('layout.app')

@section('title', 'Create Question - BiSignDo')

@section('content')
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Create a New Question
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                Have a query or topic in mind? Share it with the community!
            </p>
        </div>

        <!-- Back to Forum Button -->
        <div class="mb-8">
            <a href="{{ route('forum.index') }}" 
                class="bg-gray-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-gray-600 transition">
                ← Back to Forum
            </a>
        </div>

        <!-- Create Question Form -->
        <div class="bg-white rounded-xl shadow-xl p-10 mx-auto max-w-3xl">
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf

                <!-- Title Input -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Question Title</label>
                    <input type="text" name="title" id="title" 
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-pink-400 focus:outline-none" 
                        placeholder="Enter your question title" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Content Input -->
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Question Content</label>
                    <textarea name="content" id="content" rows="6" 
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-pink-400 focus:outline-none" 
                        placeholder="Provide details for your question" required>{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                        class="bg-pink-500 text-white font-bold py-2 px-6 rounded-full shadow-md hover:bg-pink-600 transition">
                        Submit Question
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
