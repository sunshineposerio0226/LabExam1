@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<style>
    body {
        background: linear-gradient(135deg, #fcd6f7, #e1d2f4); /* Light pink to light purple */
        background-size: 400% 400%;
        animation: gradientAnimation 10s ease infinite;
        font-family: 'Arial', sans-serif;
    }

    @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .btn-glow {
        background-color: #d273f7;
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        border: none;
        box-shadow: 0 0 10px rgba(210, 115, 247, 0.8);
        transition: all 0.3s ease;
    }

    .btn-glow:hover {
        background-color: #b14fe3;
        box-shadow: 0 0 20px rgba(210, 115, 247, 0.8), 0 0 40px rgba(210, 115, 247, 0.6);
    }

    .btn-back {
        border: 2px solid #9e3d71;
        color: #9e3d71;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #9e3d71;
        color: white;
        box-shadow: 0 0 10px rgba(158, 61, 113, 0.8);
    }

    .btn-dashboard {
        background-color: #6a3d9a;
        color: white;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-dashboard:hover {
        background-color: #5a2c88;
        box-shadow: 0 0 20px rgba(106, 61, 154, 0.8);
    }

    input, textarea {
        background-color: #fff;
        color: #333;
        border: 1px solid #d3d3d3;
        padding: 8px;
        font-size: 14px;
        border-radius: 6px;
        transition: border-color 0.3s ease;
    }

    input:focus, textarea:focus {
        border-color: #d273f7;
        box-shadow: 0 0 8px rgba(210, 115, 247, 0.5);
    }

    label {
        font-size: 14px;
        font-weight: 600;
    }
</style>

<!-- Main Content -->
<div class="py-12 px-4 min-h-screen relative ml-64">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-2xl p-8 border border-purple-200">
            <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Edit Booking</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg border border-green-300 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('bookings.update', $booking->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-purple-700 mb-1">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $booking->title) }}"
                        required
                        class="w-full border border-purple-300 bg-white text-black rounded-lg p-2 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    />
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-purple-700 mb-1">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        required
                        class="w-full border border-purple-300 bg-white text-black rounded-lg p-2 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    >{{ old('description', $booking->description) }}</textarea>
                </div>

                <!-- Hidden Date Input -->
                <input
                    type="hidden"
                    name="booking_date"
                    id="booking_date"
                    value="{{ \Carbon\Carbon::parse(old('booking_date', $booking->booking_date))->format('Y-m-d H:i') }}"
                />

                <!-- Calendar -->
                <div>
                    <label for="inline-calendar" class="block text-purple-700 mb-2">Booking Date & Time</label>
                    <div id="inline-calendar" class="border border-purple-300 rounded-lg p-2 bg-white shadow-sm w-full text-black"></div>
                    <p class="text-purple-600 text-xs mt-1">Select your booking date and time.</p>
                    @error('booking_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="pt-3 text-center">
                    <button type="submit" class="btn-glow">Update Booking</button>
                </div>
            </form>

            <!-- Back and Dashboard Buttons -->
            <div class="mt-6 text-center space-y-3">
                <a href="{{ route('bookings.index') }}" class="btn-back">
                    &larr; Back to Bookings
                </a>
                <a href="{{ route('dashboard') }}" class="btn-dashboard">
                    Go to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Flatpickr JS -->
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
