@extends('layout.app')

@section('title', 'Events - BiSignDo')

@section('content')
<div class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-pink-600">
                Explore Inspiring Events
            </h1>
            <p class="text-lg text-pink-700 mt-4">
                Discover events designed to empower your Bisindo learning journey.
            </p>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-12">
            <!-- Search Bar -->
            <form action="{{ route('events.index') }}" method="GET" class="w-full flex shadow-lg rounded-lg mb-6">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="w-full p-3 border border-pink-300 rounded-l-lg focus:ring focus:ring-pink-400 focus:outline-none text-gray-600"
                       placeholder="Search events...">
                <button type="submit" 
                        class="bg-pink-500 text-white px-6 py-3 rounded-r-lg hover:bg-pink-600 transition">
                    Search
                </button>
            </form>

            <!-- Filter Dropdown -->
            <form method="GET" action="{{ route('events.index') }}" class="flex flex-wrap gap-4 justify-center items-center">
                <div>
                    <label for="status" class="text-pink-700 font-semibold">Filter by Status:</label>
                    <select name="status" id="status" 
                            class="p-2 border border-pink-300 rounded-lg focus:ring focus:ring-pink-400">
                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                        <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="ended" {{ request('status') == 'ended' ? 'selected' : '' }}>Ended</option>
                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>
                <div>
                    <label for="type" class="text-pink-700 font-semibold">Filter by Type:</label>
                    <select name="type" id="type" 
                            class="p-2 border border-pink-300 rounded-lg focus:ring focus:ring-pink-400">
                        <option value="" {{ request('type') == '' ? 'selected' : '' }}>All</option>
                        <option value="internal" {{ request('type') == 'internal' ? 'selected' : '' }}>Internal</option>
                        <option value="external" {{ request('type') == 'external' ? 'selected' : '' }}>External</option>
                    </select>
                </div>
                <button type="submit" 
                        class="bg-pink-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-pink-600 transition">
                    Apply
                </button>
            </form>
        </div>

        <!-- Event Cards Section -->
        <div class="bg-white rounded-xl shadow-xl p-10 mx-6">
            @if ($events->isEmpty())
                <!-- No Events Message -->
                <div class="text-center py-16">
                    <h2 class="text-3xl font-bold text-pink-600 mb-4">No Events Found</h2>
                    <p class="text-gray-600">Try adjusting the filter or search for different keywords.</p>
                </div>
            @else
                <!-- Event Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach ($events as $event)
                        @if ((!request('status') || request('status') === $event->status) && 
                             (!request('type') || request('type') === $event->type))
                            <div class="relative bg-white rounded-2xl shadow-md hover:shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                                <!-- Event Image -->
                                <div class="relative">
                                    @if ($event->image)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Poster" class="w-full h-48 object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-pink-500 to-transparent opacity-60"></div>
                                        </div>
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                            No Image Available
                                        </div>
                                    @endif

                                    <!-- Status Tag -->
                                    <span class="absolute top-3 left-3 text-white py-1 px-3 rounded-full text-xs font-bold shadow-md 
                                        @if ($event->status === 'upcoming') bg-pink-500 
                                        @elseif ($event->status === 'ongoing') bg-purple-500 
                                        @elseif ($event->status === 'ended') bg-gray-500 
                                        @else bg-red-500 @endif">
                                        {{ ucfirst($event->status) }}
                                    </span>

                                    <!-- Type Tag -->
                                    <span class="absolute top-3 right-3 text-white py-1 px-3 rounded-full text-xs font-bold shadow-md 
                                        {{ $event->type === 'internal' ? 'bg-green-500' : 'bg-blue-500' }}">
                                        {{ ucfirst($event->type) }}
                                    </span>

                                    <!-- Registration Status -->
                                    @if ($event->type === 'internal')
                                        <span class="absolute bottom-0 left-0 right-0 text-center text-white py-2 text-xs font-bold shadow-md 
                                            @if (auth()->check() && $event->registrations->where('user_id', auth()->id())->isNotEmpty())
                                                bg-green-500
                                            @else
                                                bg-red-500
                                            @endif">
                                            @if (auth()->check() && $event->registrations->where('user_id', auth()->id())->isNotEmpty())
                                                Registered
                                            @else
                                                Not Registered
                                            @endif
                                        </span>
                                    @endif
                                </div>

                                <!-- Event Details -->
                                <div class="p-6">
                                    <h2 class="text-xl font-bold text-pink-600 mb-3 truncate text-center">{{ $event->title }}</h2>
                                    <div class="space-y-2 text-center">
                                        <p class="text-sm bg-pink-100 text-pink-700 py-1 px-3 rounded-full inline-block">
                                            <strong>When:</strong> 
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }} 
                                            - 
                                            {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}
                                        </p>
                                        <p class="text-sm bg-pink-100 text-pink-700 py-1 px-3 rounded-full inline-block">
                                            <strong>Where:</strong> {{ $event->location }}
                                        </p>
                                    </div>
                                    <!-- View Details Button -->
                                    <div class="flex justify-center mt-6">
                                        <a href="{{ route('events.show', $event->id) }}" 
                                           class="bg-pink-500 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:shadow-2xl hover:bg-pink-600 transition duration-300">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
