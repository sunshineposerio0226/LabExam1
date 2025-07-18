<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking System - Travel Tours</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Roboto+Mono&display=swap" rel="stylesheet" />

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#93c5fd',  // light blue-300
            secondary: '#fbcfe8', // pink-300
            accent: '#f9a8d4',    // pink-400
            lightbg: '#fafafa',
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif'],
            mono: ['Roboto Mono', 'monospace']
          }
        }
      }
    };
  </script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #93c5fd 0%, #fbcfe8 100%);
      color: #374151; /* gray-700 */
      position: relative;
      overflow-x: hidden;
      min-height: 100vh;
    }

    /* Butterfly SVG styles */
    .butterfly {
      position: absolute;
      width: 40px;
      height: 40px;
      fill: #f9a8d4;
      opacity: 0.6;
      animation: flutter 6s infinite ease-in-out alternate;
      filter: drop-shadow(0 0 2px #f472b6);
    }
    .butterfly:nth-child(1) {
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }
    .butterfly:nth-child(2) {
      top: 30%;
      left: 80%;
      animation-delay: 2s;
      width: 30px;
      height: 30px;
      opacity: 0.4;
    }
    .butterfly:nth-child(3) {
      top: 70%;
      left: 20%;
      animation-delay: 4s;
      width: 50px;
      height: 50px;
      opacity: 0.5;
    }

    @keyframes flutter {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.6;
      }
      50% {
        transform: translateY(-15px) rotate(15deg);
        opacity: 1;
      }
      100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.6;
      }
    }

    .glass-box {
      background: rgba(255 255 255 / 0.7);
      backdrop-filter: blur(12px);
      border-radius: 1rem;
      box-shadow: 0 8px 32px rgb(255 255 255 / 0.25);
      border: 1px solid rgba(255 255 255 / 0.3);
      color: #374151;
    }

    a.btn-primary {
      background: linear-gradient(90deg, #93c5fd, #f9a8d4);
      color: #374151;
      font-weight: 600;
      padding: 1rem 2rem;
      border-radius: 1rem;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(147,197,253,0.5);
    }
    a.btn-primary:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px #f9a8d4;
      color: #1e293b;
    }

    a.btn-secondary {
      border: 2px solid #f9a8d4;
      color: #f9a8d4;
      padding: 1rem 2rem;
      border-radius: 1rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }
    a.btn-secondary:hover {
      background-color: #f9a8d4;
      color: #374151;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- Butterflies SVG decorations -->
  <svg class="butterfly" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
    <path d="M32 12c-8 0-14 6-14 14 0 7 6 14 14 14s14-7 14-14c0-8-6-14-14-14zm-7 14a7 7 0 0 1 14 0c0 4-3 7-7 7s-7-3-7-7z"/>
  </svg>
  <svg class="butterfly" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
    <path d="M32 12c-8 0-14 6-14 14 0 7 6 14 14 14s14-7 14-14c0-8-6-14-14-14zm-7 14a7 7 0 0 1 14 0c0 4-3 7-7 7s-7-3-7-7z"/>
  </svg>
  <svg class="butterfly" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
    <path d="M32 12c-8 0-14 6-14 14 0 7 6 14 14 14s14-7 14-14c0-8-6-14-14-14zm-7 14a7 7 0 0 1 14 0c0 4-3 7-7 7s-7-3-7-7z"/>
  </svg>

  <div class="min-h-screen px-4 py-10 flex items-center justify-center">
    <div class="w-full max-w-4xl glass-box p-12 shadow-lg text-center">

      <!-- Header -->
      <h1 class="text-5xl font-extrabold mb-6 font-mono" style="color:#ec4899;">
        Ready to book your travel tour?
      </h1>
      <p class="text-lg mb-10 font-light" style="color:#6b7280;">
        Discover unforgettable destinations with our easy and secure booking platform.
      </p>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row justify-center gap-8 mb-12">
        <a href="{{ route('register') }}" class="btn-primary">
          <!-- Register icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M16 21v-2a4 4 0 00-3-3.87M5 19v2m11-11a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          Register
        </a>
        <a href="{{ route('login') }}" class="btn-secondary">
          <!-- Login icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 12H3m0 0l4-4m-4 4l4 4m13 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V5a3 3 0 013-3h7"/>
          </svg>
          Login
        </a>
      </div>

      <!-- Features -->
      <div>
        <h2 class="text-3xl font-bold text-center mb-8" style="color:#ec4899;">Our Key Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div class="bg-white/80 p-6 rounded-xl shadow-md border border-pink-300 hover:shadow-lg transition hover:scale-105">
            <h3 class="font-semibold text-lg text-pink-500 mb-2">Easy Booking</h3>
            <p class="text-gray-700 text-sm">Book tours with just a few clicks, anytime, anywhere.</p>
          </div>
          <div class="bg-white/80 p-6 rounded-xl shadow-md border border-pink-300 hover:shadow-lg transition hover:scale-105">
            <h3 class="font-semibold text-lg text-pink-500 mb-2">Secure Payments</h3>
            <p class="text-gray-700 text-sm">Safe, encrypted transactions with multiple payment options.</p>
          </div>
          <div class="bg-white/80 p-6 rounded-xl shadow-md border border-pink-300 hover:shadow-lg transition hover:scale-105">
            <h3 class="font-semibold text-lg text-pink-500 mb-2">24/7 Support</h3>
            <p class="text-gray-700 text-sm">We’re here for you any time, any day, to ensure smooth travel plans.</p>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="mt-16 pt-6 text-sm text-gray-500 border-t border-pink-200">
        &copy; 2025 Travel Booking. Made with ❤️ for travel enthusiasts.
      </footer>

    </div>
  </div>

</body>
</html>
