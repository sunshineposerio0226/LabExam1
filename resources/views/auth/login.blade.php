<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — IT Booking System</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            softpink: '#fbcfe8',
            lightpurple: '#e9d5ff',
            hotpink: '#ec4899',
            lavender: '#c084fc',
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui'],
          },
          boxShadow: {
            glow: '0 0 20px rgba(236, 72, 153, 0.5)',
            glowHover: '0 0 30px rgba(192, 132, 252, 0.7)',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-12px)' },
            }
          },
          animation: {
            float: 'float 8s ease-in-out infinite',
          }
        }
      }
    };
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fbcfe8, #e9d5ff);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .blur-circle {
      position: absolute;
      border-radius: 9999px;
      filter: blur(100px);
      opacity: 0.4;
      z-index: 0;
    }
  </style>
</head>
<body class="relative flex items-center justify-center py-20 px-4">

  <!-- Glowing Background Circles -->
  <div class="blur-circle w-96 h-96 bg-pink-300 top-0 left-0 animate-float"></div>
  <div class="blur-circle w-72 h-72 bg-purple-300 top-40 right-0 animate-float"></div>
  <div class="blur-circle w-80 h-80 bg-pink-400 bottom-0 left-1/2 -translate-x-1/2 animate-float"></div>

  <!-- Login Card -->
  <div class="relative z-10 w-full max-w-md bg-white/30 backdrop-blur-lg border border-white/30 shadow-2xl rounded-2xl p-8">

    <!-- Logo -->
    <div class="flex justify-center mb-4">
      <svg class="w-10 h-10 text-hotpink animate-float" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 4v16m8-8H4" />
      </svg>
    </div>

    <h2 class="text-3xl font-bold text-center text-purple-700 mb-2">IT Portal Login</h2>
    <p class="text-center text-purple-500 mb-6">Access your tech-powered booking system</p>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-purple-700 mb-1">Email</label>
        <input id="email" type="email" name="email" required autofocus
               class="w-full px-4 py-3 border border-purple-200 bg-white/40 text-purple-800 rounded-lg placeholder-purple-400 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-glow" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-purple-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-3 border border-purple-200 bg-white/40 text-purple-800 rounded-lg placeholder-purple-400 focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-glow" />
      </div>

      <div class="flex items-center">
        <input id="remember_me" type="checkbox" name="remember"
               class="h-4 w-4 text-purple-500 bg-white border-purple-300 rounded focus:ring-pink-300" />
        <label for="remember_me" class="ml-2 text-sm text-purple-600">Remember me</label>
      </div>

      <div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-pink-400 to-purple-500 text-white font-semibold py-3 rounded-lg transition-all shadow-glow hover:shadow-glowHover hover:from-pink-500 hover:to-purple-600">
          Sign In
        </button>
      </div>
    </form>

    <!-- Footer -->
    <div class="text-center text-sm text-purple-500 mt-6 space-y-2">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-pink-500 hover:underline">Forgot Password?</a><br>
      @endif
      <span>New here? 
        <a href="{{ route('register') }}" class="text-purple-600 font-semibold hover:underline">Create an account</a>
      </span>
    </div>
  </div>
</body>
</html>
