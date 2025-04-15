@extends('layout.app')

@section('title', 'User Profile')

@section('content')
<div class="container mx-auto p-8">
    <div class="bg-gradient-to-r from-pink-500 to-pink-300 rounded-lg p-8 shadow-xl">
        <h1 class="text-5xl font-extrabold text-white mb-8 text-center">Your Profile</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6 border border-green-500 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile-card bg-white p-8 rounded-lg shadow-md text-center">
            <!-- Profile Picture -->
            <div class="relative mx-auto mb-6 w-48 h-48 rounded-full overflow-hidden border-4 border-pink-500 shadow-lg">
                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://via.placeholder.com/150' }}" 
                     alt="Profile Picture" 
                     class="w-full h-full object-cover">
            </div>

            <!-- User Details -->
            <div class="text-center space-y-4">
                <h2 class="text-3xl font-bold text-pink-500">{{ $user->name }}</h2>

                <!-- Email -->
                <p class="text-gray-700 text-lg">
                    <i class="fas fa-envelope text-pink-500 mr-2"></i>
                    {{ $user->email }}
                </p>

                <!-- Account Created At -->
                <p class="text-gray-700 text-lg">
                    <i class="fas fa-calendar-alt text-pink-500 mr-2"></i>
                    Joined on {{ $user->created_at->format('M d, Y') }}
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center mt-8 space-x-6">
                <a href="{{ route('profile.edit') }}" 
                   class="bg-blue-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-600 transition shadow-lg">
                    Edit Profile
                </a>
                <form method="POST" action="{{ route('profile.destroy') }}" 
                    onsubmit="return confirm('Are you sure you want to delete your account?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-red-600 transition shadow-lg">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
