@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<!-- 💡 Wrapper with ml-64 to prevent overlap with sidebar -->
<div x-data="{ showBookings: false }" class="min-h-screen ml-64 bg-gradient-to-tr from-pink-400 via-purple-400 to-blue-400 text-black py-6 sm:py-10 px-4 sm:px-6 flex flex-col">
    <div class="w-full max-w-5xl mx-auto space-y-8 flex-grow">
        <!-- ✅ Success Message -->
        @if(session('success'))
            <div class="bg-green-200 text-green-900 px-4 py-3 rounded-md shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- ✅ Welcome Card -->
        <div class="bg-white/20 shadow-xl rounded-2xl p-6 backdrop-blur hover:bg-gradient-to-tr hover:from-pink-300 hover:via-purple-300 hover:to-blue-300 transition-all duration-500">
            <h2 class="text-3xl font-bold text-black">Welcome, {{ Auth::user()->name }} 👋</h2>
            <p class="text-black mt-2 text-base">Stay in control view your latest activities here!</p>
        </div>

        <!-- ✅ Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- 🔁 Total Bookings -->
            <div 
                @click="showBookings = !showBookings"
                @keydown.enter.prevent="showBookings = !showBookings"
                @keydown.space.prevent="showBookings = !showBookings"
                class="cursor-pointer bg-white/10 shadow-md p-6 rounded-xl hover:bg-gradient-to-tr hover:from-pink-300 hover:via-purple-300 hover:to-blue-300 transition-all duration-500"
                tabindex="0"
                role="button"
                title="Click to show/hide your bookings"
            >
                <h4 class="text-purple-200 font-semibold text-lg">Total Bookings</h4>
                <p class="text-3xl font-bold text-black mt-1">{{ $totalBookings }}</p>
            </div>

            <!-- 👥 Total Users -->
            <a href="{{ route('users.index') }}" title="Go to Users" class="group">
                <div class="bg-white/10 shadow-md p-6 rounded-xl hover:bg-gradient-to-tr hover:from-pink-300 hover:via-purple-300 hover:to-blue-300 transition-all duration-500">
                    <h4 class="text-purple-200 font-semibold text-lg group-hover:text-black">Total Users</h4>
                    <p class="text-3xl font-bold text-black group-hover:text-purple-300 mt-1">{{ $totalUsers }}</p>
                </div>
            </a>
        </div>

        <!-- ✅ Booking List -->
        <div x-show="showBookings" x-transition class="bg-white/10 p-6 rounded-2xl shadow-lg min-h-[300px]" style="display: none;">
            <h3 class="text-xl font-semibold text-black mb-4">📅 Your Bookings</h3>

            @if ($bookings->count())
                <div class="space-y-4">
                    @foreach ($bookings as $booking)
                        <div class="bg-white/10 p-4 rounded-lg shadow hover:shadow-xl hover:bg-gradient-to-tr hover:from-pink-200 hover:via-purple-200 hover:to-blue-200 transition-all duration-500">
                            <h4 class="text-lg font-bold text-black">{{ $booking->title }}</h4>
                            <p class="text-sm text-black mt-1">{{ $booking->description }}</p>
                            <p class="text-xs text-black mt-2">
                                📆 {{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y h:i A') }}
                            </p>

                            <div class="mt-3 flex space-x-4">
                                <a href="{{ route('bookings.edit', $booking->id) }}"
                                   class="text-purple-400 hover:text-purple-300 font-semibold underline">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-black italic py-10">You currently have no bookings.</p>
            @endif
        </div>
    </div>
</div>

@endsection
