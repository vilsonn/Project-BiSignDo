@extends('admin.layouts.app')

@section('title', 'Edit Donasi dan Feedback - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Edit Donasi dan Feedback</h1>
    <p class="text-gray-700 mb-6 text-center">
        Perbarui informasi donasi dan feedback di bawah ini.
    </p>

    <!-- Pesan sukses (flash) -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan error validasi -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-500">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mt-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Donasi dan Feedback -->
    <form action="{{ route('donation_feedback.update', $donationAndFeedback->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Donation Amount -->
        <div>
            <label for="donation_amount" class="block text-gray-700 font-semibold mb-2">
                Jumlah Donasi
            </label>
            <input type="number" 
                   id="donation_amount" 
                   name="donation_amount" 
                   value="{{ old('donation_amount', $donationAndFeedback->donation_amount) }}"
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition"
                   placeholder="Masukkan jumlah donasi" 
                   required />
        </div>

        <!-- Payment Method -->
        <div>
            <label for="payment_method" class="block text-gray-700 font-semibold mb-2">
                Metode Pembayaran
            </label>
            <select name="payment_method" id="payment_method" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition">
                <option value="bank_transfer" {{ old('payment_method', $donationAndFeedback->payment_method) == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                <option value="e_wallet" {{ old('payment_method', $donationAndFeedback->payment_method) == 'e_wallet' ? 'selected' : '' }}>E-Wallet</option>
            </select>
        </div>

        <!-- Developer Message -->
        <div>
            <label for="developer_message" class="block text-gray-700 font-semibold mb-2">
                Pesan untuk Developer
            </label>
            <textarea id="developer_message" 
                      name="developer_message" 
                      rows="5"
                      class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                             focus:ring-pink-500 transition"
                      placeholder="Tuliskan pesan untuk developer...">{{ old('developer_message', $donationAndFeedback->developer_message) }}</textarea>
        </div>

        <!-- Feedback Content -->
        <div>
            <label for="feedback_content" class="block text-gray-700 font-semibold mb-2">
                Isi Feedback
            </label>
            <textarea id="feedback_content" 
                      name="feedback_content" 
                      rows="5"
                      class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                             focus:ring-pink-500 transition"
                      placeholder="Tuliskan isi feedback...">{{ old('feedback_content', $donationAndFeedback->feedback_content) }}</textarea>
        </div>

        <!-- Feedback Type -->
        <div>
            <label for="feedback_type" class="block text-gray-700 font-semibold mb-2">
                Jenis Feedback
            </label>
            <select name="feedback_type" id="feedback_type" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 transition">
                <option value="appreciation" {{ old('feedback_type', $donationAndFeedback->feedback_type) == 'appreciation' ? 'selected' : '' }}>Apresiasi</option>
                <option value="suggestion" {{ old('feedback_type', $donationAndFeedback->feedback_type) == 'suggestion' ? 'selected' : '' }}>Masukan</option>
                <option value="complaint" {{ old('feedback_type', $donationAndFeedback->feedback_type) == 'complaint' ? 'selected' : '' }}>Keluhan</option>
                <option value="inquiry" {{ old('feedback_type', $donationAndFeedback->feedback_type) == 'inquiry' ? 'selected' : '' }}>Pertanyaan</option>
            </select>
        </div>

        <!-- Proof of Payment -->
        <div>
            <label for="proof_of_payment" class="block text-gray-700 font-semibold mb-2">
                Bukti Pembayaran
            </label>
            @if ($donationAndFeedback->proof_of_payment)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $donationAndFeedback->proof_of_payment) }}" alt="Bukti Pembayaran" class="rounded-lg shadow-md max-w-sm">
                </div>
            @endif
            <input type="file" 
                   id="proof_of_payment" 
                   name="proof_of_payment" 
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                          focus:ring-pink-500 transition" />
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <!-- Back Button -->
            <a href="{{ route('donation_feedback.index') }}" 
               class="bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">
                Kembali ke Daftar Donasi & Feedback
            </a>
            <!-- Submit Button -->
            <button type="submit"
                    class="bg-pink-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-pink-600 
                           transition shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection