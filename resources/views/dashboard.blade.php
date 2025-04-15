@extends('layout.app')

@section('title', 'Dashboard - BiSignDo')

@section('content')
<div class="bg-gradient-to-b from-pink-500 to-gray-50 text-gray-800 py-16">
    <div class="container mx-auto px-6">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-white drop-shadow-lg">
                Welcome Back, {{ auth()->user()->name }}!
            </h1>
            <p class="text-lg text-gray-200 mt-4">
                Discover new ways to connect and communicate through Bisindo. Your learning journey starts here.
            </p>
        </div>

        <!-- Interactive Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <!-- Interactive Practice -->
            <a href="{{ route('ai.detection') }}" class="group relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition hover:bg-pink-100">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 to-pink-600 rounded-t-lg"></div>
                <div class="flex items-center justify-center w-16 h-16 bg-pink-500 rounded-full mx-auto group-hover:bg-pink-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c4.418 0 8-3.582 8-8m-8 8a8 8 0 01-8-8m8 8v8m0 0l-4-4m4 4l4-4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-center mt-6 text-pink-600 group-hover:text-pink-800 transition">
                    Practice Bisindo
                </h3>
                <p class="text-center text-gray-500 mt-3">
                    Use interactive tools to refine your Bisindo skills.
                </p>
            </a>

            <!-- Explore Articles -->
            <a href="{{ route('articles.index') }}" class="group relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition hover:bg-pink-100">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 to-pink-600 rounded-t-lg"></div>
                <div class="flex items-center justify-center w-16 h-16 bg-pink-500 rounded-full mx-auto group-hover:bg-pink-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-center mt-6 text-pink-600 group-hover:text-pink-800 transition">
                    Explore Articles
                </h3>
                <p class="text-center text-gray-500 mt-3">
                    Expand your knowledge with our comprehensive Bisindo articles.
                </p>
            </a>

            <!-- Join Events -->
            <a href="{{ route('events.index') }}" class="group relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition hover:bg-pink-100">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 to-pink-600 rounded-t-lg"></div>
                <div class="flex items-center justify-center w-16 h-16 bg-pink-500 rounded-full mx-auto group-hover:bg-pink-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-center mt-6 text-pink-600 group-hover:text-pink-800 transition">
                    Join Events
                </h3>
                <p class="text-center text-gray-500 mt-3">
                    Participate in events to practice and connect with others.
                </p>
            </a>

            <!-- Forum -->
            <a href="{{ route('forum.index') }}" class="group relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition hover:bg-pink-100">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 to-pink-600 rounded-t-lg"></div>
                <div class="flex items-center justify-center w-16 h-16 bg-pink-500 rounded-full mx-auto group-hover:bg-pink-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6m-6 4h8M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-center mt-6 text-pink-600 group-hover:text-pink-800 transition">
                    Forums
                </h3>
                <p class="text-center text-gray-500 mt-3">
                    Join discussions and share knowledge in our Bisindo forums.
                </p>
            </a>
        </div>

        <!-- Inspirational Section -->
        <div class="bg-white p-12 rounded-xl shadow-md relative overflow-hidden mb-16">
            <h2 class="text-3xl font-extrabold text-pink-500 text-center mb-4 z-10 relative">Make an Impact</h2>
            <p class="text-center text-gray-700 leading-relaxed z-10 relative">
                Bisindo is more than a language; it’s a connection to the community. Join us to make a difference in creating an inclusive world.
            </p>
        </div>

        <!-- Donation and Feedback Section -->
        <div class="bg-white p-8 md:p-12 rounded-xl shadow-md mb-16 max-w-4xl mx-auto">
            <h2 class="text-3xl font-extrabold text-pink-500 text-center mb-6">Tambah Donasi dan Feedback</h2>

            <!-- Success Message -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg @click="show = false" class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"><title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.545l-2.651 3.304a1.2 1.2 0 01-1.697-1.697l3.304-2.651-3.304-2.651a1.2 1.2 0 011.697-1.697L10 8.853l2.651-3.304a1.2 1.2 0 011.697 1.697l-3.304 2.651 3.304 2.651a1.2 1.2 0 010 1.697z"/>
                        </svg>
                    </span>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('donations_and_feedbacks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Donation Amount -->
                <div>
                    <label for="donation_amount" class="block text-gray-700 font-medium">Jumlah Donasi</label>
                    <input type="number" id="donation_amount" name="donation_amount" value="{{ old('donation_amount') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                        placeholder="Masukan jumlah donasi dalam Rupiah. Contoh: Jika mendonasijan Rp50,000, masukan 50000" required>
                    @error('donation_amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div x-data="{ paymentMethod: '{{ old('payment_method', '') }}' }" class="mt-4">
                    <label for="payment_method" class="block text-gray-700 font-medium">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method"
                            x-model="paymentMethod"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
                        <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>Pilih Jenis Metode Pembayaran</option>
                        <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="e_wallet" {{ old('payment_method') == 'e_wallet' ? 'selected' : '' }}>E-Wallet</option>
                    </select>
                    @error('payment_method')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Transfer Bank Details -->
                    <div x-show="paymentMethod === 'bank_transfer'" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="mt-6">
                        <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white p-6 rounded-xl shadow-lg flex flex-col md:flex-row items-center hover:shadow-2xl transition-shadow duration-300">
                        <div class="md:w-1/3 mb-4 md:mb-0">
                            <h3 class="text-2xl font-semibold">Informasi Transfer Bank</h3>
                            </div>
                            <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <p class="font-medium">Nama Bank:</p>
                                    <p>Bank BCA</p>
                                </div>
                                <div>
                                    <p class="font-medium">Nama Penerima:</p>
                                    <p>PT. BiSignDo</p>
                                </div>
                                <div>
                                    <p class="font-medium">Nomor Rekening:</p>
                                    <p>123-456-7890</p>
                                </div>
                                <div>
                                    <p class="font-medium">Cabang:</p>
                                    <p>Jakarta Pusat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- E-Wallet QRIS -->
                    <div x-show="paymentMethod === 'e_wallet'" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="mt-6">
                        <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col items-center hover:shadow-2xl transition-shadow duration-300">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Scan QRIS untuk Donasi</h3>
                            <img src="{{ asset('images/qris.jpg') }}" alt="QRIS" class="w-80 h-80 object-contain">
                            <p class="mt-4 text-gray-600">Pastikan QRIS Anda jelas dan dapat dipindai dengan baik.</p>
                        </div>
                    </div>
                </div>

                <!-- Proof of Payment -->
                <div>
                    <label for="proof_of_payment" class="block text-gray-700 font-medium mb-2">Bukti Pembayaran</label>
                    <div class="w-full">
                        <label for="proof_of_payment" class="flex items-center justify-center w-full border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-700 cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <span class="mr-2">Pilih File</span>
                            <!-- Optional: Add an upload icon for better visual indication -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0l-3 3m3-3l3 3m13 4v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5m16 0h-4m0 0l3-3m-3 3l-3-3" />
                            </svg>
                        </label>
                        <input type="file" id="proof_of_payment" name="proof_of_payment" class="hidden">
                    </div>
                    @error('proof_of_payment')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Developer Message -->
                <div>
                    <label for="developer_message" class="block text-gray-700 font-medium">Pesan untuk Developer</label>
                    <textarea id="developer_message" name="developer_message" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="Sampaikan pesan atau harapan Anda kepada developer kami!">{{ old('developer_message') }}</textarea>
                    @error('developer_message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Feedback Content -->
                <div>
                    <label for="feedback_content" class="block text-gray-700 font-medium">Isi Feedback</label>
                    <textarea id="feedback_content" name="feedback_content" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="Berikan ulasan atau pendapat Anda mengenai layanan kami!">{{ old('feedback_content') }}</textarea>
                    @error('feedback_content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Feedback Type -->
                <div>
                    <label for="feedback_type" class="block text-gray-700 font-medium">Jenis Feedback</label>
                    <select id="feedback_type" name="feedback_type"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
                        <option value="" disabled selected>Pilih Jenis Feedback</option>
                        <option value="appreciation" {{ old('feedback_type') == 'appreciation' ? 'selected' : '' }}>Apresiasi</option>
                        <option value="suggestion" {{ old('feedback_type') == 'suggestion' ? 'selected' : '' }}>Masukan</option>
                        <option value="complaint" {{ old('feedback_type') == 'complaint' ? 'selected' : '' }}>Keluhan</option>
                        <option value="inquiry" {{ old('feedback_type') == 'inquiry' ? 'selected' : '' }}>Pertanyaan</option>
                    </select>
                    @error('feedback_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition duration-300 transform hover:scale-105">
                        Kirim Donasi dan Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
