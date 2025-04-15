@extends('layout.app')

@section('title', 'Edit Answer - BiSignDo')

@section('content')
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Edit Your Answer
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                Update your answer to contribute better!
            </p>
        </div>

        <!-- Back to Question Button -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('forum.show', $answer->question_id) }}" 
                class="bg-gray-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-gray-600 transition">
                ← Back to Question
            </a>
        </div>

        <!-- Edit Answer Form -->
        <div class="bg-white rounded-xl shadow-xl p-10 mx-auto max-w-3xl">
            <form action="{{ route('forum.answers.update', $answer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Content Input -->
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Your Answer</label>
                    <textarea name="content" id="content" rows="6" 
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-pink-400 focus:outline-none" 
                        required>{{ old('content', $answer->content) }}</textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                        class="bg-pink-500 text-white font-bold py-2 px-6 rounded-full shadow-md hover:bg-pink-600 transition">
                        Update Answer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection