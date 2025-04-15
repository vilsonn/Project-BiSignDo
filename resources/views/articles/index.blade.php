<!-- resources/views/articles/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Artikel - BiSignDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex flex-col min-h-screen">

    <!-- HEADER -->
    <header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold text-white">BiSignDo</a>
            <nav class="hidden md:flex space-x-6 text-white font-medium">
                <a href="{{ route('dashboard') }}" class="hover:underline">Home</a>
                <a href="{{ route('articles.index') }}" class="hover:underline">Article</a>
                <a href="{{ route('events.index') }}" class="hover:underline">Event</a>
                <a href="{{ route('forum.index') }}" class="hover:underline">Forum</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline text-white bg-transparent border-none cursor-pointer">Logout</button>
                </form>
            </nav>
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none focus:ring-2 focus:ring-pink-500" aria-controls="mobile-menu" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-pink-500">
            <nav class="px-6 py-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block text-white hover:underline">Home</a>
                <a href="{{ route('articles.index') }}" class="block text-white hover:underline">Article</a>
                <a href="{{ route('events.index') }}" class="block text-white hover:underline">Event</a>
                <a href="{{ route('forum.index') }}" class="block text-white hover:underline">Forum</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="block text-white hover:underline bg-transparent border-none cursor-pointer">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- CONTENT AREA -->
    <div class="flex flex-1">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white border-r border-gray-200 shadow-md p-6 hidden md:block">
            <h2 class="text-xl font-bold mb-4">Daftar Artikel</h2>
            <nav class="space-y-2">
                @if($articles->count())
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article->id) }}"
                        class="block py-2 px-3 rounded hover:bg-pink-50 hover:text-pink-500 transition
                                @if(isset($selectedArticle) && $selectedArticle->id === $article->id) bg-pink-50 text-pink-500 @endif">
                            {{ $article->title }}
                        </a>
                    @endforeach
                @else
                    <p class="text-gray-500">Tidak ada artikel tersedia.</p>
                @endif
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8">
            @if($selectedArticle)
                <h1 class="text-3xl font-extrabold mb-4">{{ $selectedArticle->title }}</h1>

                <!-- VIDEO / IFRAME -->
                <!-- $selectedArticle->link adalah link embed (mis. https://www.youtube.com/embed/XYZ) -->
                <div class="mb-6 flex justify-center">
                    <iframe 
                        src="{{ $selectedArticle->link }}"
                        title="{{ $selectedArticle->title }}"
                        class="w-full max-w-xl h-64 md:h-96 border rounded"
                        allowfullscreen>
                    </iframe>
                </div>

                <!-- DESKRIPSI -->
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($selectedArticle->deskripsi)) !!}
                    <!-- nl2br() untuk menampilkan newline, e() untuk escape HTML -->
                </div>
            @else
                <div class="text-gray-600">
                    Tidak ada artikel yang dipilih.
                </div>
            @endif
        </main>
    </div>
    
    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 BiSignDo Indonesia. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Tailwind CSS and JavaScript for Mobile Menu -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
