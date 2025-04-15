<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiSignDo | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-pink-300 via-pink-500 to-white">
    <header   header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold text-white">BiSignDo</a>
            <nav class="hidden md:flex space-x-6 text-white font-medium">
                <!-- Scroll to 'services' section -->
                <a href="/#services" class="hover:underline">Services</a>
                <!-- Scroll to 'faq' section -->
                <a href="/#faq" class="hover:underline">FAQ</a>
                <!-- Scroll to 'footer' -->
                <a href="/#aboutus" class="hover:underline">About Us</a>
            </nav>
        </div>
    </header>
    <div class="flex min-h-screen">

        <!-- Kiri: Welcome Section -->
        <div class="w-1/2 flex items-center justify-center bg-gradient-to-b from-pink-500 to-white shadow-2xl">
            <div class="text-center text-white space-y-6">
                <!-- Menambahkan teks "We missed you" dalam kontainer yang sama dengan "Welcome Back!" -->
                <div class="backdrop-blur-lg rounded-xl p-8">
                    <!-- Menambahkan text-shadow untuk teks "Welcome Back!" dan "We missed you" -->
                    <h1 class="text-6xl font-extrabold tracking-tight leading-snug drop-shadow-2xl">Welcome to BiSignDo!</h1>
                    <p class="text-lg font-medium mt-4 drop-shadow-2xl">Let's start your journey!</p>
                </div>
            </div>
        </div>

        <!-- Kanan: Login Form -->
        <div class="w-1/2 flex items-center justify-center bg-white px-6 bg-gradient-to-b from-pink-500 to-white">
            <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl"> <!-- Menambahkan shadow pada form login -->
                <a href="/" class="text-gray-500 hover:text-pink-500 flex items-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Back to Landing Page
                </a>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Log In</h2>
                <p class="text-sm text-gray-500 mb-6">Welcome back! Please log in to your account</p>

                <!-- Blok untuk menampilkan error -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded">
                        <!-- Tampilkan semua pesan error -->
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-300" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-300" required>
                    </div>
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-pink-500 focus:ring-pink-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-pink-500 hover:underline">Forget Password?</a>
                    </div>
                    <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 px-6 rounded-xl font-semibold transition duration-300 transform hover:scale-105 shadow-md focus:outline-none">
                        Log In
                    </button>
                </form>

                <p class="text-center text-sm text-gray-600 mt-4">
                    New user? <a href="{{ route('register.form') }}" class="text-pink-500 hover:underline">Sign Up</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
