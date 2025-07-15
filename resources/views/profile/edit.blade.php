@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<!-- ✅ Add margin-left to avoid sidebar overlap -->
<div class="min-h-screen bg-gradient-to-tr from-pink-300 to-blue-300 text-black py-10 px-4 sm:px-6 ml-64">
    <div class="w-full max-w-4xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-10 border border-white/20 space-y-10">

        <h2 class="text-3xl font-bold text-black text-center">👤 Edit Your Profile</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-900 p-3 mb-6 rounded-lg border border-green-300 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- 🔧 Update Profile Form -->
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full rounded-lg px-4 py-2 bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-blue-300 hover:ring-2 transition duration-300">
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full rounded-lg px-4 py-2 bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-blue-300 hover:ring-2 transition duration-300">
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">
                        New Password <span class="text-xs text-gray-400">(optional)</span>
                    </label>
                    <input type="password" name="password"
                        class="w-full rounded-lg px-4 py-2 bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-blue-300 hover:ring-2 transition duration-300">
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded-lg px-4 py-2 bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-blue-300 hover:ring-2 transition duration-300">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-8 rounded-lg transition duration-300 hover:ring-2 hover:ring-blue-300">
                    🔄 Update Profile
                </button>
            </div>
        </form>

        <!-- Divider -->
        <hr class="border-black/20 my-10">

        <!-- ⚠️ Delete Account -->
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?')">
            @csrf
            @method('DELETE')

            <h3 class="text-xl font-bold text-red-400 mb-4 text-center">⚠️ Delete Account</h3>

            <div class="max-w-md mx-auto">
                <label class="block text-sm font-semibold text-black mb-1">Confirm Password</label>
                <input type="password" name="password"
                    class="w-full rounded-lg px-4 py-2 bg-white text-black focus:outline-none focus:ring-2 focus:ring-red-500 hover:border-red-300 hover:ring-2 transition duration-300"
                    required>
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="text-center mt-4">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-8 rounded-lg transition duration-300 hover:ring-2 hover:ring-red-300">
                        🗑️ Delete Account
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
