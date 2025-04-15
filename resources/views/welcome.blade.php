<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiSignDo - Empowering Communication</title>
    <meta name="description" content="BiSignDo | Empowering Communication for the speech-impaired community with innovative and effective sign language courses.">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-pink-500 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold text-white">BiSignDo</a>
            <nav class="hidden md:flex space-x-6 text-white font-medium">
                <!-- Scroll to 'services' section -->
                <a href="#services" class="hover:underline">Services</a>
                <!-- Scroll to 'faq' section -->
                <a href="#faq" class="hover:underline">FAQ</a>
                <!-- Scroll to 'footer' -->
                <a href="#aboutus" class="hover:underline">About Us</a>
            </nav>
            <div class="hidden md:flex space-x-4">
                <a href="/login">
                    <button class="bg-white text-pink-500 font-bold py-2 px-5 rounded-lg hover:bg-pink-200 transition">Log In</button>
                </a>
                <a href="/register">
                    <button class="bg-white text-pink-500 font-bold py-2 px-5 rounded-lg hover:bg-pink-200 transition">Sign Up</button>
                </a>
            </div>
            <button class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="bg-gradient-to-b from-pink-500 to-white text-white py-20">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-10">
            <div class="text-center md:text-left relative z-10">
                <!-- Box with Frosted Glass Effect -->
                <div class="bg-white bg-opacity-0 backdrop-blur-lg p-10 rounded-xl">
                    <h1 class="text-5xl font-extrabold leading-tight text-white">Empowering Communication</h1>
                    <p class="mt-6 text-lg font-light text-white">
                        Join us in revolutionizing the way we communicate through innovative solutions for the speech-impaired community.
                    </p>
                    <div class="mt-8">
                        <a href="/login">
                            <button class="bg-white text-pink-500 font-bold py-3 px-6 rounded-lg hover:bg-pink-600 transition shadow-lg">
                                Get Started
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <!-- Ganti asset() dengan URL gambar Anda jika perlu -->
                <img src="{{ asset('images/image 25.png') }}" alt="Illustration" class="w-full h-auto mx-auto rounded-xl">
            </div>
        </div>
    </main>

    <!-- Services Section -->
    <section id="services" class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-gray-800 text-center">Our Services</h2>
            <p class="mt-4 text-lg text-gray-600 text-center max-w-2xl mx-auto">
                BiSignDo brings you a set of innovative services to help you master sign language 
                with ease and have fun along the way.
            </p>
            
            <!-- Grid of Services -->
            <!-- Menjadi 6 item agar 2 baris x 3 kolom di resolusi md ke atas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                
                <!-- 1. AI Sign Language Practice -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon kamera/AI -->
                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 12h.01 M12 12h.01 M16 12h.01 M9 16h6" />
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        AI Sign Language Practice
                    </h3>
                    <p class="text-gray-600 text-center">
                        Practice your signing skills with real-time AI detection that gives you instant feedback 
                        on your Bisindo gestures and helps you improve accuracy.
                    </p>
                </div>

                <!-- 2. Konten Pembelajaran -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon daftar/bullet -->
                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9" />
                            <path d="M12 14h9" />
                            <path d="M12 8h9" />
                            <circle cx="5" cy="8" r="1" />
                            <circle cx="5" cy="14" r="1" />
                            <circle cx="5" cy="20" r="1" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        Comprehensive Learning Content
                    </h3>
                    <p class="text-gray-600 text-center">
                        Explore a variety of lessons, tutorials, and interactive exercises to build 
                        a strong foundation in sign language from the basics to advanced concepts.
                    </p>
                </div>

                <!-- 3. Live Events & Workshops -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon kalender -->
                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        Live Events & Workshops
                    </h3>
                    <p class="text-gray-600 text-center">
                        Join our online and offline events to enhance your skills, meet experts, and 
                        connect with fellow learners in a supportive environment.
                    </p>
                </div>

                <!-- 4. Discussion Forum -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon pesan/chat -->
                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h11l5 5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        Discussion Forum
                    </h3>
                    <p class="text-gray-600 text-center">
                        Exchange insights, ask questions, and share your journey with a vibrant community 
                        of sign language enthusiasts and educators.
                    </p>
                </div>

                <!-- 5. Feedback & Donasi -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon donasi -->
                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 15V3a1 1 0 0 1 1-1h2" />
                            <path d="M15 8h.01" />
                            <path d="M20 13v9a1 1 0 0 1-1 1h-2" />
                            <path d="M9 7h.01" />
                            <path d="M9 15h.01" />
                            <path d="M3 20h18" />
                            <path d="M12 3v2" />
                            <path d="M12 9v2" />
                            <path d="M12 15v2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        Feedback & Donations
                    </h3>
                    <p class="text-gray-600 text-center">
                        Contribute to our development through your feedback and donations. Help us 
                        improve our services and reach more people in need.
                    </p>
                </div>

                <!-- 6. Coming Soon -->
                <div class="bg-gray-50 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-center w-16 h-16 bg-pink-100 rounded-full mx-auto mb-4">
                        <!-- Contoh ikon 'sparkles' untuk coming soon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-500" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9.813 16.4a1 1 0 01-.846.464l-1.457.057a1 1 0 01-.577-1.777l1.103-.88a1 1 0 00.308-1.023l-.37-1.472a1 1 0 011.31-1.197l1.443.464a1 1 0 00.959-.229l1.09-.85a1 1 0 011.636.48l.475 1.389a1 1 0 00.962.669l1.4-.052a1 1 0 01.865 1.483l-.716 1.24a1 1 0 00.12 1.158l.964 1.048a1 1 0 01-.52 1.66l-1.461.219a1 1 0 00-.81.648l-.49 1.244a1 1 0 01-1.473.524l-1.2-.777a1 1 0 00-1.126 0l-1.2.777a1 1 0 01-1.473-.524l-.49-1.244a1 1 0 00-.81-.648z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-3">
                        Coming Soon
                    </h3>
                    <p class="text-gray-600 text-center">
                        Stay tuned for more exciting features that will further enrich your 
                        sign language learning experience!
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Course Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-800">Top Online Course for Mastering Sign Language</h2>
            <p class="mt-4 text-lg text-gray-600">
                Join thousands of learners who trust BiSignDo Online Class to master sign language 
                effectively and confidently.
            </p>
            <div class="mt-12 flex justify-center space-x-16">
                <div class="text-center">
                    <h3 class="text-6xl font-extrabold text-pink-500">1,000+</h3>
                    <p class="text-gray-700 mt-2">Total Users</p>
                </div>
                <div class="text-center">
                    <h3 class="text-6xl font-extrabold text-pink-500">4.8</h3>
                    <p class="text-gray-700 mt-2">User Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 text-center">Frequently Asked Questions</h2>
            <div class="mt-12 space-y-8">
                <div class="border border-gray-300 rounded-lg p-6 shadow-md hover:shadow-lg transition">
                    <h3 class="text-2xl font-semibold text-gray-800">What is BiSignDo?</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        BiSignDo is a platform designed to empower sign language education, especially Bisindo!
                    </p>
                </div>
                <div class="border border-gray-300 rounded-lg p-6 shadow-md hover:shadow-lg transition">
                    <h3 class="text-2xl font-semibold text-gray-800">Is BiSignDo free?</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Yes! BiSignDo offers resources and features for free!
                    </p>
                </div>
                <div class="border border-gray-300 rounded-lg p-6 shadow-md hover:shadow-lg transition">
                    <h3 class="text-2xl font-semibold text-gray-800">Is there any way users can support the developer?</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Yes, you can support us by donating or just spread the news about our platform!
                    </p>
                </div>
                <!-- Unique about BiSignDo -->
                <div class="border border-gray-300 rounded-lg p-6 shadow-md hover:shadow-lg transition">
                    <h3 class="text-2xl font-semibold text-gray-800">Is there anything unique about BiSignDo?</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Absolutely! You can practice your sign language skills with our integrated AI model 
                        right on our website. It’s a fun, immersive, and interactive way to get real-time feedback 
                        on your signing—perfect for boosting your confidence and proficiency!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section (Sebelum Footer) -->
    <section id="aboutus" class="relative py-16 bg-gradient-to-b from-pink-50 to-white overflow-hidden">
        <!-- Wave SVG di Bagian Atas -->
        <div class="absolute inset-x-0 top-0 -z-10 overflow-hidden">
            <svg class="block w-full h-32" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#FCEFF5" fill-opacity="1" 
                    d="M0,224L60,234.7C120,245,240,267,360,272C480,277,600,267,720,245.3C840,224,960,192,1080,186.7C1200,181,1320,203,1380,213.3L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                </path>
            </svg>
        </div>

        <div class="container mx-auto px-6 text-center">
            <!-- Judul -->
            <h2 class="text-4xl md:text-5xl font-extrabold text-pink-500 tracking-tight drop-shadow-sm">
                Meet Our Team
            </h2>
            
            <!-- Foto Bareng Tim -->
            <div class="mt-10 flex justify-center">
                <!-- Ganti "about us.jpg" dengan foto grup kalian -->
                <img 
                    src="{{ asset('images/about us.jpg') }}"
                    alt="Group Photo of Kelompok 2 SI4605" 
                    class="w-full max-w-3xl rounded-lg shadow-xl object-cover"
                >
            </div>

            <!-- Biografi Keseluruhan -->
            <p class="mt-8 text-gray-600 leading-relaxed text-justify">
                We are <strong>BiSignDo | Group 2, SI-46-05</strong>, bachelor students in <strong>Information Systems at Telkom University.</strong>
                Motivated by a shared vision and dedication to innovative digital solutions, we aim to solve challenges and help educate people with disabilities in learning BISINDO.
                Our goal is to empower the speech-impaired community by making sign language education accessible, interactive, and inclusive for all. 
                Our team consists of Muhammad Rafi Syihan as the Project Manager, Ahmad Fauzi as the AI & ML Engineer Lead, I Putu Bagus Widya Wijaya Pratama as the Front-End Engineer Lead, 
                Deridda Ahmad Zarrar Ray as the Back-End Engineer Lead, and Vilson as the Back-End Engineer.
            </p>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-bold">Ready to get started?</h3>
                <button class="mt-6 bg-pink-500 text-white font-bold py-2 px-5 rounded-lg hover:bg-pink-600 transition shadow-lg">
                    Get Started
                </button>
            </div>
            <div>
                <h3 class="text-lg font-bold">Quick Links</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Features</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold">Stay Connected</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold">Legal</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="#" class="hover:underline">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-12">
            <p>&copy; 2024 BiSignDo Indonesia. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>