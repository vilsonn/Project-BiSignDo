@extends('layout.app')

@section('title', $selectedEvent->title . ' - Event Details')

@section('content')
<div class="bg-pink-50 py-16">
<div class="container mx-auto px-6">
        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- Event Card Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <!-- Back to Events List Button -->
            <div class="absolute top-6 left-4 z-10">
                <a href="{{ route('events.index') }}" 
                   class="bg-pink-500 text-white font-bold py-2 px-4 rounded-full hover:bg-pink-600 transition shadow-lg">
                    Back to Events
                </a>
            </div>

            <!-- Event Image -->
            <div class="relative">
                @if ($selectedEvent->image)
                    <img src="{{ asset('storage/' . $selectedEvent->image) }}" 
                         alt="{{ $selectedEvent->title }}" 
                         class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-pink-500 via-pink-300 to-transparent opacity-75"></div>
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image Available
                    </div>
                @endif
            </div>

            <!-- Event Details -->
            <div class="p-8">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-pink-600 mb-6">{{ $selectedEvent->title }}</h1>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        {{ $selectedEvent->description }}
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm">
                            <strong>Start:</strong> {{ \Carbon\Carbon::parse($selectedEvent->start_date)->format('d M Y H:i') }}
                        </div>
                        <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm">
                            <strong>End:</strong> {{ \Carbon\Carbon::parse($selectedEvent->end_date)->format('d M Y H:i') }}
                        </div>
                        <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm col-span-full">
                            <strong>Location:</strong> {{ $selectedEvent->location }}
                        </div>
                        @if ($selectedEvent->max_participants)
                            <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm col-span-full">
                                <strong>Max Participants:</strong> {{ $selectedEvent->max_participants }}
                            </div>
                        @endif
                        <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm col-span-full">
                            <strong>Status:</strong> 
                            <span class="py-1 px-3 rounded-full text-white 
                                {{ $selectedEvent->status === 'upcoming' ? 'bg-blue-500' : '' }}
                                {{ $selectedEvent->status === 'ongoing' ? 'bg-green-500' : '' }}
                                {{ $selectedEvent->status === 'ended' ? 'bg-gray-500' : '' }}
                                {{ $selectedEvent->status === 'canceled' ? 'bg-red-500' : '' }}">
                                {{ ucfirst($selectedEvent->status) }}
                            </span>
                        </div>
                        <div class="bg-pink-100 text-pink-700 py-2 px-4 rounded-full text-sm col-span-full">
                            <strong>Type:</strong> 
                            <span class="py-1 px-3 rounded-full text-white 
                                {{ $selectedEvent->type === 'internal' ? 'bg-green-500' : 'bg-blue-500' }}">
                                {{ ucfirst($selectedEvent->type) }}
                            </span>
                        </div>
                    </div>

                    <!-- Instagram Embed -->
                    @if ($selectedEvent->embed_code)
                        <div class="bg-gray-100 p-4 rounded-lg shadow flex justify-center items-center">
                            {!! $selectedEvent->embed_code !!}
                        </div>
                    @else
                        <div class="bg-gray-100 p-4 rounded-lg shadow flex justify-center items-center">
                            <p class="text-gray-500">No highlights available for this event.</p>
                        </div>
                    @endif

                    <!-- Register Button or Form -->
                    <div class="mt-8">
                        @if ($selectedEvent->type === 'external' && $selectedEvent->registration_link)
                            <!-- External Event -->
                            <a href="{{ $selectedEvent->registration_link }}" target="_blank" 
                               class="bg-pink-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-pink-600 transition shadow-lg">
                                Register Now
                            </a>
                        @elseif ($selectedEvent->type === 'internal')
                            <!-- Internal Event -->
                            @if (auth()->check() && $selectedEvent->registrations->where('user_id', auth()->id())->isNotEmpty())
                                <p class="text-green-500 font-bold">You are already registered for this event.</p>
                            @else
                                <form action="{{ route('events.register', ['id' => $selectedEvent->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" 
                                            class="bg-pink-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-pink-600 transition shadow-lg">
                                        Register for this Event
                                    </button>
                                </form>
                            @endif
                        @else
                            <p class="text-gray-500">Registration is not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
