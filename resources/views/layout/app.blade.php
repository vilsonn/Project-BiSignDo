<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BiSignDo - Empowering Communication')</title>
    <meta name="description" content="BiSignDo | Empowering Communication for the speech-impaired community with innovative and effective sign language courses.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold text-white">BiSignDo</a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex space-x-6 text-white font-medium">
                <a href="{{ route('dashboard') }}" class="hover:underline">Home</a>
                <a href="{{ route('ai.detection') }}" class="hover:underline">Practice with AI</a>
                <a href="{{ route('articles.index') }}" class="hover:underline">Article</a>
                <a href="{{ route('events.index') }}" class="hover:underline">Event</a>
                <a href="{{ route('forum.index') }}" class="hover:underline">Forum</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline text-white bg-transparent border-none cursor-pointer">Logout</button>
                </form>
            </nav>

            <!-- User Profile Section -->
            <div class="relative" x-data="{ open: false }">
                <!-- Profile Trigger -->
                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
                        <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://via.placeholder.com/150' }}" 
                             alt="Profile Picture" 
                             class="w-full h-full object-cover">
                    </div>
                    <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" 
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                    <a href="{{ route('profile.index') }}" 
                       class="block px-4 py-2 text-gray-700 hover:bg-pink-500 hover:text-white transition">
                        View Profile
                    </a>
                    <a href="{{ route('profile.edit') }}" 
                       class="block px-4 py-2 text-gray-700 hover:bg-pink-500 hover:text-white transition">
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        <button type="submit" 
                                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-pink-500 hover:text-white transition">
                            Delete Profile
                        </button>
                    </form>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 BiSignDo Indonesia. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
