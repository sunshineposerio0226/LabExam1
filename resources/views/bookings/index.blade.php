@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<style>
    #inline-calendar {
        width: 100%;
        font-size: 1rem;
    }

    .flatpickr-day {
        height: 2.5rem;
        width: 2.5rem;
        line-height: 2.5rem;
        font-size: 1rem;
        margin: 0.15rem;
    }

    .flatpickr-time input {
        font-size: 1rem;
        height: 2.25rem;
        width: 3rem;
    }

    .flatpickr-calendar {
        background-color: #ffffff;
        color: #1f2937;
        border: 1px solid #e5e7eb;
    }

    .flatpickr-day.today {
        background-color: #3b82f6;
        color: white;
    }

    .flatpickr-day.selected {
        background-color: #8b5cf6;
        color: white;
    }

    .flatpickr-day:hover {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .bg-gradient-pink-blue {
        background: linear-gradient(135deg, #fbcfe8 0%, #93c5fd 100%);
    }

    .btn-hover:hover {
        background: linear-gradient(135deg, #fbbf24 0%, #60a5fa 100%);
    }

    .input-hover:hover {
        border-color: #60a5fa;
        box-shadow: 0 0 10px rgba(96, 165, 250, 0.5);
    }
</style>

<!-- ✅ Add ml-64 to push content away from sidebar -->
<div class="py-10 px-4 ml-64 min-h-screen bg-gradient-pink-blue text-black">
    <div class="max-w-5xl mx-auto space-y-10">

        @if (session('success'))
            <div class="bg-green-200 text-green-900 px-4 py-3 rounded-md text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- 🔧 Booking Form -->
        <section class="bg-white/10 border border-white/20 rounded-xl shadow-xl backdrop-blur p-8 space-y-6">
            <h2 class="text-3xl font-bold text-blue-300">📝 Create Booking</h2>

            <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-black font-semibold mb-1">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title') }}"
                        required
                        class="w-full bg-white text-black border border-gray-300 rounded-md p-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 input-hover"
                    />
                    @error('title')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-black font-semibold mb-1">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        required
                        class="w-full bg-white text-black border border-gray-300 rounded-md p-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 input-hover"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hidden Booking Date -->
                <input type="hidden" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" />

                <!-- Flatpickr Calendar -->
                <div>
                    <label for="inline-calendar" class="block text-black font-semibold mb-2">Booking Date & Time</label>
                    <div id="inline-calendar"></div>
                    <p class="text-blue-400 text-xs mt-1">Select the desired date and time.</p>
                    @error('booking_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 transition px-6 py-3 rounded-lg text-white font-semibold btn-hover">
                        Submit Booking
                    </button>
                </div>
            </form>
        </section>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const bookedDates = @json($bookedDates);
    const hiddenInput = document.getElementById("booking_date");

    flatpickr("#inline-calendar", {
        inline: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: bookedDates,
        time_24hr: false,
        defaultDate: hiddenInput.value || null,
        onChange: function(selectedDates, dateStr) {
            hiddenInput.value = dateStr;
        }
    });
</script>
@endsection
