<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-pink-500 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-3xl font-bold text-white">BiSignDo Admin</a>
            <nav class="hidden md:flex space-x-6 text-white font-medium">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('profiles.index') }}" class="hover:underline">Manage Users</a>
                <a href="{{ route('event.index') }}" class="hover:underline">Manage Events</a>
                <a href="{{ route('article.index') }}" class="hover:underline">Manage Articles</a>
                <a href="{{ route('admin.forum.index') }}" class="hover:underline">Manage Forums</a>
                <a href="{{ route('donation_feedback.index') }}" class="hover:underline">Manage Feedbacks</a>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="hover:underline">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
            <button class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 BiSignDo Admin Panel. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
