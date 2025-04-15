@extends('layout.app')

@section('title', 'Question Details - BiSignDo')

@section('content')

@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
@endphp
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Question Details
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                View the details and join the discussion!
            </p>
        </div>

        <!-- Back to Forum Button -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('forum.index') }}" 
                class="bg-gray-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-gray-600 transition">
                ← Back to Forum
            </a>
        </div>

        <!-- Question Details -->
        <div class="bg-white rounded-xl shadow-xl p-10 relative">
            <h2 class="text-3xl font-bold text-pink-600 mb-4">{{ $question->title }}</h2>
            <p class="text-gray-600 mb-4">{{ $question->content }}</p>
            <div class="text-sm text-gray-400">
                <strong>Asked By:</strong> {{ $question->user->name }} 
                | <strong>Posted:</strong> {{ $question->created_at->diffForHumans() }}
            </div>

            <!-- Action Buttons for Question Owner -->
            @if(Auth::id() === $question->user_id)
                <div class="absolute top-5 right-5 flex space-x-3">
                    <a href="{{ route('forum.edit', $question->id) }}" 
                        class="bg-blue-500 text-white py-2 px-4 rounded-full shadow-md hover:bg-blue-600 transition">
                        Edit
                    </a>
                    <form action="{{ route('forum.destroy', $question->id) }}" method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this question?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-500 text-white py-2 px-4 rounded-full shadow-md hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Replies Section -->
        <div class="bg-white rounded-xl shadow-xl p-10 mt-10">
            <h3 class="text-2xl font-bold text-gray-700 mb-6">Replies</h3>
            @if ($question->answers->isEmpty())
                <p class="text-gray-500">No replies yet. Be the first to reply!</p>
            @else
                <div class="space-y-6">
                    @foreach ($question->answers as $answer)
                        <div class="bg-gray-100 rounded-lg p-6 shadow-md relative">
                            <p class="text-gray-700">{{ $answer->content }}</p>
                            <div class="text-sm text-gray-400 mt-2">
                                <strong>Replied By:</strong> {{ $answer->user->name }} 
                                | <strong>Posted:</strong> {{ $answer->created_at->diffForHumans() }}
                            </div>

                            <!-- Action Buttons for Answer Owner -->
                            @if(Auth::id() === $answer->user_id)
                                <div class="absolute top-5 right-5 flex space-x-3">
                                    <a href="{{ route('forum.answers.edit', $answer->id) }}" 
                                        class="bg-blue-500 text-white py-2 px-4 rounded-full shadow-md hover:bg-blue-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('forum.answers.destroy', $answer->id) }}" method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this answer?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="bg-red-500 text-white py-2 px-4 rounded-full shadow-md hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Reply Form -->
        <div class="bg-white rounded-xl shadow-xl p-10 mt-10">
            <h3 class="text-2xl font-bold text-gray-700 mb-6">Add Your Reply</h3>
            <form action="{{ route('forum.answers.store', $question->id) }}" method="POST">
                @csrf
                <div class="mb-6">
                    <textarea name="content" id="content" rows="5" 
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-pink-400 focus:outline-none" 
                        placeholder="Write your reply here..." required></textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" 
                        class="bg-pink-500 text-white font-bold py-2 px-6 rounded-full shadow-md hover:bg-pink-600 transition">
                        Submit Reply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
