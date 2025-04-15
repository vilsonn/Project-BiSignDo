@extends('layout.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto p-8">
    <div class="bg-gradient-to-r from-pink-500 to-pink-300 rounded-lg p-8 shadow-xl">
        <h1 class="text-5xl font-extrabold text-white mb-8 text-center">Edit Profile</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6 border border-green-500 shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6 border border-red-500 shadow">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="mt-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Profile -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Profile Image -->
            <div class="text-center mb-6">
                <label for="profile_image" class="block text-gray-700 font-semibold mb-2">Profile Picture</label>
                <div class="relative w-32 h-32 rounded-full overflow-hidden mx-auto border-4 border-pink-500 shadow-lg">
                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://via.placeholder.com/150' }}" 
                         alt="Profile Picture" 
                         class="w-full h-full object-cover">
                </div>
                <input type="file" 
                       id="profile_image" 
                       name="profile_image" 
                       class="mt-4 w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" />
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $user->name) }}" 
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" 
                       required />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $user->email) }}" 
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" 
                       required />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">New Password</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" 
                       placeholder="Enter new password (optional)" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" 
                       placeholder="Confirm new password" />
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('profile.index') }}" 
                   class="bg-gray-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-600 transition shadow-md">
                   Back to Profile
                </a>
                <button type="submit" 
                        class="bg-pink-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-pink-600 transition shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
