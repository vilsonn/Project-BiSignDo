@extends('admin.layouts.app')

@section('title', 'Create New User - Admin')

@section('content')
<div class="container mx-auto p-8">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Create New User</h1>
        <p class="text-gray-700 mb-6 text-center">Fill out the form below to create a new user profile, including an optional profile picture.</p>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-500 shadow-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="mt-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Create User -->
        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Enter name" required />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Enter email" required />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Enter password" required />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Confirm password" required />
            </div>

            <!-- Profile Picture -->
            <div>
                <label for="profile_image" class="block text-gray-700 font-semibold mb-2">Profile Picture</label>
                <input type="file" id="profile_image" name="profile_image" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition" />
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('profiles.index') }}" class="bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">Back</a>
                <button type="submit" class="bg-pink-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-pink-600 transition shadow-md">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection