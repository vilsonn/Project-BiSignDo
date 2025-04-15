@extends('admin.layouts.app')

@section('title', 'Detail Donasi dan Feedback - BiSignDo Admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-extrabold text-pink-500 mb-6 text-center">Detail Donasi dan Feedback</h1>
    <p class="text-gray-700 mb-6 text-center">
        Berikut adalah informasi lengkap tentang donasi dan feedback.
    </p>

    <!-- Detail Section -->
    <div class="space-y-4">
        <!-- Nama User -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama User</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->user->name ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Email User -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Email User</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->user->email ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Jumlah Donasi -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Jumlah Donasi</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">Rp {{ number_format($donationAndFeedback->donation_amount, 0, ',', '.') ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Metode Pembayaran</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ ucfirst($donationAndFeedback->payment_method) ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Pesan untuk Developer -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Pesan untuk Developer</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->developer_message ?: 'Tidak tersedia' }}</p>
        </div>

        <!-- Isi Feedback -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Isi Feedback</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->feedback_content ?: 'Tidak tersedia' }}</p>
        </div>

        <!-- Jenis Feedback -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Jenis Feedback</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ ucfirst($donationAndFeedback->feedback_type) ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Tanggal Dibuat -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Dibuat</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->created_at->format('d M Y H:i') ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Tanggal Diperbarui -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Diperbarui</label>
            <p class="bg-gray-50 p-3 border border-gray-300 rounded">{{ $donationAndFeedback->updated_at->format('d M Y H:i') ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Bukti Pembayaran -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Bukti Pembayaran</label>
            @if ($donationAndFeedback->proof_of_payment)
                <img src="{{ asset('storage/' . $donationAndFeedback->proof_of_payment) }}" alt="Bukti Pembayaran" class="rounded-lg shadow-md">
            @else
                <p class="bg-gray-50 p-3 border border-gray-300 rounded text-gray-500">Tidak ada bukti pembayaran</p>
            @endif
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-6 text-right">
        <a href="{{ route('donation_feedback.index') }}" 
           class="bg-gray-500 text-white py-3 px-6 rounded-lg hover:bg-gray-600 transition shadow-md">
            Kembali ke Daftar Donasi & Feedback
        </a>
    </div>
</div>
@endsection
